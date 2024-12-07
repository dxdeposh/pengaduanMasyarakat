@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- Card untuk Formulir Pengaduan -->
            <div class="card shadow-sm">
                <div class="card-header bg-warning text-white">
                    <h5><i class="bi bi-pencil-square"></i> Edit Pengaduan</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('pengaduan.update', $pengaduan) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Nama Pengadu -->
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Pengadu</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama', $pengaduan->nama) }}" required>
                            @error('nama')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Isi Pengaduan -->
                        <div class="mb-3">
                            <label for="isi_pengaduan" class="form-label">Isi Pengaduan</label>
                            <textarea class="form-control" id="isi_pengaduan" name="isi_pengaduan" rows="4" required>{{ old('isi_pengaduan', $pengaduan->isi_pengaduan) }}</textarea>
                            @error('isi_pengaduan')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-warning">
                                <i class="bi bi-pencil"></i> Perbarui Pengaduan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
