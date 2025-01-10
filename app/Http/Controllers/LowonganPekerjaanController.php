<?php

namespace App\Http\Controllers;

use App\Models\LowonganPekerjaan;
use App\Models\Perusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LowonganPekerjaanController extends Controller
{
    public function index()
    {
        // Pastikan hanya menampilkan lowongan yang sesuai dengan perusahaan milik user
        $perusahaan = Perusahaan::where('user_id', Auth::id())->get();
        $lowongan = LowonganPekerjaan::where('perusahaan_id', Auth::user()->perusahaan->id)
                                      ->with('pertanyaan') // Eager load pertanyaan terkait lowongan
                                      ->get();
     
        return view('lowongan.index', compact('lowongan'));
    }
    

    public function create()
    {
        // Menampilkan perusahaan milik user yang sedang login
        $perusahaan = Perusahaan::where('user_id', Auth::id())->get();

        return view('lowongan.create', compact('perusahaan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'perusahaan_id' => 'required|exists:perusahaan,id',
            'posisi'        => 'required|string|max:255',
            'deskripsi'     => 'required',
            'gaji'          => 'nullable|numeric',
            'tipe_pekerjaan'=> 'required|in:freelance,parttime,fulltime,kontrak,magang', // Validasi tipe pekerjaan
        ]);

        // Validasi tambahan: perusahaan harus milik user yang login
        $perusahaan = Perusahaan::where('id', $request->perusahaan_id)
                                 ->where('user_id', Auth::id())
                                 ->firstOrFail();

        // Cek apakah lowongan dengan posisi dan perusahaan sudah ada
        $existingLowongan = LowonganPekerjaan::where('perusahaan_id', $request->perusahaan_id)
                                             ->where('posisi', $request->posisi)
                                             ->first();

        if ($existingLowongan) {
            return redirect()->route('lowongan.create')->with('error', 'Lowongan untuk posisi ini sudah ada.');
        }

        // Menyimpan lowongan baru
        LowonganPekerjaan::create([
            'perusahaan_id' => $request->perusahaan_id,
            'posisi'        => $request->posisi,
            'deskripsi'     => $request->deskripsi,
            'gaji'          => $request->gaji,
            'tipe_pekerjaan'=> $request->tipe_pekerjaan,  // Menyimpan tipe pekerjaan
        ]);

        return redirect()->route('lowongan.index')->with('success', 'Lowongan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        // Temukan lowongan berdasarkan id
        $lowongan = LowonganPekerjaan::findOrFail($id);

        // Pastikan hanya perusahaan milik user yang login yang bisa mengedit
        if ($lowongan->perusahaan_id !== Auth::user()->perusahaan->id) {
            return redirect()->route('lowongan.index')->with('error', 'Anda tidak berhak mengedit lowongan ini.');
        }

        // Ambil data perusahaan untuk ditampilkan pada form
        $perusahaan = Perusahaan::where('user_id', Auth::id())->get();

        return view('lowongan.edit', compact('lowongan', 'perusahaan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'perusahaan_id' => 'required|exists:perusahaan,id',
            'posisi'        => 'required|string|max:255',
            'deskripsi'     => 'required',
            'gaji'          => 'nullable|numeric',
            'tipe_pekerjaan'=> 'required|in:freelance,parttime,fulltime,kontrak,magang', // Validasi tipe pekerjaan
        ]);

        // Temukan lowongan yang akan diperbarui
        $lowongan = LowonganPekerjaan::findOrFail($id);

        // Pastikan hanya perusahaan milik user yang login yang bisa mengedit
        if ($lowongan->perusahaan_id !== Auth::user()->perusahaan->id) {
            return redirect()->route('lowongan.index')->with('error', 'Anda tidak berhak mengedit lowongan ini.');
        }

        // Validasi tambahan: perusahaan harus milik user yang login
        $perusahaan = Perusahaan::where('id', $request->perusahaan_id)
                                 ->where('user_id', Auth::id())
                                 ->firstOrFail();

        // Cek apakah lowongan dengan posisi dan perusahaan sudah ada (untuk kasus jika posisi diubah)
        $existingLowongan = LowonganPekerjaan::where('perusahaan_id', $request->perusahaan_id)
                                             ->where('posisi', $request->posisi)
                                             ->where('id', '!=', $lowongan->id) // Pastikan ID berbeda dengan lowongan yang sedang diedit
                                             ->first();

        if ($existingLowongan) {
            return redirect()->route('lowongan.edit', ['lowongan' => $id])->with('error', 'Lowongan untuk posisi ini sudah ada.');
        }

        // Perbarui data lowongan
        $lowongan->update([
            'perusahaan_id' => $request->perusahaan_id,
            'posisi'        => $request->posisi,
            'deskripsi'     => $request->deskripsi,
            'gaji'          => $request->gaji,
            'tipe_pekerjaan'=> $request->tipe_pekerjaan, // Update tipe pekerjaan
        ]);

        return redirect()->route('lowongan.index')->with('success', 'Lowongan berhasil diperbarui.');
    }

    public function show($id)
{
    // Cek apakah user sudah login
    if (!Auth::check()) {
        return redirect()->route('login')->with('error', 'Anda harus login untuk melihat detail lowongan.');
    }

    // Temukan lowongan berdasarkan id
    $lowongan = LowonganPekerjaan::findOrFail($id);

    // Tampilkan detail lowongan tanpa membatasi berdasarkan perusahaan yang login
    return view('lowongan.show', compact('lowongan'));
}



    public function destroy($id)
    {
        // Temukan lowongan yang sesuai dengan id
        $lowongan = LowonganPekerjaan::findOrFail($id);

        // Validasi bahwa perusahaan milik user yang login
        if ($lowongan->perusahaan_id !== Auth::user()->perusahaan->id) {
            return redirect()->route('lowongan.index')->with('error', 'Anda tidak berhak menghapus lowongan ini.');
        }

        // Hapus lowongan
        $lowongan->delete();

        return redirect()->route('lowongan.index')->with('success', 'Lowongan berhasil dihapus.');
    }
}  