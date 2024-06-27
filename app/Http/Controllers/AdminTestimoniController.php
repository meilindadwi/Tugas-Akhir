<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimoni;

class AdminTestimoniController extends Controller
{
    public function index()
    {
        $testimonis = Testimoni::all();
        return view('admin.testimoni.testimoni', compact('testimonis'));
    }

    public function updateStatus(Request $request, $id)
    {
        $testimoni = Testimoni::find($id);
        $testimoni->status = $request->status;
        $testimoni->save();

        return redirect()->route('admin.testimoni.index')->with('success', 'Status testimoni berhasil diubah.');
    }
}