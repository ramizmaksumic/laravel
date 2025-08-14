<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CitiesController;
use App\Http\Controllers\ForecastController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserCities;
use App\Models\UserCitie;
use App\Models\Weather;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);


Route::get('/search', [ForecastController::class, 'showSearch']);
Route::post('/search', [ForecastController::class, 'doSearch']);

Route::get('/user-cities/like/{city}', [UserCities::class, 'favourites'])->name('user.favourites');
Route::get('/delete-city/{city}', [UserCities::class, 'deleteFavourites'])->name('delete.favourites');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('add-cities', [CitiesController::class, 'addCitie']);
Route::post('add-citie', [CitiesController::class, 'createCitie']);

Route::get('/prognoza', [CitiesController::class, 'showCities'])->middleware('auth');

Route::get('/forecast/{city:name}/', [ForecastController::class, 'index']);

Route::get('admin/weather', [Weather::class, 'index']);

Route::get('/admin/forecast', [AdminController::class, 'showForecast']);
Route::post('/admin/forecast/update', [AdminController::class, 'updateForecast'])->name('update-forecast');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
