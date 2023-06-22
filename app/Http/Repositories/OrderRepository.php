<?php

namespace App\Http\Repositories;
use App\Models\Order;

class OrderRepository extends Repository
{

		public function __construct() {
			$this->model = new Order;
		}

		public function saveFromRequest() : Order {
			if ( request()->get('entity_id') !== null ) {
				$this->model->entity_id = request()->get('entity_id');
			} else if ( !isset($this->model->entity_id) ) {
				abort(400, "entity_id cannot be null.");
			}
			if ( request()->get('ordered_by') !== null ) {
				$this->model->ordered_by = request()->get('ordered_by');
			} else if ( !isset($this->model->ordered_by) ) {
				abort(400, "ordered_by cannot be null.");
			}
			$this->model->finished = request()->get('finished') ?? 0;
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
