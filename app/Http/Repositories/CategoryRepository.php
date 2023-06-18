<?php

namespace App\Http\Repositories;
use App\Models\Category;

class CategoryRepository extends Repository
{

    function __construct() {
        $this->model = new Category;
    }

    public function saveFromRequest() : Category {
        $this->model->name = request()->get('name');
        $this->model->save();
        return $this->model;
    }

}
