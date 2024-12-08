<?php

namespace App\Http\Controllers;

use App\Models\Testimoni;
use Illuminate\Http\Request;

class TestimoniController extends Controller
{
    public function index()
    {
        $testimonis = Testimoni::all();
        return view('pengaduan.index', compact('testimonis'));
    }

    public function create()
    {
        return view('testimoni.create');  // Halaman untuk form tambah testimoni
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'testimoni' => 'required|string',
        ]);

        Testimoni::create([
            'nama' => $request->nama,
            'testimoni' => $request->testimoni,
        ]);

        return redirect()->route('pengaduan.index')->with('success', 'Testimoni berhasil ditambahkan');
    }
}
