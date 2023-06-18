<?php

namespace App\Models\Entities;

use App\Models\Entity;
use App\Models\Type;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warehouse extends Entity
{
    use HasFactory;
    protected $attributes = [
        'type_id' => Type::WAREHOUSE,
    ];

    public function newQuery()
    {
        return parent::newQuery()->where('type_id', Type::WAREHOUSE);
    }
}
