<?php

use App\Http\Controllers\OceneController;
use App\Models\Ocena;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    $predmeti = Ocena::all();
    return view('welcome', ["predmeti" => $predmeti]);
});

Route::get('/add-predmet', [App\Http\Controllers\OceneController::class, 'index']);
Route::post('/add-ocena', [App\Http\Controllers\OceneController::class, 'addPredmet']);
