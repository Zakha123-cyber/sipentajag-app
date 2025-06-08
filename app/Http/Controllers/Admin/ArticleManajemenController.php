<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArticleManajemenController extends Controller
{
    public function index()
    {
        $articles = Article::with('user')->latest()->paginate(10);
        return view('admin.articles.index', compact('articles'));
    }

    public function create()
    {
        return view('admin.articles.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();
            $imagePath = $image->storeAs('articles', $imageName, 'public');
            $validated['image_url'] = $imagePath;
        }

        $validated['slug'] = Str::slug($validated['title']);
        $validated['created_by'] = auth()->id();

        Article::create($validated);

        return redirect()
            ->route('admin.articles.index')
            ->with('success', 'Article created successfully.');
    }

    public function edit(Article $article)
    {
        return view('admin.articles.edit', compact('article'));
    }

    public function update(Request $request, Article $article)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($article->image_url) {
                Storage::disk('public')->delete($article->image_url);
            }

            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();
            $imagePath = $image->storeAs('articles', $imageName, 'public');
            $validated['image_url'] = $imagePath;
        }

        $validated['slug'] = Str::slug($validated['title']);

        $article->update($validated);

        return redirect()
            ->route('admin.articles.index')
            ->with('success', 'Article updated successfully.');
    }

    public function destroy(Article $article)
    {
        // Delete image if exists
        if ($article->image_url) {
            Storage::disk('public')->delete($article->image_url);
        }

        $article->delete();

        return redirect()
            ->route('admin.articles.index')
            ->with('success', 'Article deleted successfully.');
    }
}
