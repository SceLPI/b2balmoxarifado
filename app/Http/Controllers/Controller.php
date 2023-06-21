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

    protected function _fetch() {
        return $this->repository->fetchAll();
    }

    protected function _save() {
        return $this->repository->saveFromRequest();
    }

    protected function _update($id) {
        return $this->repository->updateFromRequest($id);
    }

    protected function _delete($id) {
        $this->repository->delete($id);
    }

    public function index() {
        $response = $this->_fetch();
        return response()->json( $response );
    }

    public function store() {
        $response = $this->_save();
        return response()->json( $response, 201 );
    }

    public function update($id) {
        $response = $this->_update($id);
        return response()->json( $response );
    }

    public function destroy($id) {
        $this->_delete($id);
        return response()->json("", 204);
    }

}
