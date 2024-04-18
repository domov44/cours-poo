<?php

namespace App\Http\Controllers;

use App\Models\Article;

class BlogController extends Controller
{
    public function index()
    {
        $articles = Article::all();
        return view('blog', compact('articles'));
    }
}
