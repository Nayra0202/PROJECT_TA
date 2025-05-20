@extends('layouts.main')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header fw-bold d-flex justify-content-between align-items-center">
            Daftar Surat Jalan
            <a href="{{ route('surat_jalan.create') }}" class="btn btn-primary btn-sm">Buat Surat Jalan</a>
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
                            <th>Tanggal</th>
                            <th>Nama Pemesan</th>
                            <th>Nama Barang</th>
                            <th>Jumlah</th>
                            <th>Satuan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($suratJalans as $sj)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $sj->tanggal }}</td>
                            <td>{{ $sj->nama_pemesan }}</td>
                            <td>{{ $sj->nama_barang }}</td>
                            <td>{{ $sj->jumlah }}</td>
                            <td>{{ $sj->satuan }}</td>
                            <td>
                                <a href="{{ route('surat_jalan.edit', $sj->id_surat_jalan) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('surat_jalan.destroy', $sj->id_surat_jalan) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin hapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" type="submit">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center">Data surat jalan belum tersedia.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection