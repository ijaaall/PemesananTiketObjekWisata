<?php

namespace App\Http\Controllers;

use App\Models\ObjekWisataModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ObjekWisataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $objek = ObjekWisataModel::all();
        return view('objek.index', compact('objek'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $objek = ObjekWisataModel::all();
        return view('objek.create', compact('objek'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_objek' => 'required',
            'deskripsi'  => 'required',
            'harga'      => 'required|numeric',
            'gambar'     => 'required|image|mimes:png,jpg,jpeg|max:2048',
            'stok'       => 'required|integer',
        ]);

        $pathGambar = null;
        if ($request->hasFile('gambar')) {
            $pathGambar = $request->file('gambar')->store('objek-wisata', 'public');
        }

        ObjekWisataModel::create([
            'nama_objek' => $request->nama_objek,
            'deskripsi'  => $request->deskripsi,
            'harga'      => $request->harga,
            'gambar'     => $pathGambar,
            'stok'       => $request->stok,
        ]);

        return redirect()->route('objek.index')->with('success', 'berhasil tambah objek wisata baru');
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
        $objek = ObjekWisataModel::findOrFail($id);
        return view('objek.edit', compact('objek'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $request->validate([
            'nama_objek' => 'required',
            'deskripsi'  => 'required',
            'harga'      => 'required|numeric',
            'gambar'     => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
            'stok'       => 'required|integer',
        ]);

        $objek = ObjekWisataModel::findOrFail($id);

        $pathGambar = $objek->gambar;

        if ($request->hasFile('gambar')) {

            if ($objek->gambar) {
                Storage::disk('public')->delete($objek->gambar);
            }

            $pathGambar = $request->file('gambar')->store('objek-wisata', 'public');
        }

        $objek->update([
            'nama_objek' => $request->nama_objek,
            'deskripsi'  => $request->deskripsi,
            'harga'      => $request->harga,
            'gambar'     => $pathGambar,
            'stok'       => $request->stok,
        ]);

        return redirect()->route('objek.index')->with('success', 'Objek wisata berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        ObjekWisataModel::where('id_objek', $id)->delete();
        return redirect()->route('objek.index')->with('success', 'data berhasil di hapus');
    }
}