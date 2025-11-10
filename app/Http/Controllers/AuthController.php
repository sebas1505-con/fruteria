<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;    
use App\Models\Usuario; 

class AuthController
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'correo' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt(['correo' => $request->correo, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect()->route('usuario'); 
        }

        return back()->withErrors(['login' => 'Credenciales incorrectas']);
    }

    public function logout(Request $request)
{
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route('login');
}

}

