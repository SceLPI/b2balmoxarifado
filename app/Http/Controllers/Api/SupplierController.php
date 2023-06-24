<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Controller;
use App\Http\Repositories\SupplierRepository;

class SupplierController extends Controller
{

		public function __construct() {
			$this->repository = new SupplierRepository();
		}

}