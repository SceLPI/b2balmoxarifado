<?php

namespace App\Http\Repositories;
use App\Models\Category;

class CategoryRepository extends Repository
{

		public function __construct() {
			$this->model = new Category;
		}

		public function saveFromRequest() : Category {
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
