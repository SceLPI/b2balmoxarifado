<?php

namespace App\Http\Repositories;
use App\Models\Manufacturer;

class ManufacturerRepository extends Repository
{

		public function __construct() {
			$this->model = new Manufacturer;
		}

		public function saveFromRequest() : Manufacturer {
			if ( request()->get('name') !== null ) {
				$this->model->name = request()->get('name');
			} else if ( !isset($this->model->name) ) {
				abort(400, "name cannot be null.");
			}
			if ( $cnpj = request()->get('cnpj') ) {
				$this->model->cnpj = $cnpj;
			}
			if ( $created_at = request()->get('created_at') ) {
				$this->model->created_at = $created_at;
			}
			if ( $updated_at = request()->get('updated_at') ) {
				$this->model->updated_at = $updated_at;
			}
			$this->model->save();
			return $this->model;
		}

}
