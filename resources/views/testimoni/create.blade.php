@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="mb-4">Tambah Testimoni</h2>

        <form action="{{ route('testimoni.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Pengguna</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="mb-3">
                <label for="testimoni" class="form-label">Testimoni</label>
                <textarea class="form-control" id="testimoni" name="testimoni" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Tambah Testimoni</button>
        </form>
    </div>
@endsection
