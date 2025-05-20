<?php

namespace App\Http\Controllers;

use App\Models\BarangKeluar;
use App\Models\BarangMasuk;
use App\Models\Permintaan;
use Illuminate\Http\Request;

class BarangKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barangKeluars = BarangKeluar::with(['barang', 'permintaan'])->get();
        return view('barang_keluar.index', compact('barangKeluars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $barangs = BarangMasuk::all();
        $permintaans = Permintaan::all();
        return view('barang_keluar.create', compact('barangs', 'permintaans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_barang' => 'required|exists:barangs,id',
            'id_permintaan' => 'required|exists:permintaans,id',
            'jumlah' => 'required|integer|min:1',
            'tgl_keluar' => 'required|date',
        ]);

        BarangKeluar::create([
            'id_barang' => $request->id_barang,
            'id_permintaan' => $request->id_permintaan,
            'jumlah' => $request->jumlah,
            'tgl_keluar' => $request->tgl_keluar,
        ]);

        return redirect()->route('barang_keluar.index')->with('success', 'Data barang keluar berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(BarangKeluar $barangKeluar)
    {
        return view('barang_keluar.show', compact('barangKeluar'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BarangKeluar $barangKeluar)
    {
        $barangs = BarangMasuk
        ::all();
        $permintaans = Permintaan::all();
        return view('barang_keluar.edit', compact('barangKeluar', 'barangs', 'permintaans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BarangKeluar $barangKeluar)
    {
        $request->validate([
            'id_barang' => 'required|exists:barangs,id',
            'id_permintaan' => 'required|exists:permintaans,id',
            'jumlah' => 'required|integer|min:1',
            'tgl_keluar' => 'required|date',
        ]);

        $barangKeluar->update([
            'id_barang' => $request->id_barang,
            'id_permintaan' => $request->id_permintaan,
            'jumlah' => $request->jumlah,
            'tgl_keluar' => $request->tgl_keluar,
        ]);

        return redirect()->route('barang_keluar.index')->with('success', 'Data barang keluar berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BarangKeluar $barangKeluar)
    {
        $barangKeluar->delete();
        return redirect()->route('barang_keluar.index')->with('success', 'Data barang keluar berhasil dihapus.');
    }
}
