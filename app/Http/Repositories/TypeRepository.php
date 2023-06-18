<?php

namespace App\Http\Repositories;
use App\Models\Type;

class TypeRepository extends Repository
{

    function __construct() {
        $this->model = new Type();
    }

    public function saveFromRequest() : Type {
        $this->model->name = request()->get('name');
        $this->model->save();
        return $this->model;
    }

}
