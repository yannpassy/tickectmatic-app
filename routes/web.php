<?php
use App\Http\Controllers\GenderController;
use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/deviner-genre/{nom}', [GenderController::class, 'check']);

Route::get('/event/{id}', [EventController::class, 'getEvent']);


