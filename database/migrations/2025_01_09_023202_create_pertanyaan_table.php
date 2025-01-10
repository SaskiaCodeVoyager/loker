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
        Schema::create('pertanyaans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('lowongan_pekerjaan_id');  // Sesuaikan nama kolom dengan tabel yang benar
            $table->string('judul_pertanyaan');
            $table->text('deskripsi')->nullable();
            $table->foreign('lowongan_pekerjaan_id')  // Pastikan nama foreign key benar
                  ->references('id')
                  ->on('lowongan_pekerjaan')  // Pastikan nama tabel yang dirujuk benar
                  ->onDelete('cascade');
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('pertanyaans');
    }
};