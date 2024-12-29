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
        Schema::create('documents', function (Blueprint $table) {
            $table->id(); // Kolom id (primary key)
            $table->string('title'); // Kolom title
            $table->text('description')->nullable(); // Kolom deskripsi
            $table->string('category'); // Kolom kategori
            $table->year('year')->nullable(); // Kolom tahun
            $table->string('file_path'); // Lokasi file
            $table->string('dokumen')->nullable(); // Kolom dokumen tambahan
            $table->string('cover')->nullable(); // Kolom cover gambar
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending'); // Status dokumen
            $table->timestamp('submission_date')->nullable(); // Tanggal pengajuan
            $table->timestamp('review_date')->nullable(); // Tanggal review
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Relasi ke tabel users
            $table->integer('nim')->nullable(); // Kolom nim dengan tipe integer
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
