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
        Schema::create('xml_files', function (Blueprint $table) {
            $table->id();

            $table->string('number');
            $table->string('key');
            $table->unsignedBigInteger('supplier_id')->comment('{ "column" : "fantasy_name" }')->nullabe();
            $table->float('value');
            $table->boolean('is_finished');

            $table->timestamps();

            $table->foreign('supplier_id', 'xml_files_fk_suppliers')->references('id')->on('suppliers');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('xml_files');
    }
};
