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
        Schema::create('pengalaman_pelamars', function (Blueprint $table) {
            $table->id();
            $table->string('posisi');
            $table->string('nama_lembaga');
            $table->date('tanggal mulai');
            $table->date('tanggal_berakhir');
            $table->string('deskripsi')->nullable();
            $table->foreignId('pelamar_id')->constrained('pelamars');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengalaman_pelamars');
    }
};
