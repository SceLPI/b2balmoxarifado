<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	use HasFactory;

	protected $table = "products";

	protected $casts = [
		"created_at" => "datetime",
		"updated_at" => "datetime",
		"deleted_at" => "datetime",
	];
	public function getCategorysAttribute()
	{
		return Category::all();
	}
	public function Category()
	{
		return $this->belongsTo(Category::class, "category_id", "id");
	}
	public function getSuppliersAttribute()
	{
		return Supplier::all();
	}
	public function Supplier()
	{
		return $this->belongsTo(Supplier::class, "supplier_id", "id");
	}
	public function getWarehousesAttribute()
	{
		return Warehouse::all();
	}
	public function Warehouse()
	{
		return $this->belongsTo(Warehouse::class, "warehouse_id", "id");
	}

    public function getWarehousesOfProductAttribute() {
        $warehouses = Product::where('code', $this->code)
                        ->where('supplier_id', $this->supplier_id )
                        ->where('stock', '>', 0)
                        ->get()
                        ->pluck('warehouse_id')
                        ->unique();

        $wh = Warehouse::whereIn('id', $warehouses )->get();
        return $wh->pluck('name')->join(', ');
    }

    public function getProductByWarehouseAttribute() {
        $stocks = Product::where('code', $this->code)
                    ->where('supplier_id', $this->supplier_id )
                    ->where('stock', '>', 0)
                    ->get();
        return $stocks;
    }
}
