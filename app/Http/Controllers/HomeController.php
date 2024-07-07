<?php

namespace App\Http\Controllers;

use App\Models\Konselor;
use App\Models\Testimoni;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Menampilkan halaman home dengan daftar konselor dan testimoni.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $konselors = Konselor::all();
        $testimonis = Testimoni::where('status', 'approved')->get();
        $unreadNotifications = auth()->user()->unreadNotifications;

        auth()->user()->unreadNotifications->markAsRead();
        
        return view('home', [
            'title' => 'Home',
            'konselors' => $konselors,
            'testimonis' => $testimonis,
            'unreadNotifications' => $unreadNotifications,
        ]);
    }

    /**
     * Simpan testimoni yang dikirimkan dari form.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validasi data testimoni
        $request->validate([
            'testimoni' => 'required',
            'nama' => 'required',
        ]);

        // Simpan data testimoni ke dalam database dengan status "pending"
        $testimoni = new Testimoni;
        $testimoni->testimoni = $request->testimoni;
        $testimoni->nama = $request->nama;
        $testimoni->status = 'pending'; // status "pending"
        $testimoni->save();

        return redirect()->back()->with('success', 'Testimoni Anda telah dikirim dan sedang menunggu persetujuan.');
    }
}