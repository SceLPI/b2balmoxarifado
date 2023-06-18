<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    const CITYHALL = 1;
    const SECRETARY = 2;
    const BUILD = 3;
    const WAREHOUSE = 4;

}
