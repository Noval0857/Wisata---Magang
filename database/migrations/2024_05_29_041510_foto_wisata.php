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
        Schema::create('foto_wisata', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_wisata')->constrained('wisatas')->onDelete('cascade');
            $table->String('nama_foto_wisata');
            $table->string('path');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('foto_wisata');
    }
};
