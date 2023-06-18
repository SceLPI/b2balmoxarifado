<?php

namespace App\Http\Repositories;
use App\Models\Manufacturer;

class ManufacturerRepository extends Repository
{

    function __construct() {
        $this->model = new Manufacturer;
    }

    public function saveFromRequest() : Manufacturer {
        if ( $name = request()->get('name') ) {
            $this->model->name = $name;
        }
        if ( $cnpj = request()->get('cnpj') ) {
            $this->model->cnpj = $cnpj;
        }
        $this->model->save();
        return $this->model;
    }

}
