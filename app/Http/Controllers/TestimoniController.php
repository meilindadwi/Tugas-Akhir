<?php

namespace App\Http\Controllers;

use App\Models\Testimoni;
use Illuminate\Http\Request;

class TestimoniController extends Controller
{
    public function store(Request $request)
{
    // Validasi data testimoni
    $request->validate([
        'testimoni' => 'required',
        'nama' => 'required',
        'status' => 'required|in:pending,approved,rejected', // Pastikan status sesuai ENUM
    ]);

    // Simpan data testimoni ke dalam database
    Testimoni::create([
        'testimoni' => $request->testimoni,
        'nama' => $request->nama,
        'status' => $request->status, // Pastikan nilai status yang disimpan valid
    ]);

    return redirect()->back()->with('success', 'Testimoni Anda telah dikirim dan sedang menunggu persetujuan.');
}
}