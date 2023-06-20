<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	use HasFactory;

	protected $table = "orders";

	public function entities()
	{
		return $this->belongsTo(Entity::class, "id", "entity_id"); 
	}
}
