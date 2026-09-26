<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('gears', function (Blueprint $table) {
            $table->id();
            $table->string('foto_gear');
            $table->string('title');
            $table->string('nama_gear');
            $table->string('jumlah_gear');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('gears');
    }
};
