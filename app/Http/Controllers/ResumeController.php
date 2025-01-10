<?php

namespace App\Http\Controllers;

use App\Models\Resume;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ResumeController extends Controller
{
    // Menampilkan daftar resume
    public function index()
    {
        $resumes = Resume::where('id_pengguna', Auth::id())->get();
        return view('resumes.index', compact('resumes'));
    }

    // Menampilkan form create resume
    public function create()
    {
        return view('resumes.create');
    }

    // Menyimpan data resume ke database
    public function store(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'nama_lengkap' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:Pria,Wanita',
            'tahun_lahir' => 'required|integer|min:1900|max:' . date('Y'),
            'lokasi' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Proses upload foto jika ada
        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('public/fotos');
        }

        // Simpan resume ke database
        Resume::create([
            'id_pengguna' => Auth::id(),
            'nama_lengkap' => $request->nama_lengkap,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tahun_lahir' => $request->tahun_lahir,
            'lokasi' => $request->lokasi,
            'pengalaman' => $request->pengalaman,
            'pendidikan' => $request->pendidikan,
            'keahlian' => $request->keahlian,
            'minat' => $request->minat,
            'ringkasan_pribadi' => $request->ringkasan_pribadi,
            'foto' => $fotoPath,
        ]);

        return redirect()->route('resumes.index')->with('success', 'Resume berhasil dibuat!');
    }

    // Menampilkan form edit resume
public function edit($id)
{
    $resume = Resume::findOrFail($id);

    // Cek apakah resume milik pengguna yang sedang login
    if ($resume->id_pengguna != Auth::id()) {
        return redirect()->route('resumes.index')->with('error', 'Anda tidak memiliki hak untuk mengedit resume ini!');
    }

    return view('resumes.edit', compact('resume'));
}

// Menyimpan perubahan data resume
public function update(Request $request, $id)
{
    $resume = Resume::findOrFail($id);

    // Cek apakah resume milik pengguna yang sedang login
    if ($resume->id_pengguna != Auth::id()) {
        return redirect()->route('resumes.index')->with('error', 'Anda tidak memiliki hak untuk memperbarui resume ini!');
    }

    // Validasi input
    $validator = Validator::make($request->all(), [
        'nama_lengkap' => 'required|string|max:255',
        'jenis_kelamin' => 'required|in:Pria,Wanita',
        'tahun_lahir' => 'required|integer|min:1900|max:' . date('Y'),
        'lokasi' => 'required|string|max:255',
        'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    // Proses upload foto jika ada
    if ($request->hasFile('foto')) {
        // Hapus foto lama jika ada
        if ($resume->foto) {
            Storage::delete($resume->foto);
        }

        // Simpan foto baru
        $fotoPath = $request->file('foto')->store('public/fotos');
    } else {
        $fotoPath = $resume->foto;
    }

    // Update resume
    $resume->update([
        'nama_lengkap' => $request->nama_lengkap,
        'jenis_kelamin' => $request->jenis_kelamin,
        'tahun_lahir' => $request->tahun_lahir,
        'lokasi' => $request->lokasi,
        'pengalaman' => $request->pengalaman,
        'pendidikan' => $request->pendidikan,
        'keahlian' => $request->keahlian,
        'minat' => $request->minat,
        'ringkasan_pribadi' => $request->ringkasan_pribadi,
        'foto' => $fotoPath,
    ]);

    return redirect()->route('resumes.index')->with('success', 'Resume berhasil diperbarui!');
}

}
