<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	use HasFactory;

	protected $table = "orders";

	protected $casts = [
		"created_at" => "datetime",
		"updated_at" => "datetime",
	];
	public function getEntitiesAttribute()
	{
		return Entity::all(); 
	}
	public function entity()
	{
		return $this->belongsTo(Entity::class, "entity_id", "id"); 
	}
}
