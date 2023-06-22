<?php

namespace App\Http\Controllers;

use App\Http\Repositories\Repository;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    protected Repository $repository;


    public function index() {
        return $this->repository->fetchAll();
    }

    public function show($id = null) {
        if ( !$id ) {
            return $this->repository->create();
        }
        return $this->repository->find($id);
    }

    public function store() {
        return $this->repository->saveFromRequest();
    }

    public function update($id) {
        return $this->repository->updateFromRequest($id);
    }

    public function destroy($id) {
        $this->repository->delete($id);
    }

}
