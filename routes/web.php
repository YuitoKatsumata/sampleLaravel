<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', [HelloController::class, 'index']);
Route::get('/hello/{name}/{age}', [HelloController::class, 'greet'])->where('age', '[0-9]+');
Route::get('/query-hello', [HelloController::class, 'queryHello']);

Route::get('validate-hello', [HelloController::class, 'showValidateForm']);
Route::post('validate-hello', [HelloController::class, 'handleValidateForm']);

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

Route::get('/posts/new', [PostController::class, 'new'])->name('posts.new');
Route::post('/posts', [PostController::class, 'create'])->name('posts.create');

Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');

Route::get('posts/{id}', [PostController::class, 'show'])->name('posts.show');

Route::get('posts/edit/{id}', [PostController::class, 'edit'])->name('posts.edit');
Route::put('posts/{id}', [PostController::class, 'update'])->name('posts.update');
