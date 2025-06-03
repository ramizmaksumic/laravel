<?php

use Illuminate\Support\Facades\Route;



Route::get('/', [\App\Http\Controllers\HomeController::class, 'index']);

Route::get('/about', function () {
    return view('about');
});

Route::get('/shop', [\App\Http\Controllers\ShopController::class, 'index']);

Route::get('/contact', [\App\Http\Controllers\ContactController::class, 'index']);

Route::get('/admin/all-contacts', [\App\Http\Controllers\ContactController::class, 'showContact']);

Route::post('/send-contacts', [\App\Http\Controllers\ContactController::class, 'sendContact']);


Route::get('/admin/add-products', [\App\Http\Controllers\AdminController::class, 'index']);
Route::post('/admin/add-products', [\App\Http\Controllers\AdminController::class, 'addProducts']);

Route::get('/admin/all-products', [\App\Http\Controllers\AdminController::class, 'allProducts']);
