<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('lamars', function (Blueprint $table) {
            $table->id();
            $table->text('promosikan_diri'); // Kolom untuk memasukkan deskripsi tentang diri pengguna
            $table->string('upload_file_resume'); // Kolom untuk menyimpan nama file resume (bisa diubah dengan tipe BLOB jika diperlukan)
            $table->foreignId('id_lowongan_pekerjaan')->constrained('lowongan_pekerjaan')->onDelete('cascade'); // Relasi ke tabel 'lowongans'
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lamars');
    }
};
