<?php

namespace App\Http\Controllers\Backend\Entity;

use App\Http\Controllers\Backend\EntityController;
use App\Http\Repositories\Entity\CityHallRepository;
use Illuminate\Http\Request;

class CityHallController extends EntityController
{

    public function __construct() {
        $this->repository = new CityHallRepository();
    }

}
