@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto p-6 bg-white rounded-lg shadow-lg">
    <h1 class="text-2xl font-semibold text-orange-600 mb-4">Detail Pertanyaan</h1>

    <!-- Informasi Pertanyaan -->
    <div class="space-y-4">
        <div>
            <h2 class="text-lg font-medium text-gray-800">Judul:</h2>
            <p class="text-gray-700">{{ $pertanyaan->judul_pertanyaan }}</p>
        </div>

        <div>
            <h2 class="text-lg font-medium text-gray-800">Deskripsi:</h2>
            <p class="text-gray-700">{{ $pertanyaan->deskripsi ?? 'Tidak ada deskripsi.' }}</p>
        </div>

        <div>
            <h2 class="text-lg font-medium text-gray-800">Perusahaan:</h2>
            <p class="text-gray-700">{{ $pertanyaan->company->nama ?? 'Tidak diketahui' }}</p>
        </div>
    </div>

    <!-- Tombol Aksi -->
    <div class="mt-6 flex space-x-4">
        <a href="{{ route('pertanyaan.edit', $pertanyaan->id) }}"
           class="bg-blue-500 text-white px-6 py-3 rounded-lg hover:bg-blue-600 transition duration-300">
           Edit Pertanyaan
        </a>
        <form action="{{ route('pertanyaan.destroy', $pertanyaan->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit"
                    class="bg-red-500 text-white px-6 py-3 rounded-lg hover:bg-red-600 transition duration-300"
                    onclick="return confirm('Yakin ingin menghapus pertanyaan ini?')">
                Hapus Pertanyaan
            </button>
        </form>
        <a href="{{ route('pertanyaan.index') }}"
           class="bg-gray-500 text-white px-6 py-3 rounded-lg hover:bg-gray-600 transition duration-300">
           Kembali ke Daftar
        </a>
    </div>
</div>
@endsection
