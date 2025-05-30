<?php

use Illuminate\Support\Facades\Route;



Route::get('/', [\App\Http\Controllers\HomeController::class, 'index']);

Route::get('/about', function () {
    return view('about');
});

Route::get('/shop', [\App\Http\Controllers\ShopController::class, 'index']);

Route::get('/contact', [\App\Http\Controllers\ContactController::class, 'index']);
