<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Repositories\OrderProductRepository;

class OrderProductController extends Controller
{

		public function __construct() {
			$this->repository = new OrderProductRepository();
		}

}