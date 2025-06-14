<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;



Route::get('/', [\App\Http\Controllers\HomeController::class, 'index']);

Route::get('/about', function () {
    return view('about');
});

Route::get('/shop', [\App\Http\Controllers\ShopController::class, 'index']);

Route::get('/contact', [\App\Http\Controllers\ContactController::class, 'index']);

Route::get('/admin/all-contacts', [\App\Http\Controllers\ContactController::class, 'showContact']);

Route::post('/send-contact', [\App\Http\Controllers\ContactController::class, 'sendContact']);
Route::get("/admin/delete-contact/{contact}", [ContactController::class, 'deleteContact']);


Route::get('/admin/add-products', [AdminController::class, 'index']);
Route::post('/admin/add-products', [AdminController::class, 'addProducts']);
Route::get("admin/delete-product/{product}", [AdminController::class, "delete"]);

Route::get('/admin/all-products', [AdminController::class, 'allProducts']);
