<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Controller;
use App\Http\Repositories\WarehouseRepository;

class WarehouseController extends Controller
{

		public function __construct() {
			$this->repository = new WarehouseRepository();
		}

}