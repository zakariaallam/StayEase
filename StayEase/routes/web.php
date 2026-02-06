<?php
<<<<<<< HEAD
use App\Http\Controllers\auth\RegisterController;
use Illuminate\Support\Facades\Route;
<<<<<<< HEAD
use App\Http\Controllers\ChambreController;
=======
use App\Http\Controllers\HotelController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ImageController;
>>>>>>> 54d174758d4c0a514a971ba0b228b80696bce5db
=======

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
>>>>>>> 4bf11cc0dce6c5f82c6215d1f01651307b497497

Route::get('/', function () {
    return view('welcome');
});
<<<<<<< HEAD
<<<<<<< HEAD
Route::get('/Chambre',[ChambreController::class,'index'])->name("Chambre.index");
Route::get('/Chambre/add',[ChambreController::class,'create'])->name("Chambre.create");
Route::post('/Chambre/add',[ChambreController::class,'store'])->name("Chambre.store");
Route::delete('/Chambre/delete/{Chambre}',[ChambreController::class,'destroy'])->name("Chambre.destroy");
Route::get('/Chambre/edit/{Chambre}',[ChambreController::class,'edit'])->name("Chambre.edit");
Route::post('/Chambre/edit/{Chambre}',[ChambreController::class,'update'])->name("Chambre.update");
Route::get('/Chambre/show/{Chambre}',[ChambreController::class,'show'])->name("Chambre.show");
=======

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
>>>>>>> 54d174758d4c0a514a971ba0b228b80696bce5db
=======
Route::resource('rooms',RoomController::class);

>>>>>>> 4bf11cc0dce6c5f82c6215d1f01651307b497497
