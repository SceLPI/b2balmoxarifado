<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Repositories\ProductRepository;

class ProductController extends Controller
{

		public function __construct() {
			$this->repository = new ProductRepository();
		}

}