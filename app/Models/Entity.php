<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entity extends Model
{
	use HasFactory;

	protected $table = "entities";

	public function types()
	{
		return $this->belongsTo(Type::class, "id", "type_id"); 
	}
}
