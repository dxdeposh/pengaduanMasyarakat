@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <!-- Card untuk Formulir Pengaduan -->
                <div class="card shadow-lg border-0">
                    <div class="card-header bg-primary text-white">
                        <h5><i class="bi bi-file-earmark-plus"></i> Tambah Pengaduan</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('pengaduan.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <!-- Nama Pengadu -->
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Pengadu</label>
                                <input type="text" class="form-control form-control-lg" id="nama" name="nama"
                                    placeholder="Masukkan nama Anda" value="{{ old('nama') }}" required>
                                @error('nama')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Input Gambar dengan Preview -->
                            <div class="mb-3">
                                <label for="gambar" class="form-label">Pilih Gambar</label>
                                <input type="file" class="form-control form-control-lg" id="gambar" name="gambar"
                                    accept="image/*" onchange="previewImage(event)">
                                @error('gambar')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Gambar Preview -->
                            <div class="mb-3" id="image-preview-container" style="display:none;">
                                <label for="gambar-preview" class="form-label">Preview Gambar</label>
                                <img id="image-preview" src="#" alt="Preview Gambar" class="img-fluid rounded"
                                    style="max-height: 300px; width: auto;">
                            </div>

                            <!-- Isi Pengaduan -->
                            <div class="mb-3">
                                <label for="isi_pengaduan" class="form-label">Isi Pengaduan</label>
                                <textarea class="form-control form-control-lg" id="isi_pengaduan" name="isi_pengaduan" rows="4"
                                    placeholder="Deskripsikan pengaduan Anda" required>{{ old('isi_pengaduan') }}</textarea>
                                @error('isi_pengaduan')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Submit Button -->
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary btn-lg shadow-sm" style="transition: 0.3s;">
                                    <i class="bi bi-send"></i> Kirim Pengaduan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        // Fungsi untuk menampilkan preview gambar
        function previewImage(event) {
            var output = document.getElementById('image-preview');
            var container = document.getElementById('image-preview-container');
            container.style.display = "block"; // Menampilkan div preview
            output.src = URL.createObjectURL(event.target.files[0]);
        }
    </script>
@endsection
