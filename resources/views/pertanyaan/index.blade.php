@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto p-6 bg-white shadow-lg rounded-lg">
    <h1 class="text-4xl font-semibold text-gray-800 mb-6">Daftar Pertanyaan</h1>

    @if(session('success'))
    <div class="mb-4 p-4 bg-green-500 text-white rounded-lg">
        {{ session('success') }}
    </div>
    @endif

    <a href="{{ route('pertanyaan.create') }}" class="inline-block bg-blue-500 text-white py-2 px-6 rounded-lg mb-6">Tambah Pertanyaan</a>

    @if($pertanyaan->isEmpty())
    <p class="text-gray-600">Tidak ada pertanyaan yang tersedia.</p>
    @else
    <table class="min-w-full table-auto bg-white shadow-md rounded-lg">
        <thead class="bg-blue-500 text-white">
            <tr>
                <th class="px-6 py-3 text-left">Judul Pertanyaan</th>
                <th class="px-6 py-3 text-left">Deskripsi</th>
                <th class="px-6 py-3 text-left">Lowongan Pekerjaan</th>
                <th class="px-6 py-3 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @foreach ($pertanyaan as $p)
            <tr>
                <td class="px-6 py-4">{{ $p->judul_pertanyaan }}</td>
                <td class="px-6 py-4">{{ $p->deskripsi }}</td>
                <td class="px-6 py-4">{{ $p->lowonganPekerjaan->posisi }}</td>
                <td class="px-6 py-4 text-center">
                    <a href="{{ route('pertanyaan.edit', $p->id) }}" class="inline-block bg-yellow-500 text-white py-2 px-4 rounded-lg hover:bg-yellow-600">Edit</a>
                    <form action="{{ route('pertanyaan.destroy', $p->id) }}" method="POST" class="inline" onsubmit="return confirm('Anda yakin ingin menghapus pertanyaan ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="inline-block bg-red-500 text-white py-2 px-4 rounded-lg hover:bg-red-600">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>
@endsection
