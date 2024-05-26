<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use App\Models\Reservation;

class ReservationController extends Controller
{
    public function create()
    {
        return view('reservasi');
    }

    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:15',
            'date' => 'required|date',
            'time' => 'required',
            'notes' => 'nullable|string',
            'pembayaran' => 'required|file|max:2048',
        ]);

        // Simpan file pembayaran
        if ($request->hasFile('pembayaran')) {
            $file = $request->file('pembayaran');
            $fileName = time().'_'.$file->getClientOriginalName();
            $filePath = $file->storeAs('uploads', $fileName);

            if ($filePath) {
                Log::info('File berhasil diunggah: ' . $fileName);
            } else {
                Log::error('Penyimpanan file gagal.');
            }
        } else {
            Log::error('Tidak ada file yang diunggah.');
            $fileName = null;
        }

        // Simpan data reservasi beserta nama file pembayaran ke dalam database
        try {
            $reservation = Reservation::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'date' => $request->date,
                'time' => $request->time,
                'notes' => $request->notes,
                'payment_proof' => $fileName,
            ]);

            if ($reservation) {
                Log::info('Reservasi berhasil dibuat: ' . $reservation->id);
            } else {
                Log::error('Pembuatan reservasi gagal.');
            }
        } catch (\Exception $e) {
            Log::error('Error saat menyimpan reservasi: ' . $e->getMessage());
        }

        return redirect()->route('reservasi')->with('success', 'Reservation created successfully.');
    }
}