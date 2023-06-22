<?php

namespace App\Http\Controllers\Api\Entity;

use App\Http\Controllers\Api\EntityController;
use App\Http\Repositories\Entity\WarehouseRepository;

class WarehouseController extends EntityController
{

    public function __construct() {
        $this->repository = new WarehouseRepository();
    }

}
