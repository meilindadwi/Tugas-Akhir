<?php

use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MaterisController;
use App\Http\Controllers\KonselorsController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\MateriController;
use App\Http\Controllers\Admin\KonselorController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\ReservationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home', [
        "title" => "Home"
    ]);
});

Route::get('/konseling', function () {
    return view('konseling', [
        "title" => "Konseling"
    ]);
});

Route::get('/kelas', function () {
    return view('kelas', [
        "title" => "Kelas"
    ]);
});

Route::get('/training', function () {
    return view('training', [
        "title" => "Training"
    ]);
});

Route::get('/safari', function () {
    return view('safari', [
        "title" => "Safari"
    ]);
});


Route::middleware(['guest'])->group(function(){
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
});

Route::get('/home',function(){
    return redirect('/adminn');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/adminn', [DashboardController::class, 'index']);
    Route::get('/adminn/home', [DashboardController::class, 'user']);
    
    // Route::get('/materi', function () {
    //     return view('admin.materi');
    // });
    Route::get('/materi', [MateriController::class, 'index'])->name('materi');
    Route::get('/konselor', [KonselorController::class, 'index'])->name('konselor');
    Route::get('/tambahkonselor', [KonselorController::class, 'tambahkonselor'])->name('tambahkonselor');
    Route::post('/inputdata', [KonselorController::class, 'inputdata'])->name('inputdata');
    Route::get('/tampildata/{id}', [KonselorController::class, 'tampildata'])->name('tampildata');
    Route::post('/updatekonselor/{id}', [KonselorController::class, 'updatekonselor'])->name('updatekonselor');
    Route::get('/deletedata/{id}', [KonselorController::class, 'deletedata'])->name('deletedata');
    
    Route::get('/tambahmateri', [MateriController::class, 'tambahmateri'])->name('tambahmateri');
    Route::post('/insertdata', [MateriController::class, 'insertdata'])->name('insertdata');
    Route::get('/tampilkandata/{id}', [MateriController::class, 'tampilkandata'])->name('tampilkandata');
    Route::post('/updatedata/{id}', [MateriController::class, 'updatedata'])->name('updatedata');
    Route::get('/delete/{id}', [MateriController::class, 'delete'])->name('delete');
    Route::get('/logout', [LoginController::class, 'logout']);
});

Route::get('/about', function () {
    return view('about', [
        "title" => "About"
    ]);
});

Route::get('/psikolog', function () {
    return view('psikolog', [
        "title" => "Psikolog"
    ]);
});

Route::get('/reservasi', [ReservationController::class, 'create'])->name('reservasi');
Route::post('/reservasi', [ReservationController::class, 'store'])->name('reservations.store');

Route::get('/payment', [PaymentController::class, 'create'])->name('payment');
Route::post('/payment', [PaymentController::class, 'store'])->name('payment.store');

Route::get('/register', function () {
    return view('register', [
        "title" => "Register"
    ]);
});