<?php

namespace App\Http\Repositories;
use App\Models\Product;

class ProductRepository extends Repository
{

    function __construct() {
        $this->model = new Product;
    }

    public function saveFromRequest() : Product {
        $this->model->title = request()->get('title');
        $this->model->description = request()->get('description');
        $this->model->code = request()->get('code');
        $this->model->manufacturer_id = request()->get('manufacturer');
        $this->model->category_id = request()->get('category');
        $this->model->save();
        return $this->model;
    }

}
