<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Reservation;
use App\Notifications\ReservationApprovedNotification; // Import notifikasi untuk pengiriman email

class ReservationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); 
        //$this->middleware(['auth', 'verified']);
    }

    /**
     * Menampilkan form untuk membuat reservasi.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('reservasi');
    }

    /**
     * Menyimpan data reservasi baru.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'required|string|max:15',
        'date' => 'required|date',
        'time' => 'required',
        'notes' => 'nullable|string',
        'pembayaran' => 'required|file|max:2048',
        'consultation_method' => 'required|in:dm instagram,video call,offline',
    ]);

    if ($request->hasFile('pembayaran')) {
        try {
            $file = $request->file('pembayaran');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('uploads', $fileName, 'public');

            $reservation = Reservation::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'date' => $request->date,
                'time' => $request->time,
                'notes' => $request->notes,
                'payment_proof' => $filePath, 
                'status' => 'pending',
                'consultation_method' => $request->consultation_method,
            ]);

            Log::info('Reservasi berhasil dibuat: ' . $reservation->id);
            return redirect()->route('reservation.create')->with('success', 'Reservation created successfully.');
        } catch (\Exception $e) {
            Log::error('Error saat menyimpan file atau reservasi: ' . $e->getMessage());
            return redirect()->back()->withErrors('Terjadi kesalahan saat menyimpan reservasi. Silakan coba lagi.');
        }
    } else {
        Log::error('Tidak ada file yang diunggah.');
        return redirect()->back()->withErrors('Tidak ada file yang diunggah.');
    }
}
    /**
     * Menampilkan daftar reservasi di halaman admin.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $reservations = Reservation::all();
        return view('admin.reservations.index', compact('reservations'));
    }

    /**
     * Mengupdate status reservasi (approve/reject).
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:approved,rejected',
        ]);

        $reservation = Reservation::findOrFail($id);

        $reservation->status = $request->status;
        $reservation->save();

        return redirect()->route('admin.reservations.index')->with('success', 'Reservation status updated successfully.');
    }

    /**
     * Menyetujui reservasi.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function approveReservation($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->status = 'approved';
        $reservation->save();      

        return redirect()->back()->with('success', 'Reservasi dengan ID ' . $reservation->id . ' telah disetujui.');
    }
}