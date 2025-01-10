<?php

namespace App\Http\Controllers;

use App\Models\Pertanyaan;
use App\Models\LowonganPekerjaan;
use Illuminate\Http\Request;

class PertanyaanController extends Controller
{
    /**
     * Menampilkan daftar semua pertanyaan.
     */
    public function index()
    {
        $pertanyaan = Pertanyaan::with('lowonganPekerjaan')->get();
        return view('pertanyaan.index', compact('pertanyaan'));
    }

    /**
     * Menampilkan form untuk menambahkan pertanyaan.
     */
    public function create($lowongan_id)
    {
        // Mendapatkan lowongan berdasarkan ID
        $lowongan = LowonganPekerjaan::findOrFail($lowongan_id);
    
        // Mengirimkan lowongan ke view
        return view('pertanyaan.create', compact('lowongan'));
    }
    
    
    /**
     * Menyimpan pertanyaan yang baru ditambahkan.
     */
    public function store(Request $request)
    {
        $request->validate([
            'lowongan_pekerjaan_id' => 'required|exists:lowongan_pekerjaan,id',
            'judul_pertanyaan' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);
    
        Pertanyaan::create([
            'lowongan_pekerjaan_id' => $request->lowongan_pekerjaan_id,
            'judul_pertanyaan' => $request->judul_pertanyaan,
            'deskripsi' => $request->deskripsi,
        ]);
    
        return redirect()->route('lowongan.index', $request->lowongan_pekerjaan_id)
                         ->with('success', 'Pertanyaan berhasil ditambahkan!');
    }
    

    /**
     * Menampilkan form untuk mengedit pertanyaan.
     */
    public function edit($id)
    {
        $pertanyaan = Pertanyaan::findOrFail($id);
        $lowongan_pekerjaan = LowonganPekerjaan::all();
        return view('pertanyaan.edit', compact('pertanyaan', 'lowongan_pekerjaan'));
    }

    /**
     * Memperbarui data pertanyaan.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'lowongan_pekerjaan_id' => 'required|exists:lowongan_pekerjaan,id',
            'judul_pertanyaan' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        $pertanyaan = Pertanyaan::findOrFail($id);
        $pertanyaan->update($request->all());

        return redirect()->route('pertanyaan.index')->with('success', 'Pertanyaan berhasil diperbarui.');
    }

    /**
     * Menghapus pertanyaan.
     */
    public function destroy($id)
    {
        $pertanyaan = Pertanyaan::findOrFail($id);
        $pertanyaan->delete();

        return redirect()->route('pertanyaan.index')->with('success', 'Pertanyaan berhasil dihapus.');
    }
}
