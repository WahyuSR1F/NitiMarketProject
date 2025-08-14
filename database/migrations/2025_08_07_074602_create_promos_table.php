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
        Schema::create('promos', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('product_id');
            $table->string('judul');
            $table->text('deskripsi')->nullable();
            $table->decimal('diskon_persen', 5, 2)->default(0); // Misalnya: 10.50%
            $table->timestamp('mulai')->nullable();
            $table->timestamp('berakhir')->nullable();
            $table->timestamps();
    
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promos');
    }
};
