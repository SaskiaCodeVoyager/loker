@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-2xl font-semibold">Edit Resume</h1>

    @if ($errors->any())
        <div class="text-red-600">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('resumes.update', $resume->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="mt-4">
            <label for="nama_lengkap">Nama Lengkap</label>
            <input type="text" name="nama_lengkap" id="nama_lengkap" value="{{ old('nama_lengkap', $resume->nama_lengkap) }}" class="input" required>
        </div>

        <div class="mt-4">
            <label for="jenis_kelamin">Jenis Kelamin</label>
            <select name="jenis_kelamin" id="jenis_kelamin" class="input" required>
                <option value="Pria" {{ $resume->jenis_kelamin == 'Pria' ? 'selected' : '' }}>Pria</option>
                <option value="Wanita" {{ $resume->jenis_kelamin == 'Wanita' ? 'selected' : '' }}>Wanita</option>
            </select>
        </div>

        <div class="mt-4">
            <label for="tahun_lahir">Tahun Lahir</label>
            <input type="number" name="tahun_lahir" id="tahun_lahir" value="{{ old('tahun_lahir', $resume->tahun_lahir) }}" class="input" required>
        </div>

        <div class="mt-4">
            <label for="lokasi">Lokasi</label>
            <input type="text" name="lokasi" id="lokasi" value="{{ old('lokasi', $resume->lokasi) }}" class="input" required>
        </div>

        <div class="mt-4">
            <label for="foto">Foto</label>
            <input type="file" name="foto" id="foto" class="input">
            @if ($resume->foto)
                <div class="mt-2">
                    <img src="{{ Storage::url($resume->foto) }}" alt="Foto Resume" width="50">
                </div>
            @endif
        </div>

        <!-- Input fields for pengalaman, pendidikan, keahlian, minat, ringkasan_pribadi -->

        <div class="mt-6">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
</div>
@endsection
