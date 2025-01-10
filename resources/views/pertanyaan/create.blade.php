@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto p-6 bg-white rounded-lg shadow-lg">
    <h1 class="text-2xl font-semibold text-orange-600 mb-4">Tambah Pertanyaan Baru</h1>

    <!-- Form untuk menambahkan pertanyaan baru -->
    <form action="{{ route('pertanyaan.store') }}" method="POST">
        @csrf
        <input type="hidden" name="lowongan_pekerjaan_id" value="{{ $lowongan->id }}">



        <div class="space-y-4">
            <div>
                <label for="judul_pertanyaan" class="block text-gray-700">Judul Pertanyaan</label>
                <input type="text" name="judul_pertanyaan" id="judul_pertanyaan" class="w-full mt-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500" required>
            </div>
            <div>
                <label for="deskripsi" class="block text-gray-700">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" rows="4" class="w-full mt-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500"></textarea>
            </div>
            <div class="text-right">
                <button type="submit" class="bg-orange-500 text-white px-6 py-3 rounded-lg hover:bg-orange-600">Simpan Pertanyaan</button>
            </div>
        </div>
    </form>
</div>
@endsection
