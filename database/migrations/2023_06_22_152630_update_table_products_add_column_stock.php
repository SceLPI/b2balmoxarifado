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
        Schema::table('products', function (Blueprint $table) {
            $table->unsignedBigInteger('warehouse_id')->after('category_id')->nullable();
            $table->double('stock')->after('code')->default(0.0);


            $table->foreign('warehouse_id', 'products_fk_warehouses')->references('id')->on('warehouses');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign('products_fk_warehouses');
            $table->dropColumn('warehouse_id');
            $table->dropColumn('stock');
        });
    }
};
