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
        Schema::create('trash_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');       // Nama sampah
            $table->text('desc');         // Deskripsi
            $table->string('img');        // Path gambar
            $table->decimal('price', 12, 2); // Harga (contoh 9999999999.99)
            $table->timestamps();         // created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trash_types');
    }
};
