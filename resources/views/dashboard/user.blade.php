@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">

    <!-- Main Header -->
    <header class="mb-8">
        <h1 class="text-4xl font-extrabold text-orange-600 mb-2">Dashboard User</h1>
        <p class="text-lg text-gray-700">Halo, <span class="font-semibold">{{ Auth::user()->name }}</span>! Selamat datang di platform pencarian kerja kami.</p>
        <p class="text-gray-600">Jelajahi lowongan pekerjaan terbaru dan temukan karir impian Anda.</p>
    </header>

    <!-- Lowongan Section -->
    <section>
        <h2 class="text-2xl font-semibold text-gray-800 mb-6">Lowongan Pekerjaan Terbaru</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse ($lowongans as $lowongan)
                <div class="bg-white rounded-lg shadow-lg overflow-hidden transform transition hover:scale-105">
                    <img src="{{ asset('storage/' . $lowongan->perusahaan->logo) }}" 
                        class="w-full h-48 object-cover" 
                        alt="Logo {{ $lowongan->perusahaan->nama_perusahaan }}">
                    <div class="p-4">
                        <h3 class="text-lg font-bold text-orange-600 truncate">{{ $lowongan->judul }}</h3>
                        <p class="text-sm text-gray-600 mt-2">
                            <strong>Perusahaan:</strong> {{ $lowongan->perusahaan->nama_perusahaan }} <br>
                            <strong>Alamat:</strong> {{ $lowongan->perusahaan->alamat }} <br>
                            <strong>Posisi:</strong> {{ $lowongan->posisi }} <br>
                            <strong>Gaji:</strong> Rp {{ number_format($lowongan->gaji, 0, ',', '.') }}
                        </p>
                        <a href="{{ route('lowongan.show', $lowongan->id) }}" 
                           class="block bg-orange-600 text-white text-center mt-4 py-2 rounded-lg hover:bg-orange-700 transition">
                            Lihat Detail
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center text-gray-700">
                    <p>Tidak ada lowongan pekerjaan saat ini. Silakan cek kembali nanti!</p>
                </div>
            @endforelse
        </div>
    </section>
</div>
@endsection
