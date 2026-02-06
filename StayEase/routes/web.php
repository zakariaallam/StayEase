<?php
use App\Http\Controllers\auth\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ImageController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('hotels',HotelController::class);
Route::resource('images',ImageController::class);


Route::get('login',function(){
    return view('auth.login');
})->name('login');

Route::post('login',LoginController::class)->name('login.attempt');
Route::view('home','home')->name('home');

Route::view('register','auth.register');
Route::post('register',RegisterController::class)->name('register.user');


Route::get('login',function(){
    return view('auth.login');
})->name('login');

Route::post('login',LoginController::class)->name('login.attempt');
Route::view('home','home')->name('home');

Route::view('register','auth.register');
Route::post('register',RegisterController::class)->name('register.user');
Route::post('register',RegisterController::class)->name('register.user');
