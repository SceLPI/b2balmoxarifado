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
	public function getCategoriesAttribute()
	{
		return Category::all(); 
	}
	public function category()
	{
		return $this->belongsTo(Category::class, "category_id", "id"); 
	}
	public function getManufacturersAttribute()
	{
		return Manufacturer::all(); 
	}
	public function manufacturer()
	{
		return $this->belongsTo(Manufacturer::class, "manufacturer_id", "id"); 
	}
	public function getSuppliersAttribute()
	{
		return Supplier::all(); 
	}
	public function supplier()
	{
		return $this->belongsTo(Supplier::class, "supplier_id", "id"); 
	}
	public function getWarehousesAttribute()
	{
		return Warehouse::all(); 
	}
	public function warehouse()
	{
		return $this->belongsTo(Warehouse::class, "warehouse_id", "id"); 
	}
}
