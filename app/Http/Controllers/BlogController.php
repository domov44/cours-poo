<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class BlogController extends Controller
{
    public function index()
    {
        $articles = Article::all();
        return view('articles.index', compact('articles'));
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'author' => 'required',
            'title' => 'required',
            'content' => 'required',
        ]);

        Article::create([
            'author' => $request->input('author'),
            'title' => $request->input('title'),
            'content' => $request->input('content'),
        ]);

        return redirect()->route('articles.index')->with('success', 'Article créé avec succès.');
    }
}
