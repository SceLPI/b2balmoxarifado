<?php

namespace App\Http\Controllers\Backend\Entity;

use App\Http\Controllers\Backend\EntityController;
use App\Http\Repositories\Entity\BuildRepository;
use Illuminate\Http\Request;

class BuildController extends EntityController
{

    public function __construct() {
        $this->repository = new BuildRepository();
    }

}
