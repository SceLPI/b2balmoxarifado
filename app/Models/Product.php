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
}
