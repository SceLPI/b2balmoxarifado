<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Repositories\EntityRepository;
use App\Models\Entity;
use Illuminate\Http\Request;

class EntityController extends Controller
{

    public function __construct() {
        $this->repository = new EntityRepository();
    }

}
