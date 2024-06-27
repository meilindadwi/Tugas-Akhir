<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    function index()
    {
        return view('auth.login');
    }
    function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ], [
            'email.required' => 'Email wajib diisi',
            'password.required' => 'Password wajib diisi',
        ]);

        $infologin = [
            'email' =>$request->email,
            'password' =>$request->password,
        ];

        if (Auth::attempt($infologin)) {
            if (Auth:: user()->role == 'admin') {
                return redirect('/adminn');
            }elseif (Auth::user()->role == 'konselor') {
                return redirect('/admin/reservations');
            }
        }else{
           return redirect('/')->withErrors('Username dan password yang dimasukkan tidak sesuai')->withInput();
        }
    }
    function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}