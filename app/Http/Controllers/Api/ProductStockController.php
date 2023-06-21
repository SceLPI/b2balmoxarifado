<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Repositories\ProductStockRepository;

class ProductStockController extends Controller
{

		public function __construct() {
			$this->repository = new ProductStockRepository();
		}

}