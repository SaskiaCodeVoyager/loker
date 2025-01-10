<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_pengguna', 
        'nama_lengkap', 
        'jenis_kelamin', 
        'tahun_lahir', 
        'lokasi', 
        'pengalaman', 
        'pendidikan', 
        'keahlian', 
        'minat', 
        'ringkasan_pribadi',
        'foto',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_pengguna'); // Sesuaikan foreign key di tabel `resumes`.
    }
}
