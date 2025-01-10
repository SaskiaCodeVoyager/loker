@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-10">
    <h1 class="text-2xl font-bold mb-6">Tambah Lowongan Pekerjaan</h1>

    @if ($perusahaan->isEmpty())
        <div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded relative mb-6" role="alert">
            <strong class="font-bold">Peringatan!</strong>
            <span class="block sm:inline">Anda belum memiliki perusahaan terdaftar. Silakan daftarkan perusahaan Anda terlebih dahulu.</span>
        </div>
    @else
        <form action="{{ route('lowongan.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
            @csrf
            <div class="mb-4">
                <label for="perusahaan_id" class="block text-sm font-medium text-gray-700">Perusahaan</label>
                <select name="perusahaan_id" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500 focus:border-blue-500" required>
                    @foreach ($perusahaan as $p)
                        <option value="{{ $p->id }}">{{ $p->nama_perusahaan }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="posisi" class="block text-sm font-medium text-gray-700">Posisi</label>
                <input type="text" name="posisi" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500 focus:border-blue-500" required>
            </div>

            <div class="mb-4">
                <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                <textarea name="deskripsi" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500 focus:border-blue-500" rows="4" required></textarea>
            </div>

            <div class="mb-4">
                <label for="gaji" class="block text-sm font-medium text-gray-700">Gaji</label>
                <input type="number" name="gaji" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500 focus:border-blue-500" required>
            </div>

            <div class="mb-4">
                <label for="tipe_pekerjaan" class="block text-sm font-medium text-gray-700">Tipe Pekerjaan</label>
                <select name="tipe_pekerjaan" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500 focus:border-blue-500" required>
                    <option value="freelance">Freelance</option>
                    <option value="parttime">Part-time</option>
                    <option value="fulltime">Full-time</option>
                    <option value="kontrak">Kontrak</option>
                    <option value="magang">Magang</option>
                </select>
            </div>

            <button type="submit" class="w-full bg-blue-500 text-white font-semibold py-2 px-4 rounded-md hover:bg-blue-600 transition duration-200">Simpan</button>
        </form>
    @endif
</div>
@endsection