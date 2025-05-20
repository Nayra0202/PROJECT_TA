@extends('layouts.main')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header fw-bold">
            Tambah Data Barang Keluar
        </div>
        <div class="card-body">
            <form action="{{ route('barang-keluar.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="id_barang" class="form-label">Nama Barang</label>
                    <select class="form-select" id="id_barang" name="id_barang" required>
                        <option value="">-- Pilih Barang --</option>
                        @foreach($barangs as $barang)
                            <option value="{{ $barang->id }}">{{ $barang->nama_barang }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="id_permintaan" class="form-label">Permintaan</label>
                    <select class="form-select" id="id_permintaan" name="id_permintaan" required>
                        <option value="">-- Pilih Permintaan --</option>
                        @foreach($permintaans as $permintaan)
                            <option value="{{ $permintaan->id }}">
                                {{ $permintaan->nama_pemesan }} - {{ $permintaan->nama_barang }} ({{ $permintaan->jumlah }} {{ $permintaan->satuan }})
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="jumlah" class="form-label">Jumlah</label>
                    <input type="number" class="form-control" id="jumlah" name="jumlah" required>
                </div>
                <div class="mb-3">
                    <label for="tgl_keluar" class="form-label">Tanggal Keluar</label>
                    <input type="date" class="form-control" id="tgl_keluar" name="tgl_keluar" required>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('barang-keluar.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection