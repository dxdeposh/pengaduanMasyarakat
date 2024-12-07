<?php

namespace App\Http\Controllers;

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
        })->paginate(6); // 6 item per halaman (bisa disesuaikan)

        return view('pengaduan.index', compact('pengaduans'));
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
        ]);

        Pengaduan::create($request->all());

        return redirect()->route('pengaduan.index')->with('success', 'Pengaduan berhasil dikirim');
    }

    public function edit(Pengaduan $pengaduan)
    {
        return view('pengaduan.edit', compact('pengaduan'));
    }

    public function update(Request $request, Pengaduan $pengaduan)
    {
        $request->validate([
            'nama' => 'required',
            'isi_pengaduan' => 'required',
        ]);

        $pengaduan->update($request->all());

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
}
