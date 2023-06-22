<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Controller;
use App\Http\Repositories\ManufacturerRepository;

class ManufacturerController extends Controller
{

		public function __construct() {
			$this->repository = new ManufacturerRepository();
		}

}