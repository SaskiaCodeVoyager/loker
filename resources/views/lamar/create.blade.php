@extends('layouts.app')

@section('content')
    <h1>Buat Lamaran Baru</h1>

    <form method="POST" action="{{ route('lamar.store') }}" enctype="multipart/form-data">
        @csrf

        <!-- Promosikan Diri -->
        <div>
            <label for="promosikan_diri">Promosikan Diri:</label>
            <textarea name="promosikan_diri" id="promosikan_diri" required></textarea>
        </div>

        <!-- Upload Resume -->
        <div>
            <label for="upload_file_resume">Upload Resume:</label>
            <input type="file" name="upload_file_resume" id="upload_file_resume" accept=".pdf,.doc,.docx" required>
        </div>

        <!-- Pilih Lowongan -->
        <div>
            <label for="id_lowongan_pekerjaan">Lowongan:</label>
            <select name="id_lowongan_pekerjaan" id="id_lowongan_pekerjaan" required>
                @foreach($lowongans as $lowongan)
                    <option value="{{ $lowongan->id }}">{{ $lowongan->posisi }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit">Submit Lamaran</button>
    </form>
@endsection
