<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
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

    public function edit($id)
    {
        $article = Article::find($id);
        return view('articles.edit', compact('article'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'author' => 'required',
            'title' => 'required',
            'content' => 'required',
        ]);

        $article = Article::find($id);
        if (!$article) {
            return redirect()->route('articles.index')->with('error', 'Article non trouvé.');
        }

        $article->update([
            'author' => $request->input('author'),
            'title' => $request->input('title'),
            'content' => $request->input('content'),
        ]);

        return redirect()->route('articles.index')->with('success', 'Article mis à jour avec succès.');
    }

    public function destroy($id)
    {
        $article = Article::find($id);
        if ($article) {
            $article->delete();
        }
        return redirect()->route('articles.index')->with('success', 'Article supprimé avec succès.');
    }

    public function show($id)
    {
        $article = Article::find($id);
        if (!$article) {
            return redirect()->route('articles.index')->with('error', 'Article non trouvé.');
        }
        return view('articles.show', compact('article'));
    }
}
