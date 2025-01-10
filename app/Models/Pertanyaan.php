<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pertanyaan extends Model
{
    use HasFactory;

    protected $fillable = [
        'lowongan_pekerjaan_id',
        'judul_pertanyaan',
        'deskripsi',
    ];

    /**
     * Mendapatkan lowongan yang terkait dengan pertanyaan.
     */
    public function lowonganPekerjaan()
    {
        return $this->belongsTo(LowonganPekerjaan::class, 'lowongan_pekerjaan_id');
    }
}
