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
        Schema::create('packet_product', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('packet_id');
            $table->uuid('product_id');
            $table->integer('jumlah')->default(1); // jumlah produk dalam packet
            $table->timestamps();
    
            // Foreign key constraints
            $table->foreign('packet_id')->references('id')->on('packets')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
    
            // Optional: untuk mencegah duplikasi
            $table->unique(['packet_id', 'product_id']);
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
