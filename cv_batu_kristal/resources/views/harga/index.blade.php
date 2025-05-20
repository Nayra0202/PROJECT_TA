@extends('layouts.main')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header fw-bold d-flex justify-content-between align-items-center">
            Daftar Harga
            <a href="{{ route('harga.create') }}" class="btn btn-primary btn-sm">Tambah Harga</a>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Harga</th>
                            <th>Satuan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($daftarHargas as $harga)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $harga->nama_barang }}</td>
                            <td>Rp {{ number_format($harga->harga, 0, ',', '.') }}</td>
                            <td>{{ $harga->satuan }}</td>
                            <td>
                                <a href="{{ route('harga.edit', $harga->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('harga.destroy', $harga->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin hapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" type="submit">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center">Data harga belum tersedia.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection