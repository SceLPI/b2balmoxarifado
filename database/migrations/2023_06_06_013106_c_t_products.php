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
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->string('code', 40);
            $table->double('stock')->default(0.0);
            $table->double('ultimo_valor_compra')->nullable();
            $table->unsignedBigInteger('manufacturer_id')->nullable();
            $table->unsignedBigInteger('supplier_id');
            $table->unsignedBigInteger('category_id')->nullabe();
            $table->unsignedBigInteger('warehouse_id')->nullable();


            $table->timestamps();
            $table->softDeletes();

            $table->foreign('manufacturer_id', 'products_fk_manufacturers')->references('id')->on('manufacturers');
            $table->foreign('category_id', 'products_fk_categories')->references('id')->on('categories');
            $table->foreign('supplier_id', 'products_fk_suppliers')->references('id')->on('suppliers');
            $table->foreign('warehouse_id', 'products_fk_warehouses')->references('id')->on('warehouses');
            $table->index(['code', 'supplier_id', 'warehouse_id'])->unique();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
