<?php

use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\LogoutController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;

use App\Http\Controllers\HotelController;
use App\Http\Controllers\ImageController;

use App\Http\Controllers\ChambreController;

Route::get('/', function () {
    return view('welcome');
});
Route::post('/',function(){
    return view('welcome');
})->name('client.home');
// Route::get('/Chambre',[ChambreController::class,'index'])->name("Chambre.index");
// Route::get('/Chambre/add',[ChambreController::class,'create'])->name("Chambre.create");
// Route::post('/Chambre/add',[ChambreController::class,'store'])->name("Chambre.store");
// Route::delete('/Chambre/delete/{Chambre}',[ChambreController::class,'destroy'])->name("Chambre.destroy");
// Route::get('/Chambre/edit/{Chambre}',[ChambreController::class,'edit'])->name("Chambre.edit");
// Route::post('/Chambre/edit/{Chambre}',[ChambreController::class,'update'])->name("Chambre.update");
// Route::get('/Chambre/show/{Chambre}',[ChambreController::class,'show'])->name("Chambre.show");


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

Route::resource('rooms',RoomController::class);

Route::view('admin','admin.dashboard')->name('admin')->middleware('Role');
Route::post('roleSave', [RoleController::class, 'store'])->name('role.save');
Route::post('logout',[LogoutController::class,'logout'])->name('logout');
 
