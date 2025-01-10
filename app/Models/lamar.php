<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lamar extends Model
{
    use HasFactory;

    protected $fillable = ['promosikan_diri', 'upload_file_resume', 'id_lowongan_pekerjaan'];

    public function lowongan()
    {
        return $this->belongsTo(LowonganPekerjaan::class, 'id_lowongan_pekerjaan');
    }
}
