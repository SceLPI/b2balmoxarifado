<?php

namespace App\Http\Controllers\Backend\Entity;

use App\Http\Controllers\Backend\EntityController;
use App\Http\Repositories\Entity\WarehouseRepository;

class WarehouseController extends EntityController
{

    public function __construct() {
        $this->repository = new WarehouseRepository();
    }

}
