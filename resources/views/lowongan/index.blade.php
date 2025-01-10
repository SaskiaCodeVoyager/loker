@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto p-6 bg-white shadow-lg rounded-lg">

    <!-- Judul Halaman -->
    <h1 class="text-4xl font-semibold text-gray-800 mb-6">Daftar Lowongan Pekerjaan</h1>

    <!-- Flash Message Success -->
    @if ($lowongan->isEmpty())
    <p class="text-gray-600">Tidak ada lowongan yang tersedia.</p>
    <a href="{{ route('lowongan.create') }}" class="inline-block bg-blue-500 text-white py-2 px-6 rounded-lg mb-6">Tambah lowongan</a>
    @else
    <a href="{{ route('lowongan.create') }}" class="inline-block bg-blue-500 text-white py-2 px-6 rounded-lg mb-6">Tambah lowongan</a>
    <div class="overflow-x-auto bg-white shadow-md rounded-lg">
        <table class="min-w-full table-auto">
            <thead class="bg-blue-500 text-white">
                <tr>
                    <th class="px-6 py-3 text-left">Posisi</th>
                    <th class="px-6 py-3 text-left">Deskripsi</th>
                    <th class="px-6 py-3 text-left">Pertanyaan</th>
                    <th class="px-6 py-3 text-left">Gaji</th>
                    <th class="px-6 py-3 text-left">Tipe Pekerjaan</th>
                    <th class="px-6 py-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach ($lowongan as $l)
                <tr class="hover:bg-gray-50">
                    <!-- Posisi -->
                    <td class="px-6 py-4">{{ $l->posisi }}</td>
                    
                    <!-- Deskripsi -->
                    <td class="px-6 py-4">{{ $l->deskripsi }}</td>

                    <!-- Pertanyaan -->
                    <td class="px-6 py-4">
                        @if ($l->pertanyaan->isNotEmpty())
                            @foreach ($l->pertanyaan as $pertanyaan)
                                <p><strong>{{ $pertanyaan->judul_pertanyaan }}</strong>: {{ $pertanyaan->deskripsi }}</p>
                            @endforeach
                        @else
                            <p>Tidak ada pertanyaan terkait.</p>
                        @endif
                    </td>
                    
                    <!-- Gaji -->
                    <td class="px-6 py-4">{{ $l->gaji ? 'Rp. ' . number_format($l->gaji, 0, ',', '.') : '-' }}</td>
                    
                    <!-- Tipe Pekerjaan -->
                    <td class="px-6 py-4">{{ ucwords($l->tipe_pekerjaan) }}</td>

                    <!-- Aksi -->
                    <td class="px-6 py-4 text-center">
                        <a href="{{ route('lowongan.edit', $l->id) }}" class="inline-block bg-yellow-500 text-white py-2 px-4 rounded-lg hover:bg-yellow-600 transition duration-300 mr-3">
                            Edit
                        </a>
                        @if(Auth::user()->perusahaan && Auth::user()->perusahaan->id === $l->perusahaan->id)
                            <a href="{{ route('pertanyaan.create', ['lowongan_id' => $l->id]) }}" class="inline-block bg-green-500 text-white py-2 px-4 rounded-lg hover:bg-green-600 transition duration-300 mr-3">
                                Tambah Pertanyaan
                            </a>
                        @endif
                        <form action="{{ route('lowongan.destroy', $l->id) }}" method="POST" class="inline" onsubmit="return confirm('Anda yakin ingin menghapus lowongan ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="inline-block bg-red-500 text-white py-2 px-4 rounded-lg hover:bg-red-600 transition duration-300">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif
    
</div>
@endsection
