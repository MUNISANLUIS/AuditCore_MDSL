<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    // Mostrar formulario de login(Ailynn)
    public function showLoginForm()
    {
        return view('login');
    }

    // Procesar login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $email = $request->email;
        $password = $request->password;

        // Buscar usuario por email
        $user = DB::table('users')
            ->where('email', $email)
            ->first();

        // Verificar si existe y si la contraseña coincide (HASH)
        if ($user && Hash::check($password, $user->password)) {
            // Guardar usuario en sesión
            session(['user' => $user]);
            return redirect('/dashboard');
        }

        return back()->with('error', 'Email o contraseña incorrectos');
    }

    // Mostrar formulario de registro
    public function showRegisterForm()
    {
        return view('register');
    }

    // Procesar registro
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        // Insertar usuario con contraseña encriptada
        DB::table('users')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return redirect('/login')->with('success', 'Usuario registrado exitosamente. Inicia sesión.');
    }

    // Dashboard (página protegida)
    public function dashboard()
    {
        if (!session('user')) {
            return redirect('/login');
        }
        return view('dashboard', ['user' => session('user')]);
    }

    // Cerrar sesión
    public function logout()
    {
        session()->forget('user');
        return redirect('/login');
    }
}