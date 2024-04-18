<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/articles/creer', [BlogController::class, 'create'])->name('articles.create');
Route::post('/articles/save', [BlogController::class, 'store'])->name('articles.save');

Route::get('/blog', [BlogController::class, 'index'])->name('articles.index');