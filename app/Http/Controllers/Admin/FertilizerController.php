<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Fertilizer;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class FertilizerController extends Controller
{
    public function index(): View
    {
        $fertilizers = Fertilizer::latest()->paginate(10);
        return view('admin.fertilizers.index', compact('fertilizers'));
    }

    public function create(): View
    {
        return view('admin.fertilizers.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'usage_instruction' => 'required',
            'image_url' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'purchase_link' => 'nullable|url|max:255'
        ]);

        if ($request->hasFile('image_url')) {
            $image = $request->file('image_url');
            $imageName = time() . '.' . $image->extension();
            $imagePath = $image->storeAs('fertilizers', $imageName, 'public');
            $validated['image_url'] = $imagePath;
        }

        Fertilizer::create($validated);

        return redirect()
            ->route('admin.fertilizers.index')
            ->with('success', 'Pupuk berhasil ditambahkan.');
    }

    public function edit(Fertilizer $fertilizer): View
    {
        return view('admin.fertilizers.edit', compact('fertilizer'));
    }

    public function update(Request $request, Fertilizer $fertilizer): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'usage_instruction' => 'required',
            'image_url' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'purchase_link' => 'nullable|url|max:255'
        ]);

        if ($request->hasFile('image_url')) {
            // Delete old image if exists
            if ($fertilizer->image_url) {
                Storage::disk('public')->delete($fertilizer->image_url);
            }

            $image = $request->file('image_url');
            $imageName = time() . '.' . $image->extension();
            $imagePath = $image->storeAs('fertilizers', $imageName, 'public');
            $validated['image_url'] = $imagePath;
        }

        $fertilizer->update($validated);

        return redirect()
            ->route('admin.fertilizers.index')
            ->with('success', 'Pupuk berhasil diperbarui.');
    }

    public function destroy(Fertilizer $fertilizer): RedirectResponse
    {
        if ($fertilizer->image_url) {
            Storage::disk('public')->delete($fertilizer->image_url);
        }

        $fertilizer->delete();

        return redirect()
            ->route('admin.fertilizers.index')
            ->with('success', 'Pupuk berhasil dihapus.');
    }
}
