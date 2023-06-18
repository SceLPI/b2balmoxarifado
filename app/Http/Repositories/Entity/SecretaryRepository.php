<?php

namespace App\Http\Repositories\Entity;
use App\Http\Repositories\EntityRepository;
use App\Models\Entities\Secretary;

class SecretaryRepository extends EntityRepository
{

    function __construct() {
        $this->model = new Secretary;
    }

}
