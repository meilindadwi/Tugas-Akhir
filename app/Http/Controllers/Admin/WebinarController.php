<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Webinar;
use Illuminate\Http\Request;

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
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Sesuaikan dengan jenis file dan ukuran maksimal yang diinginkan
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
                'waktu' => $request->waktu ?? 'UTC', // Jika waktu tidak disediakan, gunakan nilai default 'UTC'
                'pembicara' => $request->pembicara,
            ]);

            return redirect()->back()->with('success', 'Foto berhasil diupload.');
        }

        return redirect()->back()->with('error', 'Gagal mengupload foto.');
    }
    
    public function tampilkandata($id){

            $data = Webinar::find($id);
            return view('admin.kelas.tampilwebinar', compact('data'));
    
        }
    
        public function updatedata(Request $request, $id){
            $data = Webinar::find($id);
            $data->update($request->all());
    
            return redirect()->route('webinar')->with('success','Data Berhasil Diupdate');
        }
    
        public function delete($id){
            $data = Webinar::find($id);
            $data->delete();
    
            return redirect()->route('webinar')->with('success','Data Berhasil Dihapus');
        }
}
