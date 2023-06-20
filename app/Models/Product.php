<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	use HasFactory;

	protected $table = "products";

	public function categories()
	{
		return $this->belongsTo(Category::class, "id", "category_id"); 
	}
	public function manufacturers()
	{
		return $this->belongsTo(Manufacturer::class, "id", "manufacturer_id"); 
	}
}
