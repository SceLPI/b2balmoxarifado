<?php

namespace App\Http\Repositories;
use App\Models\OrderProduct;

class OrderProductRepository extends Repository
{

		public function __construct() {
			$this->model = new OrderProduct;
		}

		public function saveFromRequest() : OrderProduct {
			if ( request()->get('product_id') !== null ) {
				$this->model->product_id = request()->get('product_id');
			} else if ( !isset($this->model->product_id) ) {
				abort(400, "product_id cannot be null.");
			}
			if ( request()->get('order_id') !== null ) {
				$this->model->order_id = request()->get('order_id');
			} else if ( !isset($this->model->order_id) ) {
				abort(400, "order_id cannot be null.");
			}
			if ( request()->get('amount') !== null ) {
				$this->model->amount = request()->get('amount');
			} else if ( !isset($this->model->amount) ) {
				abort(400, "amount cannot be null.");
			}
			if ( request()->get('canceled') !== null ) {
				$this->model->canceled = request()->get('canceled');
			} else if ( !isset($this->model->canceled) ) {
				abort(400, "canceled cannot be null.");
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
