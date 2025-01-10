@extends('layouts.app') 

@section('content') 
<div class="container"> 
    <h1>Detail Lowongan Pekerjaan</h1> 

    <div class="card mb-4"> 
        <div class="card-header"> 
            <h3>{{ $lowongan->posisi }}</h3> 
        </div> 
        <div class="card-body"> 
            <div class="row mb-3"> 
                <div class="col-md-6"> 
                    <strong>Perusahaan:</strong> {{ $lowongan->perusahaan->nama }} <br> 
                    <strong>Alamat:</strong> {{ $lowongan->perusahaan->alamat }} <br> 
                    <img src="{{ asset('storage/'.$lowongan->perusahaan->logo) }}" alt="Logo" class="img-fluid" style="width: 100px;"> 
                </div> 
                <div class="col-md-6"> 
                    <strong>Deskripsi Pekerjaan:</strong> <p>{{ $lowongan->deskripsi }}</p> 
                    <strong>Gaji:</strong> Rp {{ number_format($lowongan->gaji, 0, ',', '.') }} <br> 
                    <strong>Tipe Pekerjaan:</strong> {{ ucwords($lowongan->tipe_pekerjaan) }} 
                </div> 
            </div> 

            <!-- Tombol Lamar Pekerjaan -->
            <div class="mt-3">
                @if(Auth::check())
                    <a href="{{ route('lamar.create', $lowongan->id) }}" class="btn btn-success">Lamar Pekerjaan</a>
                @endif
            </div>

            <!-- Modal untuk Melamar Pekerjaan -->
            <div class="modal fade" id="lamarModal" tabindex="-1" aria-labelledby="lamarModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <!-- Jika hanya perusahaan yang ingin mengedit atau menghapus --> 
                        @if(Auth::user()->perusahaan && Auth::user()->perusahaan->id === $lowongan->perusahaan->id) 
                            <div class="mt-3"> 
                                <a href="{{ route('lowongan.edit', $lowongan->id) }}" class="btn btn-warning">Edit</a> 
                                <form action="{{ route('lowongan.destroy', $lowongan->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Anda yakin ingin menghapus lowongan ini?');"> 
                                    @csrf 
                                    @method('DELETE') 
                                    <button type="submit" class="btn btn-danger">Hapus</button> 
                                </form> 
                            </div> 
                        @endif 
                    </div> 
                </div> 
            </div> 

            <a href="{{ route('lowongan.index') }}" class="btn btn-secondary">Kembali ke Daftar Lowongan</a> 
        </div> 
    </div> 
</div> 
@endsection