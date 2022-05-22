<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function loginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'dni' => 'required',
            'password' => 'required'
         ]);
        $credentials = $request->only('dni', 'password');
        if (Auth::attempt($credentials))
        {
            // Authentication successful
             return redirect()->intended(route('inicio'));
            //return view('welcome');
        } else {
            $error = 'Login incorrecto.';
            return view('auth.login', compact('error'));
        }
    }
    public function logout()
    {
        Auth::logout();
        return view('auth.login');
    }
}
