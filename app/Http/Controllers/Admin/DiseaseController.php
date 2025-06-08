<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Disease;
use App\Models\Fertilizer;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class DiseaseController extends Controller
{
    public function index(): View
    {
        $diseases = Disease::with('fertilizers')->latest()->paginate(10);
        return view('admin.diseases.index', compact('diseases'));
    }

    public function create(): View
    {
        $fertilizers = Fertilizer::all();
        return view('admin.diseases.create', compact('fertilizers'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'symptoms' => 'required',
            'treatment' => 'required',
            'fertilizer_ids' => 'required|array',
            'fertilizer_ids.*' => 'exists:fertilizers,id'
        ]);

        DB::beginTransaction();
        try {
            $disease = Disease::create([
                'name' => $validated['name'],
                'description' => $validated['description'],
                'symptoms' => $validated['symptoms'],
                'treatment' => $validated['treatment']
            ]);

            $disease->fertilizers()->sync($validated['fertilizer_ids']);

            DB::commit();
            return redirect()
                ->route('admin.diseases.index')
                ->with('success', 'Penyakit berhasil ditambahkan.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan saat menambahkan penyakit.');
        }
    }

    public function edit(Disease $disease): View
    {
        $fertilizers = Fertilizer::all();
        $selectedFertilizers = $disease->fertilizers->pluck('id')->toArray();
        return view('admin.diseases.edit', compact('disease', 'fertilizers', 'selectedFertilizers'));
    }

    public function update(Request $request, Disease $disease): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'symptoms' => 'required',
            'treatment' => 'required',
            'fertilizer_ids' => 'required|array',
            'fertilizer_ids.*' => 'exists:fertilizers,id'
        ]);

        DB::beginTransaction();
        try {
            $disease->update([
                'name' => $validated['name'],
                'description' => $validated['description'],
                'symptoms' => $validated['symptoms'],
                'treatment' => $validated['treatment']
            ]);

            // Sync fertilizers
            $disease->fertilizers()->sync($validated['fertilizer_ids']);

            DB::commit();
            return redirect()
                ->route('admin.diseases.index')
                ->with('success', 'Penyakit berhasil diperbarui.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan saat memperbarui penyakit.');
        }
    }

    public function destroy(Disease $disease): RedirectResponse
    {
        DB::beginTransaction();
        try {
            // The fertilizer relationships will be automatically deleted
            // due to onDelete('cascade') in the migration
            $disease->delete();

            DB::commit();
            return redirect()
                ->route('admin.diseases.index')
                ->with('success', 'Penyakit berhasil dihapus.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()
                ->back()
                ->with('error', 'Terjadi kesalahan saat menghapus penyakit.');
        }
    }
}
