@extends('layouts.main')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header fw-bold">
            Edit Data Permintaan
        </div>
        <div class="card-body">
            <form action="{{ route('permintaan.update', $permintaan->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="nama_pemesan" class="form-label">Nama Pemesan</label>
                    <input type="text" class="form-control" id="nama_pemesan" name="nama_pemesan" value="{{ old('nama_pemesan', $permintaan->nama_pemesan) }}" required>
                </div>
                <div class="mb-3">
                    <label for="nama_barang" class="form-label">Nama Barang</label>
                    <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="{{ old('nama_barang', $permintaan->nama_barang) }}" required>
                </div>
                <div class="mb-3">
                    <label for="jumlah" class="form-label">Jumlah</label>
                    <input type="number" class="form-control" id="jumlah" name="jumlah" value="{{ old('jumlah', $permintaan->jumlah) }}" required>
                </div>
                <div class="mb-3">
                    <label for="satuan" class="form-label">Satuan</label>
                    <input type="text" class="form-control" id="satuan" name="satuan" value="{{ old('satuan', $permintaan->satuan) }}" required>
                </div>
                <div class="mb-3">
                    <label for="tgl_permintaan" class="form-label">Tanggal Permintaan</label>
                    <input type="date" class="form-control" id="tgl_permintaan" name="tgl_permintaan" value="{{ old('tgl_permintaan', $permintaan->tgl_permintaan) }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('permintaan.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection