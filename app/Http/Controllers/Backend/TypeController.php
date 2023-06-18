<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Repositories\TypeRepository;
use Illuminate\Http\Request;

class TypeController extends Controller
{

    public function __construct() {
        $this->repository = new TypeRepository;
    }
}
