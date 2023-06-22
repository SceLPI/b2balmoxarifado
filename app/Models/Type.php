<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
	use HasFactory;

	protected $table = "types";

    const CITYHALL = 1;
    const SECRETARY = 2;
    const BUILD = 3;

}
