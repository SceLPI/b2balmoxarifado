<?php

namespace App\Http\Repositories;
use App\Models\Product;

class ProductRepository extends Repository
{

		public function __construct() {
			$this->model = new Product;
		}

		public function saveFromRequest() : Product {
			if ( $manufacturer_id = request()->get('manufacturer_id') ) {
				$this->model->manufacturer_id = $manufacturer_id;
			}
			if ( request()->get('supplier_id') !== null ) {
				$this->model->supplier_id = request()->get('supplier_id');
			} else if ( !isset($this->model->supplier_id) ) {
				abort(400, "supplier_id cannot be null.");
			}
			if ( request()->get('category_id') !== null ) {
				$this->model->category_id = request()->get('category_id');
			} else if ( !isset($this->model->category_id) ) {
				abort(400, "category_id cannot be null.");
			}
			if ( $warehouse_id = request()->get('warehouse_id') ) {
				$this->model->warehouse_id = $warehouse_id;
			}
			if ( request()->get('title') !== null ) {
				$this->model->title = request()->get('title');
			} else if ( !isset($this->model->title) ) {
				abort(400, "title cannot be null.");
			}
			if ( request()->get('code') !== null ) {
				$this->model->code = request()->get('code');
			} else if ( !isset($this->model->code) ) {
				abort(400, "code cannot be null.");
			}
			if ( request()->get('stock') !== null ) {
				$this->model->stock = request()->get('stock');
			} else if ( !isset($this->model->stock) ) {
				abort(400, "stock cannot be null.");
			}
			if ( $ultimo_valor_compra = request()->get('ultimo_valor_compra') ) {
				$this->model->ultimo_valor_compra = $ultimo_valor_compra;
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
