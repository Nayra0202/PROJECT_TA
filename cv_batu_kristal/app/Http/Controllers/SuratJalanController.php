<?php

namespace App\Http\Controllers;

use App\Models\SuratJalan;
use App\Models\Permintaan;
use App\Models\BarangKeluar;
use Illuminate\Http\Request;

class SuratJalanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suratJalans = SuratJalan::all();
        return view('surat_jalan.index', compact('suratJalans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permintaans = Permintaan::all();
        return view('surat_jalan.create', compact('permintaans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_permintaan' => 'required|exists:permintaans,id',
            'tanggal' => 'required|date',
        ]);

        // Ambil data permintaan
        $permintaan = Permintaan::findOrFail($request->id_permintaan);
        // Ambil data barang keluar yang terkait permintaan
        $barangKeluar = BarangKeluar::where('id_permintaan', $permintaan->id)->first();

        SuratJalan::create([
            'tanggal' => $request->tanggal,
            'nama_pemesan' => $permintaan->nama_pemesan,
            'nama_barang' => $barangKeluar ? $barangKeluar->barang->nama_barang : '-',
            'jumlah' => $barangKeluar ? $barangKeluar->jumlah : 0,
            'satuan' => $barangKeluar ? $barangKeluar->barang->satuan : '-',
            'id_permintaan' => $permintaan->id,
        ]);

        return redirect()->route('surat_jalan.index')->with('success', 'Surat jalan berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     */
    public function show(SuratJalan $suratJalan)
    {
        return view('surat_jalan.show', compact('suratJalan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SuratJalan $suratJalan)
    {
        $permintaans = Permintaan::all();
        return view('surat_jalan.edit', compact('suratJalan', 'permintaans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SuratJalan $suratJalan)
    {
        $request->validate([
            'id_permintaan' => 'required|exists:permintaans,id',
            'tanggal' => 'required|date',
        ]);

        $permintaan = Permintaan::findOrFail($request->id_permintaan);
        $barangKeluar = BarangKeluar::where('id_permintaan', $permintaan->id)->first();

        $suratJalan->update([
            'tanggal' => $request->tanggal,
            'nama_pemesan' => $permintaan->nama_pemesan,
            'nama_barang' => $barangKeluar ? $barangKeluar->barang->nama_barang : '-',
            'jumlah' => $barangKeluar ? $barangKeluar->jumlah : 0,
            'satuan' => $barangKeluar ? $barangKeluar->barang->satuan : '-',
            'id_permintaan' => $permintaan->id,
        ]);

        return redirect()->route('surat_jalan.index')->with('success', 'Surat jalan berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SuratJalan $suratJalan)
    {
        $suratJalan->delete();
        return redirect()->route('surat_jalan.index')->with('success', 'Surat jalan berhasil dihapus.');
    }
}
