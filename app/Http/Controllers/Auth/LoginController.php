<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    function index()
    {
        return view('login');
    }
    function login(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ],[
            'email.required'=>'Email wajib diisi',
            'password.required'=>'Password wajib diisi',
        ]);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        
        if (Auth::attempt($infologin)) {
            return redirect('adminn');
        } else {
            return redirect('login')->withErrors('Username dan password yang dimasukkan tidak sesuai')->withInput();
        }        
    }

    function logout(){
        Auth::logout();
        return redirect('login')->with('success','Berhasil logout');
    }
}
