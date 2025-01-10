@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Daftarkan Perusahaan Anda</h1>
    <form action="{{ route('perusahaan.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6 bg-white p-6 rounded-lg shadow-md">
        @csrf
        <div>
            <label for="nama_perusahaan" class="block text-sm font-medium text-gray-700">Nama Perusahaan</label>
            <input type="text" name="nama_perusahaan" class="mt-2 w-full rounded-lg border-gray-300 shadow-sm focus:ring-orange-500 focus:border-orange-500 @error('nama_perusahaan') border-red-500 @enderror" required value="{{ old('nama_perusahaan') }}">
            @error('nama_perusahaan')
                <small class="text-red-500">{{ $message }}</small>
            @enderror
        </div>
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Email Perusahaan</label>
            <input type="email" name="email" class="mt-2 w-full rounded-lg border-gray-300 shadow-sm focus:ring-orange-500 focus:border-orange-500 @error('email') border-red-500 @enderror" required value="{{ old('email') }}">
            @error('email')
                <small class="text-red-500">{{ $message }}</small>
            @enderror
        </div>
        <div>
            <label for="telepon" class="block text-sm font-medium text-gray-700">Nomor Telepon</label>
            <input type="text" name="telepon" class="mt-2 w-full rounded-lg border-gray-300 shadow-sm focus:ring-orange-500 focus:border-orange-500 @error('telepon') border-red-500 @enderror" required value="{{ old('telepon') }}">
            @error('telepon')
                <small class="text-red-500">{{ $message }}</small>
            @enderror
        </div>
        <div>
            <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
            <textarea name="alamat" rows="3" class="mt-2 w-full rounded-lg border-gray-300 shadow-sm focus:ring-orange-500 focus:border-orange-500 @error('alamat') border-red-500 @enderror" required>{{ old('alamat') }}</textarea>
            @error('alamat')
                <small class="text-red-500">{{ $message }}</small>
            @enderror
        </div>
        <div>
            <label for="logo" class="block text-sm font-medium text-gray-700">Logo Perusahaan (Opsional)</label>
            <input type="file" name="logo" class="mt-2 w-full rounded-lg border-gray-300 shadow-sm focus:ring-orange-500 focus:border-orange-500 @error('logo') border-red-500 @enderror" accept="image/*">
            <small class="text-gray-500">Format yang didukung: JPEG, PNG, JPG, GIF (Maksimal 2MB)</small>
            @error('logo')
                <small class="text-red-500">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="w-full px-4 py-2 bg-orange-500 text-white rounded-lg shadow hover:bg-orange-600 focus:outline-none focus:ring-2 focus:ring-orange-500 transition duration-300">
            Simpan
        </button>
    </form>
</div>
@endsection
