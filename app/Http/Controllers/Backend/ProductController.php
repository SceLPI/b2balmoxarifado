<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Repositories\ProductRepository;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function __construct() {
        $this->repository = new ProductRepository();
    }
}
