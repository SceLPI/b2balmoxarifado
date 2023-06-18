<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Repositories\OrderRepository;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function __construct() {
        $this->repository = new OrderRepository;
    }
}
