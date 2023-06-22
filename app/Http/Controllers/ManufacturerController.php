<?php

namespace App\Http\Controllers;

use App\Http\Repositories\ManufacturerRepository;

class ManufacturerController extends Controller
{

	public function __construct() {
		$this->repository = new ManufacturerRepository();
	}

	public function index() {
		$manufacturers = parent::index(); 

		return view('manufacturers.index')->with('model', $manufacturers );
	}

	public function create() {
		return $this->show();
	}

	public function show($id = null) {
		$manufacturer = parent::show($id);

		return view('manufacturers.form')->with('model', $manufacturer );
	}

	public function store() {
		$manufacturer = parent::store();

		return redirect( route('manufacturers.index') )->with('success', 'Criado com Sucesso.');
	}

	public function update($id = null) {
		$manufacturer = parent::update($id);

		return redirect( route('manufacturers.index') )->with('success', 'Atualizado com sucesso!');
	}

}