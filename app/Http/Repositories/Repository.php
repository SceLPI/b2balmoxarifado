<?php

namespace App\Http\Repositories;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

abstract class Repository
{
    protected Model $model;

    function __construct(Model $model = null) {
        $this->model = $model;
    }
    public function fetchAll() : Collection {
        return $this->model->get();
    }
    public function find($id) : Model {
        return $this->model->find($id);
    }

    public function create() : Model {
        return $this->model;
    }

    abstract function saveFromRequest() : Model;

    function updateFromRequest($id) : Model {
        $this->model = $this->model->findOrFail( $id );
        return $this->saveFromRequest();
    }

    function delete($id) {
        $this->model = $this->model->findOrFail( $id );
        $this->model->delete();
    }

}
