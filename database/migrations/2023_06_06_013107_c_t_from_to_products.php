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
        Schema::create('from_to_products', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('main_product_id');
            $table->unsignedBigInteger('secondary_product_id');

            $table->timestamps();

            $table->foreign('main_product_id')->references('id')->on('products');
            $table->foreign('secondary_product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('from_to_products');
    }
};
