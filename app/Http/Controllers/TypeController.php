<?php

namespace App\Http\Controllers;

use App\Http\Repositories\TypeRepository;

class TypeController extends Controller
{

	public function __construct() {
		$this->repository = new TypeRepository();
	}

	public function index() {
		$types = parent::index(); 

		return view('types.index')->with('model', $types );
	}

	public function create() {
		return $this->show();
	}

	public function show($id = null) {
		$type = parent::show($id);

		return view('types.form')->with('model', $type );
	}

	public function store() {
		$type = parent::store();

		return redirect( route('types.index') )->with('success', 'Criado com Sucesso.');
	}

	public function update($id = null) {
		$type = parent::update($id);

		return redirect( route('types.index') )->with('success', 'Atualizado com sucesso!');
	}

}