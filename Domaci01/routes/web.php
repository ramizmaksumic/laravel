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

Route::controller(ContactController::class)->prefix('contact')->group(function () {
    Route::get('/contact', 'index');
    Route::get('/all-contacts', 'showContact');
    Route::post('/send-contact', 'sendContact');
    Route::get("/delete-contact/{contact}", 'deleteContact')->name('contact.delete');
    Route::get('/edit-contact/{id}', 'editContact')->name('contact.edit');
    Route::put('/update-contact/{contact}', 'updateContact')->name('contact.update');
});


Route::controller(AdminController::class)
    ->prefix('admin')
    ->name('products.')
    ->group(function () {
        Route::get('/add-products', 'index')->middleware('auth');
        Route::post('/add-products', 'addProducts')->name('save');
        Route::get("/delete-product/{product}", "delete")->name('delete');
        Route::get('/single-product/{product}', 'singleProduct')->name('single');
        Route::put('/products/{id}', 'update')->name('update');
        Route::get('/all-products', 'allProducts')->name('all');
    });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
