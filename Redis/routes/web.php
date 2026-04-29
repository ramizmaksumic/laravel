<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShipmentController;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('products/', [ProductController::class, 'create'])->name('create-product');
Route::post('products/create', [ProductController::class, 'store'])->name('products.store');

Route::get('products/flush/', [ProductController::class, 'flush']);


Route::resource('shipments', ShipmentController::class);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('profile/change-avatar', [ProfileController::class, 'changeAvatar'])->name('profile.changeAvatar');
});

require __DIR__ . '/auth.php';
