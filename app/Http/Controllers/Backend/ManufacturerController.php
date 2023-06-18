<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Repositories\ManufacturerRepository;
use Illuminate\Http\Request;

class ManufacturerController extends Controller
{

    public function __construct() {
        $this->repository = new ManufacturerRepository();
    }

}
