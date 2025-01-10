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
    Schema::create('lamaran', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('lowongan_pekerjaan_id');
        $table->unsignedBigInteger('user_id');
        $table->timestamps();
        $table->foreign('lowongan_pekerjaan_id')->references('id')->on('lowongan_pekerjaan')->onDelete('cascade');
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lamaran');
    }
};
