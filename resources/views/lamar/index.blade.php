@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <h1 class="text-2xl font-bold text-orange-600 mb-6">Daftar Lamaran</h1>
    
    @if ($lamarans->isEmpty())
        <p class="text-gray-500">Belum ada lamaran yang dibuat.</p>
    @else
        <div class="overflow-hidden shadow sm:rounded-lg">
            <table class="min-w-full border-collapse border border-gray-200 bg-white">
                <thead>
                    <tr class="bg-orange-500 text-white">
                        <th class="border border-gray-200 px-4 py-2 text-left">No</th>
                        <th class="border border-gray-200 px-4 py-2 text-left">Posisi</th>
                        <th class="border border-gray-200 px-4 py-2 text-left">Promosikan Diri</th>
                        <th class="border border-gray-200 px-4 py-2 text-left">Tanggal</th>
                        <th class="border border-gray-200 px-4 py-2 text-left">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($lamarans as $index => $lamaran)
                        <tr class="hover:bg-gray-50">
                            <td class="border border-gray-200 px-4 py-2">{{ $index + 1 }}</td>
                            <td class="border border-gray-200 px-4 py-2">{{ $lamaran->lowongan->posisi }}</td>
                            <td class="border border-gray-200 px-4 py-2">{{ Str::limit($lamaran->promosikan_diri, 50) }}</td>
                            <td class="border border-gray-200 px-4 py-2">{{ $lamaran->created_at->format('d M Y') }}</td>
                            <td class="border border-gray-200 px-4 py-2">
                                <div class="flex space-x-2">
                                    <a href="{{ route('lamar.show', $lamaran->id) }}" 
                                       class="text-orange-500 hover:text-orange-600">Detail</a>
                                    <form method="POST" action="{{ route('lamar.destroy', $lamaran->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="text-red-500 hover:text-red-600" 
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus lamaran ini?')">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $lamarans->links('pagination::tailwind') }}
        </div>
    @endif
</div>
@endsection
