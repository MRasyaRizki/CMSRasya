<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class authController extends Controller
{
    public function register (Request $request){
        $request->validate([
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        $regist = new User();
        $regist->name = $request->input('username');
        $regist->email = $request->input('email');
        $regist->password = Hash::make($request->input('password'));
        $regist->save(); 
        return redirect()->route('login');
    }

    public function login(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/home');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

        public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
