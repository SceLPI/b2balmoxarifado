<?php

namespace App\Http\Controllers;

use App\Http\Repositories\EntityRepository;

class EntityController extends Controller
{

	public function __construct() {
		$this->repository = new EntityRepository();
	}

	public function index() {
		$entities = parent::index(); 

		return view('entities.index')->with('model', $entities );
	}

	public function create() {
		return $this->show();
	}

	public function show($id = null) {
		$entity = parent::show($id);

		return view('entities.form')->with('model', $entity );
	}

	public function store() {
		$entity = parent::store();

		return redirect( route('entities.index') )->with('success', 'Criado com Sucesso.');
	}

	public function update($id = null) {
		$entity = parent::update($id);

		return redirect( route('entities.index') )->with('success', 'Atualizado com sucesso!');
	}

}