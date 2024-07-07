<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        $kelas = Kelas::all();
        return view('admin.kelas.paket', compact('kelas'));
    }

    public function create()
    {
        return view('admin.kelas.tambahpaket');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'deskripsi' => 'required|string',
        ]);

        Kelas::create($request->all());

        return redirect()->route('admin.kelas.paket')->with('success', 'Paket kelas online berhasil ditambahkan');
    }
    public function edit($id)
    {
        $kelas = Kelas::findOrFail($id);
        return view('admin.kelas.tampilpaket', compact('kelas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'deskripsi' => 'required|string',
        ]);

        $kelas = Kelas::findOrFail($id);
        $kelas->update($request->all());

        return redirect()->route('admin.kelas.paket')->with('success', 'Paket kelas online berhasil diupdate');
    }

    public function destroy($id)
    {
        $kelas = Kelas::findOrFail($id);
        $kelas->delete();

        return redirect()->route('admin.kelas.paket')->with('success', 'Paket kelas online berhasil dihapus');
    }
}
