<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
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
Route::get('/admin/edit-contact/{id}', [ContactController::class, 'editContact']);
Route::put('/admin/update-contact/{contact}', [ContactController::class, 'updateContact'])->name('contact.update');


Route::get('/admin/add-products', [AdminController::class, 'index'])->middleware('auth');
Route::post('/admin/add-products', [AdminController::class, 'addProducts']);
Route::get("admin/delete-product/{product}", [AdminController::class, "delete"]);
Route::get('admin/single-product/{product}', [AdminController::class, 'singleProduct']);
Route::put('admin/products/{id}', [AdminController::class, 'update'])->name('products.update');

Route::get('/admin/all-products', [AdminController::class, 'allProducts']);



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
