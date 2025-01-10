@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold text-gray-800 mb-4">Dashboard</h1>
    <p class="text-gray-700">Halo, <span class="font-semibold">{{ Auth::user()->name }}</span>! Anda login sebagai <span class="uppercase font-semibold text-orange-600">{{ Auth::user()->role }}</span>.</p>

    @if (!Auth::user()->perusahaan)
    <!-- Modal - Jika user belum mendaftar perusahaan -->
    <div id="modal" class="fixed inset-0 z-50 flex items-center justify-center bg-gray-500 bg-opacity-75 hidden">
        <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md">
            <h2 class="text-xl font-semibold text-gray-800 mb-2">Peringatan</h2>
            <p class="text-gray-700 mb-4">
                Anda belum mendaftar perusahaan. Silakan
                <a href="{{ route('perusahaan.create') }}" class="text-blue-500 underline">daftarkan perusahaan Anda di sini</a>.
            </p>
            <div class="text-right">
                <button id="closeModal" class="px-4 py-2 bg-orange-500 text-white rounded-lg hover:bg-orange-600 focus:outline-none focus:ring-2 focus:ring-orange-500 transition duration-300">Tutup</button>
            </div>
        </div>
    </div>
    @endif

    @if ($perusahaan)
    <div class="mt-6 bg-white rounded-lg shadow-md p-6">
        <h2 class="text-lg font-semibold text-gray-800 mb-4">Detail Perusahaan Anda</h2>
        <ul class="space-y-2">
            <li class="text-gray-700"><strong>Nama Perusahaan:</strong> {{ $perusahaan->nama_perusahaan }}</li>
            <li class="text-gray-700"><strong>Email:</strong> {{ $perusahaan->email }}</li>
            <li class="text-gray-700"><strong>Telepon:</strong> {{ $perusahaan->telepon }}</li>
            <li class="text-gray-700"><strong>Alamat:</strong> {{ $perusahaan->alamat }}</li>
        </ul>
        <div class="mt-6">
            <a href="{{ route('perusahaan.edit', $perusahaan->id) }}" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300">Edit Perusahaan</a>
        </div>
    </div>
    @else
    <div class="mt-6">
        <p class="text-gray-700">Anda belum memiliki data perusahaan.</p>
        <a href="{{ route('perusahaan.create') }}" class="px-4 py-2 mt-4 inline-block bg-green-500 text-white rounded-lg hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 transition duration-300">Daftarkan Perusahaan Anda</a>
    </div>
    @endif
</div>

<script>
    // Cek jika user belum memiliki perusahaan dan tampilkan modal
    @if (!Auth::user()->perusahaan)
        document.getElementById('modal').classList.remove('hidden');
    @endif

    // Menutup modal ketika tombol "Tutup" ditekan
    document.getElementById('closeModal').addEventListener('click', function() {
        document.getElementById('modal').classList.add('hidden');
    });
</script>
@endsection
