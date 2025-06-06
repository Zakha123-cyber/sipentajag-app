<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::with('user')
            ->latest()
            ->paginate(9);

        return view('article.article', compact('articles'));
    }

    public function show(Article $article)
    {
        return view('article.article-detail', compact('article'));
    }
}
