@extends('layouts.app')

@section('content')
    <h1>Edit Lamaran</h1>

    <form method="POST" action="{{ route('lamar.update', $lamar->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Promosikan Diri -->
        <div>
            <label for="promosikan_diri">Promosikan Diri:</label>
            <textarea name="promosikan_diri" id="promosikan_diri" required>{{ $lamar->promosikan_diri }}</textarea>
        </div>

        <!-- Upload Resume -->
        <div>
            <label for="upload_file_resume">Upload Resume (Biarkan Kosong Jika Tidak Ingin Mengubah):</label>
            <input type="file" name="upload_file_resume" id="upload_file_resume" accept=".pdf,.doc,.docx">
        </div>

        <!-- Pilih Lowongan -->
        <div>
            <label for="id_lowongan_pekerjaan">Lowongan:</label>
            <select name="id_lowongan_pekerjaan" id="id_lowongan_pekerjaan" required>
                @foreach($lowongans as $lowongan)
                    <option value="{{ $lowongan->id }}" {{ $lowongan->id == $lamar->id_lowongan_pekerjaan ? 'selected' : '' }}>
                        {{ $lowongan->judul_pekerjaan }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit">Update Lamaran</button>
    </form>
@endsection
