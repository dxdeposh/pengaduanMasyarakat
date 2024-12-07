@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="mb-4">Daftar Pengaduan Masyarakat</h2>

        <!-- Form Pencarian -->
        <form class="mb-4" action="{{ route('pengaduan.index') }}" method="GET">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Cari pengaduan..." name="search"
                    value="{{ request()->get('search') }}">
                <button class="btn btn-outline-secondary" type="submit">
                    <i class="bi bi-search"></i> Cari
                </button>
            </div>
        </form>

        <!-- Notifikasi Sukses -->
        @if (session('success'))
            <div class="alert alert-success mb-4">
                {{ session('success') }}
            </div>
        @endif

        <!-- Tombol Tambah Pengaduan -->
        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('pengaduan.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Tambah Pengaduan
            </a>
        </div>

        <!-- Daftar Pengaduan -->
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @foreach ($pengaduans as $pengaduan)
                <div class="col">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">{{ $pengaduan->nama }}</h5>
                            <p class="card-text">{{ Str::limit($pengaduan->isi_pengaduan, 100) }}</p>
                            <span class="badge bg-info">{{ ucfirst($pengaduan->status) }}</span>

                            <div class="mt-3">
                                <a href="{{ route('pengaduan.edit', $pengaduan) }}" class="btn btn-warning btn-sm"><i
                                        class="bi bi-pencil-square"></i> Edit</a>
                                <form action="{{ route('pengaduan.destroy', $pengaduan) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i>
                                        Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>


        {{-- Testimoni Pengguna --}}

        <div class="card mt-4">
            <div class="card-header">
                <h5>Testimoni Pengguna</h5>
            </div>
            <div class="card-body">
                <p>"Sistem pengaduan ini sangat membantu saya dalam menyampaikan masalah yang saya hadapi. Semoga lebih
                    cepat diproses!"</p>
                <footer class="blockquote-footer">Nama Pengguna</footer>
            </div>
        </div>


        {{-- //Testimoni Pengguna --}}


        <!-- Pagination -->
        <div class="mt-4">
            {{ $pengaduans->links() }}
        </div>
    </div>
@endsection
