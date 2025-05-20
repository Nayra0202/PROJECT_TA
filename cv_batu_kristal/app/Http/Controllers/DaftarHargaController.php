<?php

namespace App\Http\Controllers;

use App\Models\DaftarHarga;
use Illuminate\Http\Request;

class DaftarHargaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $daftarHargas = DaftarHarga::all();
        return view('harga.index', compact('daftarHargas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('harga.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'satuan' => 'required|string|max:50',
        ]);

        DaftarHarga::create([
            'nama_barang' => $request->nama_barang,
            'harga' => $request->harga,
            'satuan' => $request->satuan,
        ]);

        return redirect()->route('harga.index')->with('success', 'Data harga berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(DaftarHarga $daftarHarga)
    {
        return view('harga.show', compact('daftarHarga'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DaftarHarga $daftarHarga)
    {
        return view('harga.edit', compact('daftarHarga'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DaftarHarga $daftarHarga)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'satuan' => 'required|string|max:50',
        ]);

        $daftarHarga->update([
            'nama_barang' => $request->nama_barang,
            'harga' => $request->harga,
            'satuan' => $request->satuan,
        ]);

        return redirect()->route('harga.index')->with('success', 'Data harga berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DaftarHarga $daftarHarga)
    {
        $daftarHarga->delete();
        return redirect()->route('harga.index')->with('success', 'Data harga berhasil dihapus.');
    }
}
