<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('master_soal', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('level_id');
            $table->foreign('level_id')->references('id')->on('master_level')->onDelete('cascade');
            $table->string('judul');
            $table->text('pertanyaan');
            $table->string('gambar')->nullable();
            $table->text('deskripsi')->nullable();
            $table->integer('jumlah_isian')->default(1); 
            $table->json('jawaban_benar'); 
            $table->integer('bobot')->default(100);
            $table->string('background_color')->nullable();
            $table->string('status')->default('ACTIVE');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('soal');
    }
};
