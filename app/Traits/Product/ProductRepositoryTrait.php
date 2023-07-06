<?php

namespace App\Traits\Product;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;

trait ProductRepositoryTrait {
    public function saveProductFromXML($product) : Model {

        $productModel = Product::where('code', $product["code"])
                                    ->where('warehouse_id', $product["warehouse_id"])
                                    ->where('supplier_id', $product["supplier_id"])
                                    ->first();

        if ( $product["from_to"] ) {
            $productModel = Product::findOrFail( $product["from_to"] );
            $productByCode = Product::where('warehouse_id', $product["warehouse_id"])
                                        ->where('code', $productModel->code )
                                        ->firstOrNew();
            $productByCode->title = $productModel->title;
            $productByCode->code = $productModel->code;
            $productByCode->category_id = $productModel->category_id;
            $productByCode->warehouse_id = $product["warehouse_id"];
            $productByCode->supplier_id = $productModel->supplier_id;
            $productByCode->stock = 0;
            $productModel = $productByCode;
        }

        if ( $productModel ) {
            $stock = $productModel->stock;
            $stock += $product["amount"];
            $this->model = $productModel;
            $this->model->stock = $stock;
        } else {
            $this->model = new Product;
            $this->model->stock = $product["amount"];
            $this->model->title = $product["description"];
            $this->model->code = $product["code"];
            $this->model->category_id = $product["category_id"];
            $this->model->warehouse_id = $product["warehouse_id"];
            $this->model->supplier_id = $product["supplier_id"];
        }


        $this->model->save();

        return $this->model;
    }

    public function findProductByCodeAndSupplier($supplier, $code) : ?Product {
        return $this->model->where('supplier_id', $supplier)->where('code', $code)->first();
    }
}
