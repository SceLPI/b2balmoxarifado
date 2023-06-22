<?php

namespace App\Http\Controllers;

use App\Http\Repositories\CategoryRepository;

class CategoryController extends Controller
{

	public function __construct() {
		$this->repository = new CategoryRepository();
	}

	public function index() {
		$categories = parent::index(); 

		return view('categories.index')->with('model', $categories );
	}

	public function create() {
		return $this->show();
	}

	public function show($id = null) {
		$category = parent::show($id);

		return view('categories.form')->with('model', $category );
	}

	public function store() {
		$category = parent::store();

		return redirect( route('categories.index') )->with('success', 'Criado com Sucesso.');
	}

	public function update($id = null) {
		$category = parent::update($id);

		return redirect( route('categories.index') )->with('success', 'Atualizado com sucesso!');
	}

}