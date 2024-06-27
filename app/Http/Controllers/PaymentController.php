<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Payment; // Pastikan model Payment diimpor
use App\Notifications\PaymentReceivedNotification; // Jika menggunakan notifikasi

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); 
    }

    /**
     * Menampilkan form untuk membuat pembayaran.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('payment');
    }

    /**
     * Menyimpan data pembayaran baru.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:15',
            'payment_proof' => 'required|file|max:2048',
            'class' => 'required|in:nih,pmh,webinar',
        ]);

        // Simpan file pembayaran
        if ($request->hasFile('payment_proof')) {
            try {
                $file = $request->file('payment_proof');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $filePath = $file->storeAs('uploads', $fileName, 'public');

                // Buat entri pembayaran baru
                $payment = Payment::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'payment_proof' => $filePath,
                    'status' => 'pending',
                    'class' => $request->class,
                ]);

                // Log berhasil
                Log::info('Pembayaran berhasil: ' . $payment->id);
                return redirect()->route('payment.create')->with('success', 'Pembayaran Berhasil.');
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

    /**
     * Menampilkan daftar pembayaran di halaman admin.
     *
     * @return \Illuminate\View\View
     */
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
public function approvePayment($id)
{
    $payment = Payment::findOrFail($id);
    $payment->status = 'approved';
    $payment->save();

    return redirect()->back()->with('success', 'Payment with ID ' . $payment->id . ' has been approved.');
}

}
