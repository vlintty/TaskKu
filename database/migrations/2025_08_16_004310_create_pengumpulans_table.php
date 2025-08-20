<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('pengumpulan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tugas_id')->constrained()->onDelete('cascade');
            $table->foreignId('siswa_id')->constrained('users')->onDelete('cascade');
            $table->string('nama')->nullable(); // nama siswa wajib diisi
            $table->string('file'); // path file tugas
            $table->integer('nilai')->nullable(); // nilai dari guru
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('pengumpulan');
    }
};
