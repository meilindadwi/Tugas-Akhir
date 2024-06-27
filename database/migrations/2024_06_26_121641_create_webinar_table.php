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
        Schema::create('webinar', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->longText('deskripsi_materi');
            $table->dateTime('tanggal');
            $table->string('waktu')->default('UTC');
            $table->string('pembicara')->nullable();
            $table->string('foto');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('webinar');
    }
};
