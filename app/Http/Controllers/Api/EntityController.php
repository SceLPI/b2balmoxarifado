<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Repositories\EntityRepository;

class EntityController extends Controller
{

		public function __construct() {
			$this->repository = new EntityRepository();
		}

}