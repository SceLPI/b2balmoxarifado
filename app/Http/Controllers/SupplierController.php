<?php

namespace App\Http\Controllers;

use App\Http\Repositories\SupplierRepository;

class SupplierController extends Controller
{

	public function __construct() {
		$this->repository = new SupplierRepository();
	}

	public function index() {
		$suppliers = parent::index(); 

		return view('suppliers.index')->with('model', $suppliers );
	}

	public function create() {
		return $this->show();
	}

	public function show($id = null) {
		$supplier = parent::show($id);

		return view('suppliers.form')->with('model', $supplier );
	}

	public function store() {
		$supplier = parent::store();

		return redirect( route('suppliers.index') )->with('success', 'Criado com Sucesso.');
	}

	public function update($id = null) {
		$supplier = parent::update($id);

		return redirect( route('suppliers.index') )->with('success', 'Atualizado com sucesso!');
	}

}