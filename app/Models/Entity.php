<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entity extends Model
{
	use HasFactory;

	protected $table = "entities";

	protected $casts = [
		"created_at" => "datetime",
		"updated_at" => "datetime",
	];
	public function getTypesAttribute()
	{
		return Type::all(); 
	}
	public function type()
	{
		return $this->belongsTo(Type::class, "type_id", "id"); 
	}
}
