<?php

namespace App\Http\Controllers;

use App\Models\Konselor;
use App\Models\Materi;
use App\Models\Pmhmateri;
use App\Models\Webinar;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $konselors = Konselor::all();
        return view('psikolog', compact('konselors'));
    }

    public function dashboard()
    {
        $materis = Materi::all();
        return view('materi', compact('materis'));
    }
    public function materi()
    {
        $materis = Pmhmateri::all();
        return view('materipmh', compact('materis'));
    }
    public function webinar()
    {
        $materis = Webinar::all();
        return view('webinar', compact('materis'));
    }
}