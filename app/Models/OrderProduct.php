<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
	use HasFactory;

	protected $table = "order_products";

	public function orders()
	{
		return $this->belongsTo(Order::class, "id", "order_id"); 
	}
	public function products()
	{
		return $this->belongsTo(Product::class, "id", "product_id"); 
	}
}
