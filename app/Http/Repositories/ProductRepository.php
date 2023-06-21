<?php

namespace App\Http\Repositories;
use App\Models\Product;

class ProductRepository extends Repository
{

		public function __construct() {
			$this->model = new Product;
		}

		public function saveFromRequest() : Product {
			if ( request()->get('manufacturer_id') !== null ) {
				$this->model->manufacturer_id = request()->get('manufacturer_id');
			} else if ( !isset($this->model->manufacturer_id) ) {
				abort(400, "manufacturer_id cannot be null.");
			}
			if ( request()->get('category_id') !== null ) {
				$this->model->category_id = request()->get('category_id');
			} else if ( !isset($this->model->category_id) ) {
				abort(400, "category_id cannot be null.");
			}
			if ( request()->get('title') !== null ) {
				$this->model->title = request()->get('title');
			} else if ( !isset($this->model->title) ) {
				abort(400, "title cannot be null.");
			}
			if ( $description = request()->get('description') ) {
				$this->model->description = $description;
			}
			if ( request()->get('code') !== null ) {
				$this->model->code = request()->get('code');
			} else if ( !isset($this->model->code) ) {
				abort(400, "code cannot be null.");
			}
			if ( $created_at = request()->get('created_at') ) {
				$this->model->created_at = $created_at;
			}
			if ( $updated_at = request()->get('updated_at') ) {
				$this->model->updated_at = $updated_at;
			}
			if ( $deleted_at = request()->get('deleted_at') ) {
				$this->model->deleted_at = $deleted_at;
			}
			$this->model->save();
			return $this->model;
		}

}
