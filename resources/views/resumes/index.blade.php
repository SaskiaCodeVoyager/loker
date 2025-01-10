@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-2xl font-semibold">Daftar Resume</h1>
    @if (session('success'))
        <div class="text-green-600">{{ session('success') }}</div>
    @endif
    <div class="mt-4">
        <a href="{{ route('resumes.create') }}" class="btn btn-primary">Buat Resume Baru</a>
    </div>
    <div class="mt-6">
        <table class="table-auto w-full">
            <thead>
                <tr>
                    <th class="px-4 py-2">Nama Lengkap</th>
                    <th class="px-4 py-2">Jenis Kelamin</th>
                    <th class="px-4 py-2">Tahun Lahir</th>
                    <th class="px-4 py-2">Foto</th>
                    <th class="px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($resumes as $resume)
                    <tr>
                        <td class="px-4 py-2">{{ $resume->nama_lengkap }}</td>
                        <td class="px-4 py-2">{{ $resume->jenis_kelamin }}</td>
                        <td class="px-4 py-2">{{ $resume->tahun_lahir }}</td>
                        <td class="px-4 py-2">
                            @if ($resume->foto)
                                <img src="{{ Storage::url($resume->foto) }}" alt="Foto Resume" width="50">
                            @else
                                Tidak ada foto
                            @endif
                        </td>
                        <td class="px-4 py-2">
                            <a href="{{ route('resumes.edit', $resume->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('resumes.destroy', $resume->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
