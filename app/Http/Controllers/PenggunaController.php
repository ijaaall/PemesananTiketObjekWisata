<?php

namespace App\Http\Controllers;

use App\Models\PenggunaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengguna = PenggunaModel::all();
        return view('pengguna.index', compact('pengguna'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pengguna = PenggunaModel::all();
        return view('pengguna.create', compact('pengguna'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
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

        return redirect()->route('pengguna.index')->with('success', 'berhasil buat data baru');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pengguna = PenggunaModel::findOrFail($id);
        return view('pengguna.edit', compact('pengguna'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_pengguna' => 'required',
            'username' => 'required',
            'role' => 'required|in:admin,user',
        ]);

        $pengguna = PenggunaModel::findOrFail($id);

        $pengguna->update([
            'nama_pengguna' => $request->nama_pengguna,
            'username' => $request->username,
            'role' => $request->role,
        ]);

        return redirect()->route('pengguna.index')->with('success', 'berhasil update data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        PenggunaModel::where('id_pengguna', $id)->delete();
        return redirect()->route('pengguna.index')->with('success', 'berhasil menghapus data');
    }
}