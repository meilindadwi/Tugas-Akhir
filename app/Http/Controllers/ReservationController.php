<?php

namespace App\Http\Controllers;

use App\Notifications\ReservationRejectedNotification;
use App\Notifications\ReservationStatusChanged;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Reservation;
use App\Notifications\ReservationApprovedNotification; 

class ReservationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); 
        //$this->middleware(['auth', 'verified']);
    }
    public function create()
    {
        return view('reservasi');
    }
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'date' => 'required|date',
        'time' => 'required',
        'notes' => 'nullable|string',
        'pembayaran' => 'required|file|max:2048',
        'consultation_method' => 'required|in:dm instagram,video call,offline',
    ]);

    $prices = [
        'dm instagram' => 200000,
        'video call' => 200000,
        'offline' => 300000,
    ];

    if ($request->hasFile('pembayaran')) {
        try {
            $file = $request->file('pembayaran');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('uploads', $fileName, 'public');

            $consultation_method = $request->consultation_method;
            $price = $prices[$consultation_method];
            $uniqueCode = $this->generateUniqueCode();
            $finalPrice = $price + $uniqueCode;

            $reservation = Reservation::create([
                'name' => $request->name,
                'email' => $request->email,
                'date' => $request->date,
                'time' => $request->time,
                'notes' => $request->notes,
                'payment_proof' => $filePath,
                'status' => 'pending',
                'consultation_method' => $request->consultation_method,
                'price' => $finalPrice,
            ]);

            Log::info('Reservasi berhasil dibuat: ' . $reservation->id);
            return redirect()->route('reservation.create')->with('success', 'Reservasi konseling sedang diverifikasi');
        } catch (\Exception $e) {
            Log::error('Error saat menyimpan file atau reservasi: ' . $e->getMessage());
            return redirect()->back()->withErrors('Terjadi kesalahan saat menyimpan reservasi. Silakan coba lagi.');
        }
    } else {
        Log::error('Tidak ada file yang diunggah.');
        return redirect()->back()->withErrors('Tidak ada file yang diunggah.');
    }
}

private function generateUniqueCode()
{
    return rand(100, 999); 
}

    
    public function index()
    {
        $reservations = Reservation::all();
        return view('admin.reservations.index', compact('reservations'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:approved,rejected',
        ]);
    
        try {
            $reservation = Reservation::findOrFail($id);
    
            // Simpan status baru
            $reservation->status = $request->status;
            $reservation->save();
    
            return redirect()->route('admin.reservations.index')->with('success', 'Reservation status updated successfully.');
        } catch (\Exception $e) {
            Log::error('Gagal memperbarui status reservasi: ' . $e->getMessage());
            return redirect()->route('admin.reservations.index')->with('error', 'Failed to update reservation status.');
        }
    }
    
}