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
    {Schema::create('nilai', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('tugas_id');
    $table->unsignedBigInteger('siswa_id');
    $table->integer('nilai')->nullable();
    $table->timestamps();

    $table->foreign('tugas_id')->references('id')->on('tugas')->onDelete('cascade');
    $table->foreign('siswa_id')->references('id')->on('users')->onDelete('cascade');
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilai');
    }
};
