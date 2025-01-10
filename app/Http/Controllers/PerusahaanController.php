<?php

namespace App\Http\Controllers;

use App\Models\Perusahaan;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PerusahaanController extends Controller
{
    // Menampilkan form pendaftaran perusahaan
    public function create()
    {
        return view('perusahaan.create');
    }

    // Menyimpan data perusahaan ke database
    public function store(Request $request)
    {
        $request->validate([
            'nama_perusahaan' => 'required|string|max:255',
            'email' => 'required|email|unique:perusahaan,email',
            'telepon' => 'required|string|max:15',
            'alamat' => 'required|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi logo
        ]);

        $logoPath = null;
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('logos', 'public'); // Menyimpan file di "storage/app/public/logos"
        }

        Perusahaan::create([
            'nama_perusahaan' => $request->nama_perusahaan,
            'email' => $request->email,
            'telepon' => $request->telepon,
            'alamat' => $request->alamat,
            'logo' => $logoPath, // Menyimpan path logo
            'user_id' => Auth::id(),
        ]);


        return redirect()->route('dashboard')->with('success', 'Perusahaan berhasil didaftarkan!');
    }

    // Menampilkan halaman edit perusahaan
    public function edit($id)
    {
        $perusahaan = Perusahaan::findOrFail($id);

        if ($perusahaan->user_id !== Auth::id()) {
            return redirect()->route('dashboard')->with('error', 'Anda tidak berhak mengedit perusahaan ini.');
        }

        return view('perusahaan.edit', compact('perusahaan'));
    }

    // Memperbarui data perusahaan
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_perusahaan' => 'required|string|max:255',
            'email' => 'required|email|unique:perusahaan,email,' . $id,
            'telepon' => 'required|string|max:15',
            'alamat' => 'required|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $perusahaan = Perusahaan::findOrFail($id);
    
        if ($perusahaan->user_id !== Auth::id()) {
            return redirect()->route('dashboard')->with('error', 'Anda tidak berhak mengedit perusahaan ini.');
        }
    
        $logoPath = $perusahaan->logo;
    
        if ($request->hasFile('logo')) {
            if ($logoPath) {
                // Path lengkap file lama
                $oldFilePath = storage_path('app/public/' . $logoPath);
    
                if (file_exists($oldFilePath)) {
                    unlink($oldFilePath); // Hapus file langsung menggunakan unlink
                }
            }
    
            // Simpan file baru
            $newFileName = uniqid() . '_' . $request->file('logo')->getClientOriginalName();
            $logoPath = $request->file('logo')->storeAs('logos', $newFileName, 'public');
        }
    
        $perusahaan->update([
            'nama_perusahaan' => $request->nama_perusahaan,
            'email' => $request->email,
            'telepon' => $request->telepon,
            'alamat' => $request->alamat,
            'logo' => $logoPath,
        ]);
    
        return redirect()->route('dashboard')->with('success', 'Perusahaan berhasil diperbarui!');
    }
    
    
    // Menghapus perusahaan
    public function destroy($id)
    {
        $perusahaan = Perusahaan::findOrFail($id);

        if ($perusahaan->user_id !== Auth::id()) {
            return redirect()->route('dashboard')->with('error', 'Anda tidak berhak menghapus perusahaan ini.');
        }

        if ($perusahaan->logo) {
            // Hapus file logo jika ada
            Storage::delete($perusahaan->logo);
        }

        $perusahaan->delete();

        return redirect()->route('dashboard')->with('success', 'Perusahaan berhasil dihapus!');
    }
}
