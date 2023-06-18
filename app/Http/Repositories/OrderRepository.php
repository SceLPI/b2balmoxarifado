<?php

namespace App\Http\Repositories;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class OrderRepository extends Repository
{

    function __construct() {
        $this->model = new Order();
    }

    public function saveFromRequest() : Order {

        DB::beginTransaction();

        $this->model->entity_id = request()->get('entity');
        $this->model->ordered_by = request()->get('ordered_by');
        $this->model->save();

        request()->request->add(["order" => $this->model->id ]);

        $products = request()->get('products');
        $this->model->products = [];
        foreach( $products as $product ) {
            $orderProductRepository = new OrderProductRepository;
            $this->model->products[] = $orderProductRepository->saveOrderProduct($this->model, $product);
        }

        return $this->model;
    }

}
