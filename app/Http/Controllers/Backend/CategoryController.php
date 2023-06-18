<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Repositories\CategoryRepository;

class CategoryController extends Controller
{

    public function __construct() {
        $this->repository = new CategoryRepository();
    }

}
