<?php

namespace App\Traits\Product;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;

trait ProductRepositoryTrait {
    public function saveProductFromXML($product) : Model {

        $productModel = Product::where('code', $product["code"])->first();

        if ( $productModel ) {
            $stock = $productModel->stock;
            $stock += $product["amount"];
            $this->model = $productModel;
            $this->model->stock = $stock;
        } else {
            $this->model->stock = $product["amount"];
        }

        $this->model->title = $product["description"];
        $this->model->code = $product["code"];
        $this->model->category_id = $product["category_id"];
        $this->model->warehouse_id = $product["warehouse_id"];
        $this->model->supplier_id = $product["supplier_id"];

        $this->model->save();

        return $this->model;
    }
}
