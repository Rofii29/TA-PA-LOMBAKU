<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('profile_mahasiswa', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->unique(); // relasi one-to-one
            $table->string('nim')->nullable();
            $table->string('universitas')->nullable();
            $table->string('program_studi')->nullable();
            $table->string('fakultas')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('headline')->nullable();
            $table->text('deskripsi_diri')->nullable();
            $table->text('alamat')->nullable();
            $table->string('sosial_media')->nullable();
            $table->string('foto_profil')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void {
        Schema::dropIfExists('profile_mahasiswa');
    }
};
