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
        Schema::create('pegawais', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('alamat');
            $table->date('tanggal_lahir');
            $table->integer('umur');
            $table->string('email');
            $table->string('foto');
            $table->enum('jenis kelamin', ['Laki-laki', 'Perempuan']);
            $table->string('nomor_hp');
            $table->enum('status_pernikahan', ['Lajang', 'Menikah', 'Cerai']);
            $table->integer('jumlah_anak');
            $table->string('department');
            $table->string('golongan');
            $table->integer('jumlah_cuti');
            $table->foreignId('user_id')->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegawais');
    }
};
