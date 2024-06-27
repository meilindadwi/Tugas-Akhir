<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pmhmateri;
use Illuminate\Http\Request;

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

            return redirect()->back()->with('success', 'Video berhasil diupload.');
        }

        return redirect()->back()->with('error', 'Gagal mengupload video.');
    }
    
    public function tampilkandata($id){

            $data = Pmhmateri::find($id);
            return view('admin.kelas.tampilpmh', compact('data'));
    
        }
    
        public function updatedata(Request $request, $id){
            $data = Pmhmateri::find($id);
            $data->update($request->all());
    
            return redirect()->route('materipmh')->with('success','Data Berhasil Diupdate');
        }
    
        public function delete($id){
            $data = Pmhmateri::find($id);
            $data->delete();
    
            return redirect()->route('materipmh')->with('success','Data Berhasil Dihapus');
        }
}
