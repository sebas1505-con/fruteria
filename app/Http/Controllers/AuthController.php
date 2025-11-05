<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuario;

class AuthController extends Controller
{
    // Mostrar login
    public function showLoginForm()
    {
        return view('login');
    }

    // Procesar login
    public function login(Request $request)
    {
        $request->validate([
            'correo' => 'required|email',
            'password' => 'required'
        ]);

        // Intentar iniciar sesión usando los campos personalizados
        if (Auth::attempt([
            'correo' => $request->correo,
            'password' => $request->password
        ])) {
            $request->session()->regenerate();
            return redirect()->route('usuario')->with('success', '✅ Inicio de sesión exitoso. Bienvenido!');
        }

        return back()->withErrors([
            'correo' => '❌ Credenciales incorrectas. Verifica correo y contraseña.',
        ])->withInput();
    }

    // Mostrar registro
    public function showRegisterForm()
    {
        return view('registrar');
    }

    // Procesar registro
    public function register(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'correo' => 'required|string|email|max:255|unique:usuarios',
            'password' => 'required|string|min:6|confirmed',
        ]);

        Usuario::create([
            'nombre' => $request->nombre,
            'correo' => $request->correo,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', '✅ Cuenta creada exitosamente. Ahora puedes iniciar sesión.');
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login')->with('success', '✅ Sesión cerrada correctamente.');
    }
}
