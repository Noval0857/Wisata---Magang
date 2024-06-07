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
        Schema::create('wisatas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_wisata');
            $table->text('deskripsi')->nullable();
            $table->text('alamat')->nullable();
            $table->string('google_maps_url')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wisatas');
    }
};
