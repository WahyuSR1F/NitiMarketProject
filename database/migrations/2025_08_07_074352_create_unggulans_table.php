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
        Schema::create('unggulans', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('product_id'); // Foreign key dari tabel products
            $table->string('keterangan');
            $table->timestamps();
    
            // Foreign key constraint
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('unggulans');
    }
};
