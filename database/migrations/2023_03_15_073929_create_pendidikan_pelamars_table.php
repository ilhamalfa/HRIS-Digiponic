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
        Schema::create('pendidikan_pelamars', function (Blueprint $table) {
            $table->id();
            $table->enum('tingkat_pendidikan', ['SMA Sederajat', 'D1', 'D2', 'D3', 'D4/S1', 'S2', 'S3']);
            $table->string('nama_lembaga');
            $table->date('tanggal mulai');
            $table->date('tanggal_berakhir');
            $table->foreignId('pelamar_id')->constrained('pelamars');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendidikan_pelamars');
    }
};
