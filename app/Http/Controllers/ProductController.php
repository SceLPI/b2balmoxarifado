<?php

namespace App\Http\Controllers;

use App\Http\Repositories\ProductRepository;

class ProductController extends Controller
{

	use \App\Traits\Product\ProductTrait;

	public function __construct() {
		$this->repository = new ProductRepository();
	}

	public function index() {
		$products = parent::index(); 

		return view('products.index')->with('model', $products );
	}

	public function create() {
		return $this->show();
	}

	public function show($id = null) {
		$product = parent::show($id);

		return view('products.form')->with('model', $product );
	}

	public function store() {
		$product = parent::store();

		return redirect( route('products.index') )->with('success', 'Criado com Sucesso.');
	}

	public function update($id = null) {
		$product = parent::update($id);

		return redirect( route('products.index') )->with('success', 'Atualizado com sucesso!');
	}

}