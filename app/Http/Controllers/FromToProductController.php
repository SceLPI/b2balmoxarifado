<?php

namespace App\Http\Controllers;

use App\Http\Repositories\FromToProductRepository;

class FromToProductController extends Controller
{

	public function __construct() {
		$this->repository = new FromToProductRepository();
	}

	public function index() {
		$from_to_products = parent::index(); 

		return view('from_to_products.index')->with('model', $from_to_products );
	}

	public function create() {
		return $this->show();
	}

	public function show($id = null) {
		$from_to_product = parent::show($id);

		return view('from_to_products.form')->with('model', $from_to_product );
	}

	public function store() {
		$from_to_product = parent::store();

		return redirect( route('from_to_products.index') )->with('success', 'Criado com Sucesso.');
	}

	public function update($id = null) {
		$from_to_product = parent::update($id);

		return redirect( route('from_to_products.index') )->with('success', 'Atualizado com sucesso!');
	}

}