<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use App\Models\Scan;
use App\Models\Disease;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ScanController extends Controller
{
    public function index()
    {
        return view('scan.scan');
    }

    public function process(Request $request)
    {
        $request->validate([
            'image' => 'required|image|max:5120', // max 5MB
            'scan_method' => 'required|in:camera,upload',
        ]);

        // Simpan gambar ke storage/scan
        $image = $request->file('image');
        $filename = Str::uuid() . '.' . $image->getClientOriginalExtension();
        $path = $image->storeAs('public/scan', $filename);

        // Kirim gambar ke Flask API
        $flaskUrl = 'http://localhost:5000/predict';
        $response = Http::attach(
            'file',
            file_get_contents(storage_path('app/public/public/scan/' . $filename)),
            $filename
        )->post($flaskUrl);

        if (!$response->ok()) {
            Storage::delete($path);
            return response()->json(['error' => $response->body()], 500);
        }

        $result = $response->json();

        // Ambil disease_id dari tabel diseases berdasarkan nama prediksi
        $disease = Disease::where('name', $result['predicted_label'])->first();
        $disease_id = $disease ? $disease->id : null;

        // Download hasil gambar dari Flask
        $resultImageUrl = "http://localhost:5000/static/" . $result['result_image'];
        Log::info('Result image URL from Flask:', ['url' => $resultImageUrl]);

        try {
            $resultImageContent = file_get_contents($resultImageUrl);
            $resultImageFilename = 'result_' . $filename;
            Storage::put('public/scan_result/' . $resultImageFilename, $resultImageContent);
            Log::info('Result image downloaded and saved.', ['filename' => $resultImageFilename]);
        } catch (\Exception $e) {
            Log::error('Failed to download result image from Flask.', ['error' => $e->getMessage()]);
            // Jika ingin, bisa return response error di sini
        }

        // Simpan ke database
        $scan = Scan::create([
            'user_id' => Auth::id(),
            'disease_id' => $disease_id,
            'image_path' => 'scan/' . $filename,
            'result_image_path' => 'scan_result/' . $resultImageFilename,
            'scan_method' => $request->scan_method,
            'confidence' => $result['confidence'] ?? null,
        ]);

        return response()->json([
            'scan_id' => $scan->id,
            'image_url' => asset('storage/public/scan/' . $filename),
            'result_image_url' => asset('storage/public/scan_result/' . $resultImageFilename),
            'predicted_label' => $result['predicted_label'],
            'confidence' => $result['confidence'],
            'probabilities' => $result['probabilities'],
        ]);
    }
}
