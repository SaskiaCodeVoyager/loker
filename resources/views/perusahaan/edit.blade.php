@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Perusahaan</h1>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('perusahaan.update', $perusahaan->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama_perusahaan" class="form-label">Nama Perusahaan</label>
            <input type="text" name="nama_perusahaan" class="form-control @error('nama_perusahaan') is-invalid @enderror" value="{{ old('nama_perusahaan', $perusahaan->nama_perusahaan) }}" required>
            @error('nama_perusahaan')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $perusahaan->email) }}" required>
            @error('email')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="telepon" class="form-label">Telepon</label>
            <input type="text" name="telepon" class="form-control @error('telepon') is-invalid @enderror" value="{{ old('telepon', $perusahaan->telepon) }}" required>
            @error('telepon')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror" value="{{ old('alamat', $perusahaan->alamat) }}" required>
            @error('alamat')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="logo" class="form-label">Logo Perusahaan</label>
            <input type="file" name="logo" class="form-control @error('logo') is-invalid @enderror" accept="image/*">
            <small class="text-muted">Biarkan kosong jika tidak ingin mengubah logo.</small>
            @error('logo')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        @if($perusahaan->logo)
            <div class="mb-3">
                <p>Logo Saat Ini:</p>
                <img src="{{ asset('storage/' . $perusahaan->logo) }}" alt="Logo Perusahaan" style="max-width: 150px;">
            </div>
        @endif

        <button type="submit" class="btn btn-primary">Perbarui Data Perusahaan</button>
    </form>
</div>
@endsection
