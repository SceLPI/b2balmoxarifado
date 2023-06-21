<?php

namespace App\Http\Repositories;
use App\Models\ProductStock;

class ProductStockRepository extends Repository
{

		public function __construct() {
			$this->model = new ProductStock;
		}

		public function saveFromRequest() : ProductStock {
			if ( request()->get('product_id') !== null ) {
				$this->model->product_id = request()->get('product_id');
			} else if ( !isset($this->model->product_id) ) {
				abort(400, "product_id cannot be null.");
			}
			if ( request()->get('stock') !== null ) {
				$this->model->stock = request()->get('stock');
			} else if ( !isset($this->model->stock) ) {
				abort(400, "stock cannot be null.");
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
