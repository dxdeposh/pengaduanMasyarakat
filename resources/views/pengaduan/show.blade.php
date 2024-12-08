@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="mb-4">Detail Pengaduan</h2>

        <!-- Breadcrumb Navigation -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('pengaduan.index') }}">Daftar Pengaduan</a></li>
                <li class="breadcrumb-item active" aria-current="page">Detail Pengaduan</li>
            </ol>
        </nav>

        <div class="card shadow-lg border-0 rounded-lg">
            <div class="card-body">
                <h5 class="card-title">{{ $pengaduan->nama }}</h5>
                <p class="card-text">{{ $pengaduan->isi_pengaduan }}</p>
                <p><strong>Status:</strong> <span class="badge bg-info">{{ ucfirst($pengaduan->status) }}</span></p>

                <!-- Tampilkan Tanggal -->
                <p><strong>Dikirim pada:</strong> <span
                        class="text-muted">{{ \Carbon\Carbon::parse($pengaduan->created_at)->diffForHumans() }}</span></p>

                <!-- Menampilkan gambar jika ada -->
                @if ($pengaduan->gambar)
                    <div class="mt-3 mb-4">
                        <img src="{{ asset('images/' . $pengaduan->gambar) }}" alt="Gambar Pengaduan"
                            class="img-fluid rounded shadow-sm"
                            style="max-height: 300px; width: auto; transition: transform 0.3s;">
                        <p class="text-muted mt-4">Klik gambar untuk memperbesar</p>
                    </div>
                @endif

                <div class="mt-3">
                    <!-- Tombol Edit dan Hapus -->
                    <a href="{{ route('pengaduan.edit', $pengaduan) }}" class="btn btn-warning btn-sm"><i
                            class="bi bi-pencil-square"></i> Edit</a>

                    <form action="{{ route('pengaduan.destroy', $pengaduan) }}" method="POST" style="display:inline;"
                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus pengaduan ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i> Hapus</button>
                    </form>

                    <!-- Tombol Kembali -->
                    <a href="{{ route('pengaduan.index') }}" class="btn btn-secondary btn-sm"><i
                            class="bi bi-arrow-left-circle"></i> Kembali ke Daftar Pengaduan</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        // Efek zoom gambar ketika hover
        const image = document.querySelector('img');
        if (image) {
            image.addEventListener('mouseenter', () => {
                image.style.transform = 'scale(1.1)';
            });
            image.addEventListener('mouseleave', () => {
                image.style.transform = 'scale(1)';
            });
        }
    </script>
@endsection
