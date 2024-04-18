<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::all();
        return view('articles.index', compact('articles'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('articles.create', compact('categories'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required',
        ]);

        $userId = Auth::id();

        Article::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'user_id' => $userId,
            'category_id' => $request->input('category_id'),
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
            'title' => 'required',
            'content' => 'required',
        ]);

        $article = Article::find($id);
        if (!$article) {
            return redirect()->route('articles.index')->with('error', 'Article non trouvé.');
        }

        if ($article->user_id !== Auth::id()) {
            return redirect()->route('articles.index')->with('error', 'Vous n\'êtes pas autorisé à modifier cet article.');
        }

        $article->update([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
        ]);

        return redirect()->route('articles.index')->with('success', 'Article mis à jour avec succès.');
    }

    public function destroy($id)
    {
        $article = Article::find($id);
        if (!$article) {
            return redirect()->route('profile.articles')->with('error', 'Article non trouvé.');
        }

        if ($article->user_id !== Auth::id()) {
            return redirect()->route('profile.articles')->with('error', 'Vous n\'êtes pas autorisé à supprimer cet article.');
        }

        $article->delete();
        return redirect()->route('profile.articles')->with('success', 'Article supprimé avec succès.');
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
