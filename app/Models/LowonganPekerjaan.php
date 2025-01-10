<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LowonganPekerjaan extends Model
{
    use HasFactory;

    protected $table = 'lowongan_pekerjaan'; // Nama tabel di database

    /**
     * Kolom yang dapat diisi (fillable).
     */
    protected $fillable = [
        'perusahaan_id',
        'posisi',
        'deskripsi',
        'gaji',          // Tambahkan kolom gaji
        'tipe_pekerjaan', // Tambahkan kolom tipe_pekerjaan
    ];

    /**
     * Relasi dengan model Perusahaan.
     */
    public function perusahaan()
    {
        return $this->belongsTo(Perusahaan::class);
    }

    public function pertanyaan()
{
    return $this->hasMany(Pertanyaan::class, 'lowongan_pekerjaan_id');
}

}
