<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('resumes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pengguna')->constrained('users')->onDelete('cascade');
            $table->string('nama_lengkap');
            $table->enum('jenis_kelamin', ['Pria', 'Wanita']);
            $table->year('tahun_lahir');
            $table->string('lokasi'); 
            $table->text('pengalaman')->nullable();
            $table->text('pendidikan')->nullable();
            $table->text('keahlian')->nullable();
            $table->text('minat')->nullable();
            $table->text('ringkasan_pribadi')->nullable();
            $table->string('foto')->nullable(); // Kolom foto ditambahkan
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('resumes');
    }
};
