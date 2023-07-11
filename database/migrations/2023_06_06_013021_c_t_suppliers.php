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
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();

            $table->string('fantasy_name');
            $table->string('social_reason');
            $table->string('cnpj')->comment("{ \"mask\" : \"00.000.000/0000-00\" }");
            $table->string('phone')->comment("{ \"mask\" : \"(00) 00000-0000\" }")->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suppliers');
    }
};
