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
        Schema::create('lowongan_pekerjaan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('perusahaan_id');
            $table->string('posisi');
            $table->text('deskripsi');
            $table->decimal('gaji', 15, 2)->nullable(); // Kolom gaji dengan tipe decimal
            $table->enum('tipe_pekerjaan', ['freelance', 'parttime', 'fulltime', 'kontrak', 'magang']); // Kolom tipe pekerjaan enum
            $table->timestamps();
            $table->foreign('perusahaan_id')->references('id')->on('perusahaan')->onDelete('cascade');
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lowongan_pekerjaan');
    }
};
