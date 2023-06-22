<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Controller;
use App\Http\Repositories\EntityRepository;

class EntityController extends Controller
{

		public function __construct() {
			$this->repository = new EntityRepository();
		}

}