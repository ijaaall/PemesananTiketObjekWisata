<?php

namespace App\Http\Controllers;

use App\Models\ObjekWisataModel;
use App\Models\PemesananModel;
// use App\Models\PenggunaModel;
use Illuminate\Http\Request;

class PemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pemesanan = PemesananModel::all();
        return view('pemesanan.index', compact('pemesanan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request, string $id)
    {
        $objek = ObjekWisataModel::findOrFail($id);
        return view('pemesanan.create', compact('objek'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        $pemesanan = PemesananModel::findOrFail($id);
        return view('pemesanan.index', compact('pemesanan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        PemesananModel::where('id_pemesanan', $id)->delete();
        return redirect()->route('pemesanan.index')->with('success', 'berhasil menghapus data');
    }
}
