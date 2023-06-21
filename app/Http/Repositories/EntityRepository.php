<?php

namespace App\Http\Repositories;
use App\Models\Entity;

class EntityRepository extends Repository
{

		public function __construct() {
			$this->model = new Entity;
		}

		public function saveFromRequest() : Entity {
			if ( request()->get('type_id') !== null ) {
				$this->model->type_id = request()->get('type_id');
			} else if ( !isset($this->model->type_id) ) {
				abort(400, "type_id cannot be null.");
			}
			if ( request()->get('name') !== null ) {
				$this->model->name = request()->get('name');
			} else if ( !isset($this->model->name) ) {
				abort(400, "name cannot be null.");
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
