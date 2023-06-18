<?php

namespace App\Http\Repositories;
use App\Models\Entity;

class EntityRepository extends Repository
{

    function __construct() {
        $this->model = new Entity;
    }

    public function saveFromRequest() : Entity {
        if ( $type = request()->get('type') ) {
            $this->model->type_id = $type;
        }
        $this->model->name = request()->get('name');
        $this->model->save();
        return $this->model;
    }

}
