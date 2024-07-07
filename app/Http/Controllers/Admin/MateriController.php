<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Materi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MateriController extends Controller
{
    public function index()
    {
        $data = Materi::all();
        return view('admin.kelas.materi', compact('data'));
    }

    public function tambahmateri()
    {
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

            return redirect()->route('materi')->with('success', 'Materi NIH berhasil ditambahkan.');
        }

        return redirect()->back()->with('error', 'Gagal mengupload materi.');
    }

    public function tampilkandata($id)
    {
        $data = Materi::find($id);
        return view('admin.kelas.tampil', compact('data'));
    }
    
    public function updatedata(Request $request, $id)
{
    $data = Materi::find($id);

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

    return redirect()->route('materi')->with('success', 'Materi NIH berhasil diupdate.');
}

    public function delete($id)
    {
        $data = Materi::find($id);
        $data->delete();

        return redirect()->route('materi')->with('success', 'Materi NIH berhasil dihapus.');
    }
}