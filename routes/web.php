<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\generateController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [generateController::class, 'index']);
Route::post('/generate', [generateController::class, 'generate']);