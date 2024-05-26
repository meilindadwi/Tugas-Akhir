<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function create()
    {
        return view('payment');
    }

    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:15',
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
            $payment = Payment::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'payment_proof' => $fileName,
            ]);

            if ($payment) {
                Log::info('Reservasi berhasil dibuat: ' . $payment->id);
            } else {
                Log::error('Pembuatan reservasi gagal.');
            }
        } catch (\Exception $e) {
            Log::error('Error saat menyimpan reservasi: ' . $e->getMessage());
        }

        return redirect()->route('payment')->with('success', 'Reservation created successfully.');
    }
}
