<?php

use App\Models\User;
use App\Models\Hotel;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ChambreController;
use App\Http\Controllers\PaiementController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\LogoutController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\HomeController;



Route::get('/', function () {
    return view('welcome');
});
// Route::post('/', function () {
//     return view('welcome');
// })->name('client.home');
Route::view('home','welcome')->name('home');
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/hotel/{hotel}/detail', [HomeController::class, 'show'])->name('hotels.detail');

// Route::get('/Chambre',[ChambreController::class,'index'])->name("Chambre.index");
// Route::get('/Chambre/add',[ChambreController::class,'create'])->name("Chambre.create");
// Route::post('/Chambre/add',[ChambreController::class,'store'])->name("Chambre.store");
// Route::delete('/Chambre/delete/{Chambre}',[ChambreController::class,'destroy'])->name("Chambre.destroy");
// Route::get('/Chambre/edit/{Chambre}',[ChambreContbfroller::class,'edit'])->name("Chambre.edit");
// Route::post('/Chambre/edit/{Chambre}',[ChambreController::class,'update'])->name("Chambre.update");
// Route::get('/Chambre/show/{Chambre}',[ChambreController::class,'show'])->name("Chambre.show");


Route::resource('hotels', HotelController::class)->middleware('Role');
Route::resource('images', ImageController::class);


Route::get('login', function () {
    return view('auth.login');
})->name('login');

Route::post('login', LoginController::class)->name('login.attempt');
Route::view('home', 'home')->name('home');

Route::view('register', 'auth.register');
Route::post('register', RegisterController::class)->name('register.user');


Route::get('login', function () {
    return view('auth.login');
})->name('login');

Route::post('login', LoginController::class)->name('login.attempt');
Route::view('home', 'home')->name('home');

Route::view('register', 'auth.register');
Route::post('register', RegisterController::class)->name('register.user');
Route::post('register', RegisterController::class)->name('register.user');

Route::resource('rooms',RoomController::class);
Route::get('rooms/createAndHotel/{hotel}',[RoomController::class,'createAndHotel'])->name('createAndHotel');
Route::resource('rooms', RoomController::class);

Route::view('admin', 'admin.dashboard')->name('admin')->middleware('Role');
Route::post('roleSave', [RoleController::class, 'store'])->name('role.save');
Route::post('logout', [LogoutController::class, 'logout'])->name('logout');

Route::view('admin', 'admin.dashboard')->name('admin')->middleware('Role');
Route::post('roleSave', [RoleController::class, 'store'])->name('role.save');
Route::post('logout', [LogoutController::class, 'logout'])->name('logout');

Route::post('validate', [RoleController::class, 'validate'])->name('manager.validate');
Route::get('/admin', function () {
    $pendingHotels = Hotel::where('is_validate', false)->get();
    $totalUsers = User::count();
    $pendingApprovals = $pendingHotels->count();
    $allusers = User::all();
    return view('admin.dashboard', compact('pendingHotels', 'totalUsers', 'pendingApprovals', 'allusers'));
})->middleware('Role');
Route::patch('/admin/hotels/{hotel}/approve', [AdminController::class, 'approveHotel'])
    ->name('admin.hotels.approve');

//Stripe
Route::get("/Paiement/{id}", [PaiementController::class, "index"])->name('reserv.index');
Route::post("/Paiement", [PaiementController::class, "store"])->name('stripe.post');
Route::get("/success", [PaiementController::class, "success"])->name('success');
Route::get("/cancel", [PaiementController::class, "cancel"])->name('cancel');

// Filtter

Route::post("/", [ChambreController::class, "filterDesponible"])->name('filte.date');
