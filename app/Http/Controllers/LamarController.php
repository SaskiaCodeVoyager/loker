<?php

namespace App\Http\Controllers;

use App\Models\Lamar;
use App\Models\LowonganPekerjaan;
use Illuminate\Http\Request;

class LamarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lamarans = Lamar::with('lowongan')->paginate(10); // Data paginasi dengan relasi lowongan
        return view('lamar.index', compact('lamarans')); // Kirim data ke view
    }
    

    /**
     * Show the form for creating a new resource.
     */
   public function create()
{
    $lowongans = LowonganPekerjaan::all(); // Mengambil semua lowongan pekerjaan
    return view('lamar.create', compact('lowongans'));
}


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'promosikan_diri' => 'required|string',
            'upload_file_resume' => 'required|file|mimes:pdf,doc,docx|max:10240',
            'id_lowongan_pekerjaan' => 'required|exists:lowongan_pekerjaan,id',
        ]);

        $filePath = $request->file('upload_file_resume')->store('resumes', 'public');

        Lamar::create([
            'promosikan_diri' => $request->promosikan_diri,
            'upload_file_resume' => $filePath,
            'id_lowongan_pekerjaan' => $request->id_lowongan_pekerjaan,
        ]);

        return redirect()->route('lamar.index')->with('success', 'Lamaran berhasil dikirim.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Lamar $lamar)
    {
        return view('lamar.show', compact('lamar'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lamar $lamar)
    {
        $lowongans = LowonganPekerjaan::all();
        return view('lamar.edit', compact('lamar', 'lowongan_pekerjaan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lamar $lamar)
    {
        $request->validate([
            'promosikan_diri' => 'required|string',
            'upload_file_resume' => 'nullable|file|mimes:pdf,doc,docx|max:10240',
            'id_lowongan_pekerjaan' => 'required|exists:lowongan_pekerjaan,id',
        ]);

        $data = $request->only(['promosikan_diri', 'id_lowongan_pekerjaan']);

        // Check if a new file is uploaded
        if ($request->hasFile('upload_file_resume')) {
            $filePath = $request->file('upload_file_resume')->store('resumes', 'public');
            $data['upload_file_resume'] = $filePath;
        }

        $lamar->update($data);

        return redirect()->route('lamar.index')->with('success', 'Lamaran berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(Lamar $lamar)
    // {
    //     if ($lamar->upload_file_resume) {
    //         \Storage::delete('public/' . $lamar->upload_file_resume); // Hapus file dari storage
    //     }

    //     $lamar->delete();

    //     return redirect()->route('lamar.index')->with('success', 'Lamaran berhasil dihapus.');
    // }
}
