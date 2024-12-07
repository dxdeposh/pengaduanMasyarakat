@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- Card untuk Formulir Pengaduan -->
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5><i class="bi bi-file-earmark-plus"></i> Tambah Pengaduan</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('pengaduan.store') }}" method="POST">
                        @csrf

                        <!-- Nama Pengadu -->
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Pengadu</label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama Anda" value="{{ old('nama') }}" required>
                            @error('nama')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Isi Pengaduan -->
                        <div class="mb-3">
                            <label for="isi_pengaduan" class="form-label">Isi Pengaduan</label>
                            <textarea class="form-control" id="isi_pengaduan" name="isi_pengaduan" rows="4" placeholder="Deskripsikan pengaduan Anda" required>{{ old('isi_pengaduan') }}</textarea>
                            @error('isi_pengaduan')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">
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
