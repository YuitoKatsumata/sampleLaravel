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

Route::get('/post-hello', [HelloController::class, 'showForm']);
Route::post('/post-hello', [HelloController::class, 'handleForm']);

Route::get('validate-hello', [HelloController::class, 'showValidateForm']);
Route::post('validate-hello', [HelloController::class, 'handleValidateForm']);

Route::get('/posts', [PostController::class, 'index']);
