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
}

