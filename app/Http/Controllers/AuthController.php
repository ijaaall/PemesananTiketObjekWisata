<?php

namespace App\Http\Controllers;

use App\Models\PenggunaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function showLogin()
    {
        return view('auth.login');
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nama_pengguna' => 'required',
            'username' => 'required|unique:pengguna',
            'password' => 'required|min:6',
            'role' => 'required',
        ]);

        PenggunaModel::create([
            'nama_pengguna' => $request->nama_pengguna,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return redirect()->route('login')->with('success', 'berhasil membuat akun');
    }


    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $pengguna = PenggunaModel::where('username', $request->username)->first();

        if ($pengguna && Hash::check($request->password, $pengguna->password)) {
            Auth::guard('pengguna')->login($pengguna);
            $request->session()->regenerate();

            session([
                'is_login' => true,
                'nama_pengguna' => $pengguna->nama_pengguna,
                'role' => $pengguna->role,
            ]);

            return redirect('/dashboard');
        }

        return back()->withErrors(['login' => 'username atau password salah']);
    }

    public function logout(Request $request)
    {
        Auth::guard('pengguna')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}