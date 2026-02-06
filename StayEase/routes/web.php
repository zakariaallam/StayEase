<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('rooms',RoomController::class);

