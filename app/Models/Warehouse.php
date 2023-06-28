<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
	use HasFactory;

	protected $table = "warehouses";

	protected $casts = [
		"created_at" => "datetime",
		"updated_at" => "datetime",
	];
	public function getTypesAttribute()
	{
		return Type::all(); 
	}
	public function Type()
	{
		return $this->belongsTo(Type::class, "type_id", "id"); 
	}
}
