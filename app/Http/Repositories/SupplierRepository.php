<?php

namespace App\Http\Repositories;
use App\Models\Supplier;

class SupplierRepository extends Repository
{

		public function __construct() {
			$this->model = new Supplier;
		}

		public function saveFromRequest() : Supplier {
			if ( request()->get('fantasy_name') !== null ) {
				$this->model->fantasy_name = request()->get('fantasy_name');
			} else if ( !isset($this->model->fantasy_name) ) {
				abort(400, "fantasy_name cannot be null.");
			}
			if ( request()->get('social_reason') !== null ) {
				$this->model->social_reason = request()->get('social_reason');
			} else if ( !isset($this->model->social_reason) ) {
				abort(400, "social_reason cannot be null.");
			}
			if ( request()->get('cnpj') !== null ) {
				$this->model->cnpj = request()->get('cnpj');
			} else if ( !isset($this->model->cnpj) ) {
				abort(400, "cnpj cannot be null.");
			}
			if ( request()->get('phone') !== null ) {
				$this->model->phone = request()->get('phone');
			} else if ( !isset($this->model->phone) ) {
				abort(400, "phone cannot be null.");
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
