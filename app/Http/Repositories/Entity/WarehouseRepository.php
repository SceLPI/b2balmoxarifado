<?php

namespace App\Http\Repositories\Entity;
use App\Http\Repositories\EntityRepository;
use App\Models\Entities\Warehouse;

class WarehouseRepository extends EntityRepository
{

    function __construct() {
        $this->model = new Warehouse;
    }

}
