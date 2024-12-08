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

        {{-- Daftar Pengaduan --}}

        @foreach ($pengaduans as $pengaduan)
            <div class="col mt-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title"><i class="bi bi-person-circle"></i> {{ $pengaduan->nama }}</h5>
                        <p class="card-text"><i class="bi bi-card-text"></i>
                            {{ Str::limit($pengaduan->isi_pengaduan, 100) }}</p>

                        <!-- Menampilkan Gambar Pengaduan -->
                        @if ($pengaduan->gambar)
                            <div class="mt-3">
                                <img src="{{ asset('images/' . $pengaduan->gambar) }}" alt="Gambar Pengaduan"
                                    class="img-fluid rounded" style="max-height: 200px; width: auto;">
                            </div>
                        @endif

                        {{-- Status Pengaduan --}}
                        <span class="badge bg-info mt-3"><i class="bi bi-info-circle"></i>
                            {{ ucfirst($pengaduan->status) }}</span>

                        <div class="mt-3">
                            <!-- Tombol Lihat Selengkapnya -->
                            <a href="{{ route('pengaduan.show', $pengaduan->id) }}" class="btn btn-secondary btn-sm "><i
                                    class="bi bi-eye"></i> Lihat
                                Selengkapnya</a>

                            <a href="{{ route('pengaduan.edit', $pengaduan) }}" class="btn btn-warning btn-sm"><i
                                    class="bi bi-pencil-square"></i> Edit</a>

                            <!-- Tombol untuk update status -->
                            <form action="{{ route('pengaduan.updateStatus', $pengaduan->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-primary btn-sm"><i class="bi bi-check"></i> Ubah
                                    Status</button>
                            </form>

                            <form action="{{ route('pengaduan.destroy', $pengaduan) }}" method="POST"
                                style="display:inline;" onsubmit="return confirmDelete()">
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
        
        {{-- // End Daftar Pengaduan --}}

        {{-- Testimoni Pengguna --}}
        <div class="card mt-4 shadow-lg border-0 rounded-lg">
            <div class="card-header bg-gradient text-white">
                <h5 class="mb-0">Testimoni Pengguna</h5>
            </div>
            <div class="card-body">
                @foreach ($testimonis as $testimoni)
                    <div class="testimonial-item mb-4 p-4 rounded-lg border border-light shadow-sm">
                        <div class="d-flex align-items-center mb-3">
                            <!-- Gambar Profil Pengguna -->
                            <img src="{{ asset('images/1733638445.png') }}" alt="User Avatar" class="rounded-circle me-3"
                                style="width: 50px; height: 50px; object-fit: cover;">
                            <div>
                                <h6 class="mb-0">{{ $testimoni->nama }}</h6>
                                <small class="text-muted">Pengguna</small>
                            </div>
                        </div>
                        <blockquote class="blockquote">
                            <p class="mb-0"><i class="bi bi-chat-left-quote-fill"></i>  {{ $testimoni->testimoni }}</p>
                        </blockquote>
                    </div>
                @endforeach
            </div>
        </div>
        {{-- End Testimoni Pengguna --}}


        {{-- Form untuk menambahkan testimoni --}}
        <div class="card mt-4 shadow-lg border-0 rounded-lg">
            <div class="card-header bg-gradient text-white">
                <h5 class="mb-0">Tambah Testimoni</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('testimoni.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Pengguna</label>
                        <input type="text" class="form-control form-control-lg shadow-sm" id="nama" name="nama"
                            required placeholder="Masukkan nama Anda" style="border-radius: 10px;">
                    </div>
                    <div class="mb-3">
                        <label for="testimoni" class="form-label">Testimoni</label>
                        <textarea class="form-control form-control-lg shadow-sm" id="testimoni" name="testimoni" rows="4" required
                            placeholder="Tuliskan testimoni Anda" style="border-radius: 10px;"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success w-100 mt-3 py-3"
                        style="border-radius: 10px; font-weight: bold; transition: background-color 0.3s ease;">
                        Tambah Testimoni
                    </button>
                </form>
            </div>
        </div>
        {{-- End Testimoni Pengguna --}}



        <!-- Pagination -->
        <div class="mt-4">
            {{ $pengaduans->links() }}
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function confirmDelete() {
            console.log('Confirm delete called'); // Log untuk memeriksa apakah fungsi dipanggil
            return confirm('Apakah Anda yakin ingin menghapus pengaduan ini?');
        }
    </script>
@endsection
