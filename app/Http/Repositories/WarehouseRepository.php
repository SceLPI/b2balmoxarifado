<?php

namespace App\Http\Repositories;
use App\Models\Warehouse;

class WarehouseRepository extends Repository
{

		public function __construct() {
			$this->model = new Warehouse;
		}

		public function saveFromRequest() : Warehouse {
			if ( $type_id = request()->get('type_id') ) {
				$this->model->type_id = $type_id;
			}
			if ( request()->get('name') !== null ) {
				$this->model->name = request()->get('name');
			} else if ( !isset($this->model->name) ) {
				abort(400, "name cannot be null.");
			}
			if ( $address = request()->get('address') ) {
				$this->model->address = $address;
			}
			if ( $number = request()->get('number') ) {
				$this->model->number = $number;
			}
			if ( $neighborhood = request()->get('neighborhood') ) {
				$this->model->neighborhood = $neighborhood;
			}
			if ( $completion = request()->get('completion') ) {
				$this->model->completion = $completion;
			}
			if ( $city = request()->get('city') ) {
				$this->model->city = $city;
			}
			if ( $state = request()->get('state') ) {
				$this->model->state = $state;
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
