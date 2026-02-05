<?php
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('login',function(){
    return view('auth.login');
})->name('login');

Route::post('login',LoginController::class)->name('login.attempt');
Route::view('home','home')->name('home');

Route::view('register','auth.register');
Route::post('register',RegisterController::class)->name('register.user');
Route::view('admin','admin.dashboard')->name('admin');
Route::post('roleSave',RoleController::class)->name('role.save');