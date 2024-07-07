<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\IhtController;
use App\Http\Controllers\Admin\KelasController;
use App\Http\Controllers\Admin\KonselingController;
use App\Http\Controllers\Admin\PmhmateriController;
use App\Http\Controllers\Admin\SafariController;
use App\Http\Controllers\Admin\WebinarController;
use App\Http\Controllers\AdminTestimoniController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotificationController;
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
//Route::get('/', [HomeController::class, 'index'])->name('home');
//Route::post('/', [HomeController::class, 'store'])->name('testimoni.store');

Route::get('/', [HomeController::class, 'index'])->name('home')->middleware('auth');
Route::post('/', [HomeController::class, 'store'])->name('testimoni.store')->middleware('auth');

//Auth::routes();

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

Route::middleware(['guest'])->group(function(){
    // Rute untuk login dengan email dan password
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
});

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

//Route::get('/home', function () {
    //return redirect('/adminn');
//});


Route::middleware(['auth'])->group(function () {
    Route::get('/adminn', [DashboardController::class, 'admin'])->middleware('userAkses:admin');
    Route::get('/adminn', [DashboardController::class, 'index'])->middleware('userAkses:admin');
    Route::get('/konselor', [DashboardController::class, 'konselor'])->middleware('userAkses:konselor');

    Route::get('/materipmh', [PmhmateriController::class, 'index'])->name('materipmh');
    Route::get('/tambahmateripmh', [PmhmateriController::class, 'tambahmateri'])->name('tambahmateripmh');
    Route::post('/insertdatapmh', [PmhmateriController::class, 'insertdata'])->name('insertdatapmh');
    Route::get('/tampilkandatapmh/{id}', [PmhmateriController::class, 'tampilkandata'])->name('tampilkandatapmh');
    Route::post('/updatedatapmh/{id}', [PmhmateriController::class, 'updatedata'])->name('updatedatapmh');
    Route::get('/deletepmh/{id}', [PmhmateriController::class, 'delete'])->name('deletepmh');

    Route::get('/admin/webinar', [WebinarController::class, 'index'])->name('admin.webinar');
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

    Route::get('/admin/konseling', [KonselingController::class, 'index'])->name('admin.konseling.konseling');
    Route::get('/admin/konseling/create', [KonselingController::class, 'create'])->name('tambahkonseling');
    Route::post('/admin/konseling/store', [KonselingController::class, 'store'])->name('inputdatakonseling');
    Route::get('/admin/konseling/edit/{id}', [KonselingController::class, 'edit'])->name('tampildatakonseling');
    Route::put('/admin/konseling/update/{id}', [KonselingController::class, 'update'])->name('updatekonseling');
    Route::delete('/admin/konseling/delete/{id}', [KonselingController::class, 'destroy'])->name('deletedatakonseling');

    Route::get('/admin/kelas', [KelasController::class, 'index'])->name('admin.kelas.paket');
    Route::get('/admin/kelas/create', [KelasController::class, 'create'])->name('tambahpaket');
    Route::post('/admin/kelas/store', [KelasController::class, 'store'])->name('inputpaket');
    Route::get('/admin/kelas/edit/{id}', [KelasController::class, 'edit'])->name('tampilpaket');
    Route::put('/admin/kelas/update/{id}', [KelasController::class, 'update'])->name('updatepaket');
    Route::delete('/admin/kelas/delete/{id}', [KelasController::class, 'destroy'])->name('deletepaket');

    Route::get('/admin/training', [IhtController::class, 'index'])->name('admin.iht.iht');
    Route::get('/admin/training/create', [IhtController::class, 'create'])->name('tambahiht');
    Route::post('/admin/training/store', [IhtController::class, 'store'])->name('inputiht');
    Route::get('/admin/training/edit/{id}', [IhtController::class, 'edit'])->name('tampiliht');
    Route::put('/admin/training/update/{id}', [IhtController::class, 'update'])->name('updateiht');
    Route::delete('/admin/training/delete/{id}', [IhtController::class, 'destroy'])->name('deleteiht');

    Route::get('/admin/safari', [SafariController::class, 'index'])->name('admin.safari.index');
    Route::get('/admin/safari/create', [SafariController::class, 'create'])->name('admin.safari.create');
    Route::post('/admin/safari/store', [SafariController::class, 'store'])->name('admin.safari.store');
    Route::delete('/admin/safari/delete/{id}', [SafariController::class, 'destroy'])->name('admin.safari.destroy');

    Route::get('/admin/about', [AboutController::class, 'index'])->name('about.index');
    Route::get('/admin/about/create', [AboutController::class, 'create'])->name('about.create');
    Route::post('/admin/about/store', [AboutController::class, 'store'])->name('about.store');
    Route::get('/admin/about/edit/{id}', [AboutController::class, 'edit'])->name('about.edit');
    Route::put('/admin/about/update/{id}', [AboutController::class, 'update'])->name('about.update');
    Route::delete('/admin/about/delete/{id}', [AboutController::class, 'destroy'])->name('about.destroy');

    Route::get('/materi', [MateriController::class, 'index'])->name('materi');
    Route::get('/tambahmateri', [MateriController::class, 'tambahmateri'])->name('tambahmateri');
    Route::post('/insertdata', [MateriController::class, 'insertdata'])->name('insertdata');
    Route::get('/tampilkandata/{id}', [MateriController::class, 'tampilkandata'])->name('tampilkandata');
    Route::post('/updatedata/{id}', [MateriController::class, 'updatedata'])->name('updatedata');
    Route::get('/delete/{id}', [MateriController::class, 'delete'])->name('delete');

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/admin/testimoni', [AdminTestimoniController::class, 'index'])->name('admin.testimoni.index');
    Route::post('/admin/testimoni/update/{id}', [AdminTestimoniController::class, 'updateStatus'])->name('admin.testimoni.updateStatus');
});

Route::get('/psikolog', [UserController::class, 'index'])->name('psikolog');
Route::get('/upmateri', [UserController::class, 'dashboard'])->name('upmateri');
Route::get('/upmateripmh', [UserController::class, 'materi'])->name('upmateripmh');
Route::get('/upwebinar', [UserController::class, 'webinar'])->name('webinar');
Route::get('/konseling', [UserController::class, 'konseling'])->name('konseling');
Route::get('/kelas', [UserController::class, 'kelas'])->name('kelas');
Route::get('/training', [UserController::class, 'iht'])->name('iht');
Route::get('/safari', [UserController::class, 'safari'])->name('safari');
Route::get('/about', [UserController::class, 'about'])->name('about');
Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
Route::get('/notifications/{id}', [NotificationController::class, 'show'])->name('notifications.show');



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