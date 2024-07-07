<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Safari;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SafariController extends Controller
{
    public function index()
    {
        $safaris = Safari::all();
        return view('admin.safari.index', compact('safaris'));
    }

    public function create()
    {
        return view('admin.safari.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4096', // 4096 kilobytes = 4 MB
    ]);

    if ($request->file('foto')) {
        $filePath = $request->file('foto')->store('safari', 'public');
        Safari::create(['foto' => $filePath]);
    }

    return redirect()->route('admin.safari.index')->with('success', 'Foto berhasil ditambahkan');
}

public function destroy($id)
{
    $safari = Safari::findOrFail($id);

    // Check if the foto attribute is not null and exists in the storage
    if ($safari->foto && Storage::disk('public')->exists($safari->foto)) {
        Storage::disk('public')->delete($safari->foto);
    }

    $safari->delete();

    return redirect()->route('admin.safari.index')->with('success', 'Foto berhasil dihapus');
}
}