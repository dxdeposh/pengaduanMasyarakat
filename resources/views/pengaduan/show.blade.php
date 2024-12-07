@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="mb-4">Detail Pengaduan</h2>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $pengaduan->nama }}</h5>
                <p class="card-text">{{ $pengaduan->isi_pengaduan }}</p>
                <p><strong>Status:</strong> {{ ucfirst($pengaduan->status) }}</p>

                <div class="mt-3">
                    <a href="{{ route('pengaduan.index') }}" class="btn btn-secondary">Kembali ke Daftar Pengaduan</a>
                </div>
            </div>
        </div>
    </div>
@endsection
