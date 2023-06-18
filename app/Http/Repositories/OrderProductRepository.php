<?php

namespace App\Http\Repositories;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use Illuminate\Support\Collection;

class OrderProductRepository extends Repository
{

    function __construct() {
        $this->model = new OrderProduct;
    }

    public function saveFromRequest() : OrderProduct {
        return new OrderProduct;
    }

    public function saveOrderProduct(Order $order, array $product) {
        $this->model->order_id = $order->id;
        $this->model->product_id = $product["product"];
        $this->model->amount = $product["amount"];
        $this->model->canceled = $product["canceled"];
        $this->model->save();

        return $this->model;
    }

}
