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
        $response = $this->repository->fetchAll();
        return response()->json( $response );
    }

    public function store() {
        $response = $this->repository->saveFromRequest();
        return response()->json( $response, 201 );
    }

    public function update($id) {
        $response = $this->repository->updateFromRequest($id);
        return response()->json( $response );
    }

    public function destroy($id) {
        $this->repository->delete($id);
        return response()->json("", 204);
    }

}
