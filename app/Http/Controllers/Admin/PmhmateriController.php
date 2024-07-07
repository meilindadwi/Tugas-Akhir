<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pmhmateri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PmhmateriController extends Controller
{
    function index(){

        $data = Pmhmateri::all();
        return view('admin.kelas.materipmh',compact('data'));
    }

        public function tambahmateri(){
        return view('admin.kelas.tambahpmh');
    }
    public function insertdata(Request $request)
    {
        
        // Validasi input
        $request->validate([
            'video_materi' => 'required|mimes:mp4,mov,ogg,qt|max:20000', // Sesuaikan dengan jenis file dan ukuran maksimal yang diinginkan
        ]);

        // Simpan file video
        if ($request->hasFile('video_materi')) {
            $file = $request->file('video_materi');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('videos', $filename, 'public');

            // Simpan path file ke database
            Pmhmateri::create([
                'judul' => $request->judul,
            'deskripsi_materi' => $request->deskripsi_materi,
                'video_materi' => $path,
            ]);

            return redirect()->route('materipmh')->with('success', 'Materi PMH berhasil ditambahkan.');
        }

        return redirect()->back()->with('error', 'Gagal mengupload materi.');
    }
    
    public function tampilkandata($id){

            $data = Pmhmateri::find($id);
            return view('admin.kelas.tampilpmh', compact('data'));
    
        }
        public function updatedata(Request $request, $id)
{
    $data = Pmhmateri::find($id);

    // Validasi input
    $request->validate([
        'judul' => 'required|string|max:255',
        'deskripsi_materi' => 'required|string',
        'video_materi' => 'nullable|mimes:mp4,mov,ogg,qt|max:20000',
    ]);

    $updateData = [
        'judul' => $request->input('judul'),
        'deskripsi_materi' => $request->input('deskripsi_materi'),
    ];

    if ($request->hasFile('video_materi')) {
        // Hapus file lama jika ada file baru
        if ($data->video_materi) {
            Storage::delete('public/' . $data->video_materi);
        }
        // Simpan file baru
        $file = $request->file('video_materi');
        $filename = time() . '_' . $file->getClientOriginalName();
        $path = $file->storeAs('videos', $filename, 'public');
        $updateData['video_materi'] = $path;
    }

    $data->update($updateData);

    return redirect()->route('materipmh')->with('success', 'Materi PMH berhasil diupdate.');
}
    
        public function delete($id){
            $data = Pmhmateri::find($id);
            $data->delete();
    
            return redirect()->route('materipmh')->with('success', 'Materi PMH berhasil dihapus.');
        }
}
