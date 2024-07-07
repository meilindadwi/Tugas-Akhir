<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Iht;
use App\Models\Kelas;
use App\Models\Konseling;
use App\Models\Konselor;
use App\Models\Materi;
use App\Models\Pmhmateri;
use App\Models\Safari;
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

    public function konseling()
    {
        $konseling = Konseling::all();
        return view('konseling', compact('konseling'));
    }
    public function kelas()
    {
        $kelas = Kelas::all();
        return view('kelas', compact('kelas'));
    }
    public function iht()
    {
        $iht = Iht::all();
        return view('training', compact('iht'));
    }
    public function safari()
    {
        $safaris = Safari::all();
        return view('safari', compact('safaris'));
    }
    public function about()
    {
        $abouts = About::all();
        return view('about', compact('abouts'));
    }
    public function notifikasi()
    {
        $unreadNotifications = auth()->user()->unreadNotifications;
        return view('partials.navbar', compact('unreadNotifications'));
    }
}