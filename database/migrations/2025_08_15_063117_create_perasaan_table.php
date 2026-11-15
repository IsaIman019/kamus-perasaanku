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
        Schema::create('master_perasaan', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->text('keterangan1')->nullable();
            $table->text('keterangan2')->nullable();
            $table->string('gambar')->nullable();
            $table->string('gambar_real')->nullable();
            $table->string('audio')->nullable();
            $table->string('status')->default('ACTIVE');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perasaan');
    }
};
