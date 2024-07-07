<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Iht;
use Illuminate\Http\Request;

class IhtController extends Controller
{
    public function index()
    {
        $iht = Iht::all();
        return view('admin.iht.iht', compact('iht'));
    }

    public function create()
    {
        return view('admin.iht.tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'deskripsi' => 'required|string',
        ]);

        Iht::create($request->all());

        return redirect()->route('admin.iht.iht')->with('success', 'Paket in house training berhasil ditambahkan');
    }
    public function edit($id)
    {
        $iht = Iht::findOrFail($id);
        return view('admin.iht.tampil', compact('iht'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'deskripsi' => 'required|string',
        ]);

        $iht = Iht::findOrFail($id);
        $iht->update($request->all());

        return redirect()->route('admin.iht.iht')->with('success', 'Paket in house training berhasil diupdate');
    }

    public function destroy($id)
    {
        $iht = Iht::findOrFail($id);
        $iht->delete();

        return redirect()->route('admin.iht.iht')->with('success', 'Paket in house training berhasil dihapus');
    }
}
