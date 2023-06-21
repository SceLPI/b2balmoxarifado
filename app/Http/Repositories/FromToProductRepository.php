<?php

namespace App\Http\Repositories;
use App\Models\FromToProduct;

class FromToProductRepository extends Repository
{

		public function __construct() {
			$this->model = new FromToProduct;
		}

		public function saveFromRequest() : FromToProduct {
			if ( request()->get('main_product_id') !== null ) {
				$this->model->main_product_id = request()->get('main_product_id');
			} else if ( !isset($this->model->main_product_id) ) {
				abort(400, "main_product_id cannot be null.");
			}
			if ( request()->get('secondary_product_id') !== null ) {
				$this->model->secondary_product_id = request()->get('secondary_product_id');
			} else if ( !isset($this->model->secondary_product_id) ) {
				abort(400, "secondary_product_id cannot be null.");
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
