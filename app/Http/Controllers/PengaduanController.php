<?php

namespace App\Http\Controllers;

use App\Models\Testimoni;
use App\Models\Pengaduan;
use Illuminate\Http\Request;

class PengaduanController extends Controller
{
    public function index(Request $request)
    {
        // Ambil pencarian dari query string jika ada
        $search = $request->get('search');

        // Gunakan paginate dan search
        $pengaduans = Pengaduan::when($search, function ($query, $search) {
            return $query->where('nama', 'like', '%' . $search . '%')
                ->orWhere('isi_pengaduan', 'like', '%' . $search . '%');
        })->paginate(10);  // Menyesuaikan jumlah halaman sesuai kebutuhan

        // Ambil semua testimoni dari database
        $testimonis = Testimoni::all();

        // Kirim data pengaduan dan testimoni ke view
        return view('pengaduan.index', compact('pengaduans', 'testimonis'));
    }



    public function create()
    {
        return view('pengaduan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'isi_pengaduan' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Proses gambar
        if ($request->hasFile('gambar')) {
            $imageName = time() . '.' . $request->gambar->extension(); // Nama file gambar dengan timestamp
            $request->gambar->move(public_path('images'), $imageName); // Simpan gambar di folder public/images
        }

        // Simpan pengaduan ke database
        Pengaduan::create([
            'nama' => $request->nama,
            'isi_pengaduan' => $request->isi_pengaduan,
            'gambar' => isset($imageName) ? $imageName : null, // Jika ada gambar, simpan nama gambar
        ]);

        return redirect()->route('pengaduan.index')->with('success', 'Pengaduan berhasil dikirim');
    }


    public function edit(Pengaduan $pengaduan)
    {
        return view('pengaduan.edit', compact('pengaduan'));
    }

    public function update(Request $request, Pengaduan $pengaduan)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required',
            'isi_pengaduan' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validasi gambar (opsional)
        ]);

        // Update data pengaduan lainnya
        $pengaduan->update($request->except('gambar')); // Menjaga agar gambar tidak ikut diupdate langsung

        // Menangani file gambar jika ada
        if ($request->hasFile('gambar')) {
            // Menghapus gambar lama jika ada
            if ($pengaduan->gambar && file_exists(public_path('images/' . $pengaduan->gambar))) {
                unlink(public_path('images/' . $pengaduan->gambar)); // Menghapus file lama
            }

            // Menyimpan gambar baru
            $imageName = time() . '.' . $request->gambar->extension();
            $request->gambar->move(public_path('images'), $imageName);

            // Update nama gambar di database
            $pengaduan->gambar = $imageName;
            $pengaduan->save(); // Simpan perubahan gambar ke database
        }

        return redirect()->route('pengaduan.index')->with('success', 'Pengaduan berhasil diperbarui');
    }


    public function destroy(Pengaduan $pengaduan)
    {
        $pengaduan->delete();

        return redirect()->route('pengaduan.index')->with('success', 'Pengaduan berhasil dihapus');
    }

    public function updateStatus($id)
    {
        $pengaduan = Pengaduan::findOrFail($id);

        // Ubah status berdasarkan status saat ini
        switch ($pengaduan->status) {
            case 'menunggu':
                $pengaduan->status = 'diproses';
                break;
            case 'diproses':
                $pengaduan->status = 'selesai';
                break;
            case 'selesai':
                // Status sudah selesai, tidak ada perubahan lebih lanjut
                return redirect()->route('pengaduan.index')->with('info', 'Pengaduan sudah selesai.');
        }

        $pengaduan->save();

        return redirect()->route('pengaduan.index')->with('success', 'Status pengaduan diperbarui.');
    }

    public function show($id)
    {
        $pengaduan = Pengaduan::findOrFail($id);
        return view('pengaduan.show', compact('pengaduan'));
    }
}
