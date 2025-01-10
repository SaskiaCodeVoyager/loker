<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perusahaan extends Model
{
    use HasFactory;

    protected $table = 'perusahaan';

    /**
     * Kolom yang dapat diisi.
     */
    protected $fillable = [
        'nama_perusahaan',
        'email',
        'telepon',
        'alamat',
        'user_id',
        'logo',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    /**
     * Relasi dengan tabel lowongan pekerjaan.
     */
    public function lowonganPekerjaan()
    {
        return $this->hasMany(LowonganPekerjaan::class);
    }
}
