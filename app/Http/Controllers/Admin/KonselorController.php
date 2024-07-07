<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\konselor;
use Illuminate\Http\Request;

class KonselorController extends Controller
{
    public function index(){
        $konselor = konselor::all();
        return view('admin.konselor.konselor',compact('konselor'));
    }

    public function tambahkonselor(){
        return view('admin.konselor.tambah');
    }

    public function inputdata(Request $request){
        $konselor = konselor::create($request->all());
        if($request->hasFile('foto')){
            $request->file('foto')->move('fotokonselor/', $request->file('foto')->getClientOriginalName());
            $konselor->foto = $request->file('foto')->getClientOriginalName();
            $konselor->save();
        }
        return redirect()->route('konselor')->with('success','Data konselor berhasil ditambahkan');
    }

    public function tampildata($id){
        $konselor = konselor::find($id);
        return view('admin.konselor.tampil', compact('konselor'));
    }

    public function updatekonselor(Request $request, $id){
        $konselor = konselor::find($id);
        $konselor->update($request->all());

        return redirect()->back()->with('success',' Data konselor berhasil diupdate');
    }
    public function deletedata($id){
        $konselor = konselor::find($id);
        $konselor->delete();

        return redirect()->back()->with('success','Data konselor berhasil dihapus');
    }

}
