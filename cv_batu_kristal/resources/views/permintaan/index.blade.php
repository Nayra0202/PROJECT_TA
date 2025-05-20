@extends('layouts.main')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header fw-bold d-flex justify-content-between align-items-center">
            Daftar Permintaan
            <a href="{{ route('permintaan.create') }}" class="btn btn-primary btn-sm">Tambah Permintaan</a>
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
                            <th>Nama Pemesan</th>
                            <th>Nama Barang</th>
                            <th>Jumlah</th>
                            <th>Satuan</th>
                            <th>Tanggal Permintaan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($permintaans as $permintaan)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $permintaan->nama_pemesan }}</td>
                            <td>{{ $permintaan->nama_barang }}</td>
                            <td>{{ $permintaan->jumlah }}</td>
                            <td>{{ $permintaan->satuan }}</td>
                            <td>{{ $permintaan->tgl_permintaan }}</td>
                            <td>
                                <a href="{{ route('permintaan.edit', $permintaan->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('permintaan.destroy', $permintaan->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin hapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" type="submit">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center">Data permintaan belum tersedia.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection