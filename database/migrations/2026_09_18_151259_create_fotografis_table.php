<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('fotografis', function (Blueprint $table) {
            $table->id();
            $table->string('foto');
            $table->string('foto_original')->nullable();
            $table->string('genre');
            $table->string('nama_foto');
            $table->text('deskripsi');
            $table->string('kamera');
            $table->integer('zoom');
            $table->decimal('aperture');
            $table->string('shuterspeed');
            $table->integer('iso');
            $table->string('lokasi');
            $table->date('tanggal');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::table('fotografis', function (Blueprint $table) {
            $table->dropColumn('foto_original');
        });
    }
};
