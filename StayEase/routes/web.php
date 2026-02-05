<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChambreController;



Route::get('/', function () {
    return view('welcome');
});
Route::get('/Chambre',[ChambreController::class,'index'])->name("Chambre.index");
Route::get('/Chambre/add',[ChambreController::class,'create'])->name("Chambre.create");
Route::post('/Chambre/add',[ChambreController::class,'store'])->name("Chambre.store");
Route::delete('/Chambre/delete/{Chambre}',[ChambreController::class,'destroy'])->name("Chambre.destroy");
Route::get('/Chambre/edit/{Chambre}',[ChambreController::class,'edit'])->name("Chambre.edit");
Route::put('/Chambre/edit/{Chambre}',[ChambreController::class,'update'])->name("Chambre.update");
Route::get('/Chambre/show/{Chambre}',[ChambreController::class,'show'])->name("Chambre.show");