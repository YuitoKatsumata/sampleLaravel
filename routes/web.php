<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelloController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', [HelloController::class, 'index']);
Route::get('/hello/{name}/{age}', [HelloController::class, 'greet'])->where('age', '[0-9]+');
Route::get('/query-hello', [HelloController::class, 'queryHello']);

Route::get('/post-hello', [HelloController::class, 'showForm']);
Route::post('/post-hello', [HelloController::class, 'handleForm']);
