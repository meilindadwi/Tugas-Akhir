<?php

use App\Http\Controllers\Admin\PmhmateriController;
use App\Http\Controllers\Admin\WebinarController;
use App\Http\Controllers\AdminTestimoniController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\Admin\MateriController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\KonselorController;
use App\Http\Controllers\Admin\DashboardController;

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
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/', [HomeController::class, 'store'])->name('testimoni.store');

//Auth::routes();


Route::get('/konseling', function () {
    return view('konseling', [
        "title" => "Konseling"
    ]);
});
Route::get('/notedm', function () {
    return view('notedm', [
        "title" => "notedm"
    ]);
});
Route::get('/notevc', function () {
    return view('notevc', [
        "title" => "notevc"
    ]);
});
Route::get('/notetm', function () {
    return view('notetm', [
        "title" => "notetm"
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
    // Rute untuk login dengan email dan password
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
});

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/home', function () {
    return redirect('/adminn');
});


Route::middleware(['auth'])->group(function () {
    Route::get('/adminn', [DashboardController::class, 'admin'])->middleware('userAkses:admin');
    Route::get('/konselor', [DashboardController::class, 'konselor'])->middleware('userAkses:konselor');
    Route::get('/materi', [MateriController::class, 'index'])->name('materi');

    Route::get('/materipmh', [PmhmateriController::class, 'index'])->name('materipmh');
    Route::get('/tambahmateripmh', [PmhmateriController::class, 'tambahmateri'])->name('tambahmateripmh');
    Route::post('/insertdatapmh', [PmhmateriController::class, 'insertdata'])->name('insertdatapmh');
    Route::get('/tampilkandatapmh/{id}', [PmhmateriController::class, 'tampilkandata'])->name('tampilkandatapmh');
    Route::post('/updatedatapmh/{id}', [PmhmateriController::class, 'updatedata'])->name('updatedatapmh');
    Route::get('/deletepmh/{id}', [PmhmateriController::class, 'delete'])->name('deletepmh');

    Route::get('/webinar', [WebinarController::class, 'index'])->name('webinar');
    Route::get('/tambahmateriwebinar', [WebinarController::class, 'tambahmateri'])->name('tambahmateriwebinar');
    Route::post('/insertdatawebinar', [WebinarController::class, 'insertdata'])->name('insertdatawebinar');
    Route::get('/tampilkandatawebinar/{id}', [WebinarController::class, 'tampilkandata'])->name('tampilkandatawebinar');
    Route::post('/updatedatawebinar/{id}', [WebinarController::class, 'updatedata'])->name('updatedatawebinar');
    Route::get('/deletewebinar/{id}', [WebinarController::class, 'delete'])->name('deletewebinar');

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
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/admin/testimoni', [AdminTestimoniController::class, 'index'])->name('admin.testimoni.index');
    Route::post('/admin/testimoni/update/{id}', [AdminTestimoniController::class, 'updateStatus'])->name('admin.testimoni.updateStatus');
});

Route::get('/about', function () {
    return view('about', [
        "title" => "About"
    ]);
});

Route::get('/psikolog', [UserController::class, 'index'])->name('psikolog');
Route::get('/upmateri', [UserController::class, 'dashboard'])->name('materi');
Route::get('/upmateripmh', [UserController::class, 'materi'])->name('materipmh');
Route::get('/upwebinar', [UserController::class, 'webinar'])->name('webinar');

Route::middleware(['auth'])->group(function () {
    // Route for logged-in users
    Route::get('/reservasi', [ReservationController::class, 'create'])->name('reservation.create');
    Route::post('/reservasi', [ReservationController::class, 'store'])->name('reservation.store');

    // Routes for admin
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/reservations', [ReservationController::class, 'index'])->name('reservations.index');
        //Route::get('/pesan', [EmailController::class, 'notif'])->name('pesan.approve_reject');
        Route::post('/reservations/{id}/update-status', [ReservationController::class, 'updateStatus'])->name('reservations.updateStatus');
    });
});

Route::middleware(['auth'])->group(function () {
    // Route for logged-in users
    Route::get('/payment', [PaymentController::class, 'create'])->name('payment.create');
    Route::post('/payment', [PaymentController::class, 'store'])->name('payment.store');

    // Routes for admin
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/payments', [PaymentController::class, 'index'])->name('payments.index');
        Route::post('/payments/{id}/update-status', [PaymentController::class, 'updateStatus'])->name('payments.updateStatus');
    });
});