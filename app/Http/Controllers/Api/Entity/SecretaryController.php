<?php

namespace App\Http\Controllers\Entity;

use App\Http\Controllers\Api\EntityController;
use App\Http\Repositories\Entity\SecretaryRepository;
use Illuminate\Http\Request;

class SecretaryController extends EntityController
{

    public function __construct() {
        $this->repository = new SecretaryRepository();
    }

}
