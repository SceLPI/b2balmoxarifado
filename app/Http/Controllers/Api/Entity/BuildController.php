<?php

namespace App\Http\Controllers\Entity;

use App\Http\Controllers\Api\EntityController;
use App\Http\Repositories\Entity\BuildRepository;
use Illuminate\Http\Request;

class BuildController extends EntityController
{

    public function __construct() {
        $this->repository = new BuildRepository();
    }

}
