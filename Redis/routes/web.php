<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);

Route::get('products/', [ProductController::class, 'create'])->name('create-product');
Route::post('products/create', [ProductController::class, 'store'])->name('products.store');

Route::get('products/flush/', [ProductController::class, 'flush']);
