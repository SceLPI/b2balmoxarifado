<?php

namespace App\Http\Repositories\Entity;
use App\Http\Repositories\EntityRepository;
use App\Models\Entities\Build;
use App\Models\Type;

class BuildRepository extends EntityRepository
{

    function __construct() {
        $this->model = new Build;
    }
}
