<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Konseling;
use Illuminate\Http\Request;

class KonselingController extends Controller
{
    public function index()
    {
        $konseling = Konseling::all();
        return view('admin.konseling.konseling', compact('konseling'));
    }

    public function create()
    {
        return view('admin.konseling.tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'deskripsi' => 'required|string',
        ]);

        Konseling::create($request->all());

        return redirect()->route('admin.konseling.konseling')->with('success', 'Paket konseling berhasil ditambahkan');
    }
    public function edit($id)
    {
        $konseling = Konseling::findOrFail($id);
        return view('admin.konseling.tampil', compact('konseling'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'deskripsi' => 'required|string',
        ]);

        $konseling = Konseling::findOrFail($id);
        $konseling->update($request->all());

        return redirect()->route('admin.konseling.konseling')->with('success', 'Paket konseling berhasil diupdate');
    }

    public function destroy($id)
    {
        $konseling = Konseling::findOrFail($id);
        $konseling->delete();

        return redirect()->route('admin.konseling.konseling')->with('success', 'Paket konseling berhasil dihapus');
    }
}