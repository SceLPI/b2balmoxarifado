<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller as BaseController;


class Controller extends BaseController
{

    public function index() {
        return response()->json( parent::index() );
    }

    public function store() {
        return response()->json( parent::store(), 201 );
    }

    public function update($id) {
        return response()->json( parent::update($id) );
    }

    public function destroy($id) {
        parent::destroy($id);
        return response()->json("", 204);
    }

}
