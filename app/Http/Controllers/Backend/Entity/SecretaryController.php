<?php

namespace App\Http\Controllers\Backend\Entity;

use App\Http\Controllers\Backend\EntityController;
use App\Http\Repositories\Entity\SecretaryRepository;
use Illuminate\Http\Request;

class SecretaryController extends EntityController
{

    public function __construct() {
        $this->repository = new SecretaryRepository();
    }

}
