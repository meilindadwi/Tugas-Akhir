<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Webinar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WebinarController extends Controller
{
    function index(){

        $data = Webinar::all();
        return view('admin.kelas.webinar',compact('data'));
    }

        public function tambahmateri(){
        return view('admin.kelas.tambahwebinar');
    }

    public function insertdata(Request $request)
    {
        
        // Validasi input
        $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Simpan file foto
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('foto', $filename, 'public');

            // Simpan path file ke database
            Webinar::create([
                'judul' => $request->judul,
                'deskripsi_materi' => $request->deskripsi_materi,
                'foto' => $path,
                'tanggal' => $request->tanggal,
                'waktu' => $request->waktu ?? 'UTC',
                'pembicara' => $request->pembicara,
            ]);

            return redirect()->route('admin.webinar')->with('success', 'Webinar berhasil ditambahkan.');
        }

        return redirect()->back()->with('error', 'Gagal menambahkan webinar.');
    }
    
    public function tampilkandata($id){

            $data = Webinar::find($id);
            return view('admin.kelas.tampilwebinar', compact('data'));
    
        }
        public function updatedata(Request $request, $id)
{
    $data = Webinar::find($id);

    // Validasi input
    $request->validate([
        'judul' => 'required|string|max:255',
        'deskripsi_materi' => 'required|string',
        'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'tanggal' => 'required|date',
        'waktu' => 'nullable|date_format:H:i',
        'pembicara' => 'required|string',
    ]);

    // Update data
    $data->judul = $request->input('judul');
    $data->deskripsi_materi = $request->input('deskripsi_materi');
    $data->tanggal = $request->input('tanggal');
    $data->waktu = $request->input('waktu') ?? 'UTC';
    $data->pembicara = $request->input('pembicara');

    // Simpan foto baru jika ada
    if ($request->hasFile('foto')) {
        // Hapus foto lama jika ada
        if ($data->foto) {
            Storage::delete('public/' . $data->foto);
        }
        // Simpan foto baru
        $file = $request->file('foto');
        $filename = time() . '_' . $file->getClientOriginalName();
        $path = $file->storeAs('foto', $filename, 'public');
        $data->foto = $path;
    }

    $data->save();

    return redirect()->route('admin.webinar')->with('success', 'Webinar berhasil diupdate.');
}

    
        public function delete($id){
            $data = Webinar::find($id);
            $data->delete();
    
            return redirect()->route('admin.webinar')->with('success','Webinar Berhasil Dihapus');
        }
}