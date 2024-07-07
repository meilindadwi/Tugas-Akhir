<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
use Illuminate\Support\Facades\Storage;


class AboutController extends Controller
{
    public function index()
    {
        $abouts = About::all();
        return view('admin.about.index', compact('abouts'));
    }

    public function create()
    {
        return view('admin.about.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'foto' => 'required|image|max:2048', // maksimum 2MB
            'deskripsi' => 'required|string',
        ]);

        // Upload foto
        $fotoPath = $request->file('foto')->store('about_photos', 'public');

        About::create([
            'judul' => $request->judul,
            'foto' => $fotoPath,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('about.index')->with('success', 'Data about berhasil ditambahkan');
    }

    public function edit($id)
    {
        $about = About::findOrFail($id);
        return view('admin.about.edit', compact('about'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4096', // maksimum 2MB
            'deskripsi' => 'required|string',
        ]);

        $about = About::findOrFail($id);

        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($about->foto) {
                Storage::disk('public')->delete($about->foto);
            }

            // Upload foto baru
            $fotoPath = $request->file('foto')->store('about_photos', 'public');
            $about->foto = $fotoPath;
        }

        $about->judul = $request->judul;
        $about->deskripsi = $request->deskripsi;
        $about->save();

        return redirect()->route('about.index')->with('success', 'Data about berhasil diupdate');
    }

    public function destroy($id)
    {
        $about = About::findOrFail($id);

        // Hapus foto terkait jika ada
        if ($about->foto) {
            Storage::disk('public')->delete($about->foto);
        }

        $about->delete();

        return redirect()->route('about.index')->with('success', 'Data about berhasil dihapus');
    }
}
