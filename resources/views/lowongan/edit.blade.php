@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Lowongan Pekerjaan</h1>

    @if ($perusahaan->isEmpty())
        <div class="alert alert-warning">
            Anda belum memiliki perusahaan terdaftar. Silakan daftarkan perusahaan Anda terlebih dahulu.
        </div>
    @else
        <form action="{{ route('lowongan.update', $lowongan->id) }}" method="POST">
            @csrf
            @method('PUT') <!-- Method Spoofing untuk HTTP PUT Request -->

            <div class="mb-3">
                <label for="perusahaan_id" class="form-label">Perusahaan</label>
                <select name="perusahaan_id" class="form-control" required>
                    @foreach ($perusahaan as $p)
                        <option value="{{ $p->id }}" {{ $p->id == $lowongan->perusahaan_id ? 'selected' : '' }}>
                            {{ $p->nama_perusahaan }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="posisi" class="form-label">Posisi</label>
                <input type="text" name="posisi" class="form-control" value="{{ old('posisi', $lowongan->posisi) }}" required>
            </div>

            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea name="deskripsi" class="form-control" required>{{ old('deskripsi', $lowongan->deskripsi) }}</textarea>
            </div>

            <div class="mb-3">
                <label for="gaji" class="form-label">Gaji</label>
                <input type="number" name="gaji" class="form-control" value="{{ old('gaji', $lowongan->gaji) }}" required>
            </div>

            <div class="mb-3">
                <label for="tipe_pekerjaan" class="form-label">Tipe Pekerjaan</label>
                <select name="tipe_pekerjaan" class="form-control" required>
                    <option value="freelance" {{ $lowongan->tipe_pekerjaan == 'freelance' ? 'selected' : '' }}>Freelance</option>
                    <option value="parttime" {{ $lowongan->tipe_pekerjaan == 'parttime' ? 'selected' : '' }}>Part-time</option>
                    <option value="fulltime" {{ $lowongan->tipe_pekerjaan == 'fulltime' ? 'selected' : '' }}>Full-time</option>
                    <option value="kontrak" {{ $lowongan->tipe_pekerjaan == 'kontrak' ? 'selected' : '' }}>Kontrak</option>
                    <option value="magang" {{ $lowongan->tipe_pekerjaan == 'magang' ? 'selected' : '' }}>Magang</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    @endif
</div>
@endsection
