<?php

namespace App\Http\Repositories\Entity;
use App\Http\Repositories\EntityRepository;
use App\Models\Entities\CityHall;

class CityHallRepository extends EntityRepository
{

    function __construct() {
        $this->model = new CityHall;
    }

}
