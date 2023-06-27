<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FromToProduct extends Model
{
	use HasFactory;

	protected $table = "from_to_products";

	protected $casts = [
		"created_at" => "datetime",
		"updated_at" => "datetime",
	];
	public function getMainProductsAttribute()
	{
		return Product::all(); 
	}
	public function MainProduct()
	{
		return $this->belongsTo(Product::class, "main_product_id", "id"); 
	}
	public function getSecondaryProductsAttribute()
	{
		return Product::all(); 
	}
	public function SecondaryProduct()
	{
		return $this->belongsTo(Product::class, "secondary_product_id", "id"); 
	}
}
