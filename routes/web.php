<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/articles/creer', [BlogController::class, 'create'])->name('articles.create');
Route::delete('/articles/delete/{id}', [BlogController::class, 'delete'])->name('articles.delete');
Route::get('/articles/edit/{id}', [BlogController::class, 'edit'])->name('articles.edit');
Route::put('/articles/update/{id}', [BlogController::class, 'update'])->name('articles.update');
Route::post('/articles/save', [BlogController::class, 'store'])->name('articles.save');

Route::get('/blog', [BlogController::class, 'index'])->name('articles.index');