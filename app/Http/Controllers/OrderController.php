<?php

namespace App\Http\Controllers;

use App\Http\Repositories\OrderRepository;
use App\Models\Product;

class OrderController extends Controller
{

	public function __construct() {
		$this->repository = new OrderRepository();
	}

	public function index() {
		$orders = parent::index();

		return view('orders.index')->with('model', $orders );
	}

	public function create() {
		return $this->show();
	}

	public function show($id = null) {
		$order = parent::show($id);

		return view('orders.form')->with('model', $order );
	}

	public function store() {
		$order = parent::store();

		return redirect( route('orders.index') )->with('success', 'Criado com Sucesso.');
	}

	public function update($id = null) {
		$order = parent::update($id);

		return redirect( route('orders.index') )->with('success', 'Atualizado com sucesso!');
	}

    public function fragment() {
        $products = Product::where('stock', '>', 0)->get();
        return view('orders.form_product_fragment')->with('products', $products);
    }

}
