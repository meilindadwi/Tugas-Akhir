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
            'video_materi' => 'required|mimes:mp4,mov,ogg,qt|max:20000', 
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
}
