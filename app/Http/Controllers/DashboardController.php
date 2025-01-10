<?php

namespace App\Http\Controllers;

use App\Models\Perusahaan;
use App\Models\LowonganPekerjaan;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $lowongans = LowonganPekerjaan::with('perusahaan')->get();
        $user = Auth::user();

        // Cek role pengguna
        if ($user->role === 'perusahaan') {
            // Ambil perusahaan yang dimiliki oleh pengguna login
            $perusahaan = Perusahaan::where('user_id', $user->id)->first();

            // Jika belum ada perusahaan, arahkan untuk membuatnya terlebih dahulu
            if (!$perusahaan) {
                return redirect()->route('perusahaan.create')->with('info', 'Silakan daftarkan perusahaan Anda terlebih dahulu.');
            }

            // Jika perusahaan ada, tampilkan dashboard perusahaan
            return view('dashboard.perusahaan', compact('perusahaan'));
        }

        // Jika pengguna adalah user biasa, tampilkan dashboard user tanpa data perusahaan
        return view('dashboard.user', compact('user','lowongans'));
    }
}
