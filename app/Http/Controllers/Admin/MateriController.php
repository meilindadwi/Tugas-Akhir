<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Materi;
use Database\Seeders\MateriSeeder;
use Illuminate\Http\Request;

class MateriController extends Controller
{
        function index(){

        $data = materi::all();
        return view('admin.kelas.materi',compact('data'));
    }

        public function tambahmateri(){
        return view('admin.kelas.tambah');
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
            Materi::create([
                'judul' => $request->judul,
            'deskripsi_materi' => $request->deskripsi_materi,
                'video_materi' => $path,
            ]);

            return redirect()->back()->with('success', 'Video berhasil diupload.');
        }

        return redirect()->back()->with('error', 'Gagal mengupload video.');
    }
    
    public function tampilkandata($id){

            $data = materi::find($id);
            return view('admin.kelas.tampil', compact('data'));
    
        }
    
        public function updatedata(Request $request, $id){
            $data = materi::find($id);
            $data->update($request->all());
    
            return redirect()->route('materi')->with('success','Data Berhasil Diupdate');
        }
    
        public function delete($id){
            $data = materi::find($id);
            $data->delete();
    
            return redirect()->route('materi')->with('success','Data Berhasil Dihapus');
        }

    //
    // public function store(Request $request)
    // {
    //     // Validasi input
    //     $request->validate([
    //         'video' => 'required|mimes:mp4,mov,ogg,qt|max:20000', // Sesuaikan dengan jenis file dan ukuran maksimal yang diinginkan
    //     ]);

    //     // Simpan file video
    //     if ($request->hasFile('video')) {
    //         $file = $request->file('video');
    //         $filename = time() . '_' . $file->getClientOriginalName();
    //         $path = $file->storeAs('videos', $filename, 'public');

    //         // Simpan path file ke database
    //         materi::create([
    //             'video' => $path,
    //         ]);

    //         return redirect()->back()->with('success', 'Video berhasil diupload.');
    //     }

    //     return redirect()->back()->with('error', 'Gagal mengupload video.');
    // }
    // function index(){

    //     $data = materi::all();
    //     return view('admin.kelas.materi',compact('data'));
    // }

    // public function tambahmateri(){
    //     return view('admin.kelas.tambah');
    // }

    // public function insertdata(Request $request)
    // {
    //     // Validasi input
    //     $request->validate([
    //         'judul' => 'required|string|max:255',
    //         'deskripsi' => 'required|string',
    //         'video' => 'required|mimes:mp4,mov,ogg,qt|max:51200', // 51200 KB = 50 MB
    //     ]);

    //     // Buat instance Materi baru dan simpan data awal (tanpa video)
    //     $data = Materi::create([
    //         'judul' => $request->judul,
    //         'deskripsi' => $request->deskripsi,
    //         // Jangan sertakan 'video' karena akan ditambahkan setelah file diunggah
    //     ]);

    //     // Cek apakah ada file video yang diupload
    //     if ($request->hasFile('video')) {
    //         // Pindahkan file video ke folder 'videomateri' di storage
    //         $videoPath = $request->file('video')->store('videomateri', 'public');

    //         // Simpan path video ke dalam database
    //         $data->video = $videoPath;
    //         $data->save();
    //     }

    //     return redirect()->route('materi')->with('success', 'Data Berhasil Ditambahkan');
    // }
    
    // public function tampilkandata($id){

    //     $data = materi::find($id);
    //     return view('admin.kelas.tampil', compact('data'));

    // }

    // public function updatedata(Request $request, $id){
    //     $data = materi::find($id);
    //     $data->update($request->all());

    //     return redirect()->route('materi')->with('success','Data Berhasil Diupdate');
    // }

    // public function delete($id){
    //     $data = materi::find($id);
    //     $data->delete();

    //     return redirect()->route('materi')->with('success','Data Berhasil Dihapus');
    // }
}
