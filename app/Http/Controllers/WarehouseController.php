<?php

namespace App\Http\Controllers;

use App\Http\Repositories\WarehouseRepository;

class WarehouseController extends Controller
{

	public function __construct() {
		$this->repository = new WarehouseRepository();
	}

	public function index() {
		$warehouses = parent::index(); 

		return view('warehouses.index')->with('model', $warehouses );
	}

	public function create() {
		return $this->show();
	}

	public function show($id = null) {
		$warehouse = parent::show($id);

		return view('warehouses.form')->with('model', $warehouse );
	}

	public function store() {
		$warehouse = parent::store();

		return redirect( route('warehouses.index') )->with('success', 'Criado com Sucesso.');
	}

	public function update($id = null) {
		$warehouse = parent::update($id);

		return redirect( route('warehouses.index') )->with('success', 'Atualizado com sucesso!');
	}

}