<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Payment; 

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); 
    }
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
            'date' => 'required|date',
            'payment_proof' => 'required|file|max:2048',
            'class' => 'required|in:nih,pmh,webinar',
        ]);

        $prices = [
            'nih' => 200000,
            'pmh' => 150000,
            'webinar' => 0,
            ];

        // Simpan file pembayaran
        if ($request->hasFile('payment_proof')) {
            try {
                $file = $request->file('payment_proof');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $filePath = $file->storeAs('uploads', $fileName, 'public');

                $class = $request->class;
                $price = $prices[$class];
                $uniqueCode = $this->generateUniqueCode();
                $finalPrice = $price + $uniqueCode;

                // Buat entri pembayaran baru
                $payment = Payment::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'date' => $request->date,
                    'payment_proof' => $filePath,
                    'status' => 'pending',
                    'class' => $class,
                    'price' => $finalPrice,
                ]);

                // Log berhasil
                Log::info('Pembayaran berhasil: ' . $payment->id);
                return redirect()->route('payment.create')->with('success', 'Pembayaran sedang diverifikasi');
            } catch (\Exception $e) {
                // Log error saat menyimpan file
                Log::error('Error saat menyimpan file: ' . $e->getMessage());
                return redirect()->back()->withErrors('Terjadi kesalahan saat menyimpan file. Silakan coba lagi.');
            }
        } else {
            // Log error jika tidak ada file yang diunggah
            Log::error('Tidak ada file yang diunggah.');
            return redirect()->back()->withErrors('Tidak ada file yang diunggah.');
        }
    }
    private function generateUniqueCode()
    {
        return rand(100, 999); // Menghasilkan kode unik 3 digit
    }

    public function index()
    {
        $payments = Payment::all();
        return view('admin.payments.index', compact('payments'));
    }
    public function updateStatus(Request $request, $id)
{
    // Validasi status
    $request->validate([
        'status' => 'required|in:approved,rejected',
    ]);

    $payment = Payment::findOrFail($id); // Menggunakan findOrFail untuk menghandle not found

    // Set status pembayaran
    $payment->status = $request->status;
    $payment->save();

    return redirect()->route('admin.payments.index')->with('success', 'Payment status updated successfully.');
}

}
