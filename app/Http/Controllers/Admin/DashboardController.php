<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Reservation;
use App\Models\User;

class DashboardController extends Controller
{
    function admin(){
        return view('admin.dashboard');
    }
    function konselor(){
        return view('admin.dashboard');
    }
    public function index()
    {
        $totalUsers = User::count();
        $totalReservations = Reservation::count();
        $totalClass = Payment::count();

        //totaluang
        $totalReservationPayment = Reservation::sum('price');
        $totalPaymentPayment = Payment::sum('price');
        $totalPayment = $totalReservationPayment + $totalPaymentPayment;
        return view('admin.dashboard', compact('totalUsers', 'totalReservations', 'totalClass', 'totalPayment'));
    }
}

