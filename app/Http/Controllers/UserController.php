<?php

namespace App\Http\Controllers;

use App\Http\Repositories\UserRepository;

class UserController extends Controller
{

	public function __construct() {
		$this->repository = new UserRepository();
	}

	public function index() {
		$users = parent::index(); 

		return view('users.index')->with('model', $users );
	}

	public function create() {
		return $this->show();
	}

	public function show($id = null) {
		$user = parent::show($id);

		return view('users.form')->with('model', $user );
	}

	public function store() {
		$user = parent::store();

		return redirect( route('users.index') )->with('success', 'Criado com Sucesso.');
	}

	public function update($id = null) {
		$user = parent::update($id);

		return redirect( route('users.index') )->with('success', 'Atualizado com sucesso!');
	}

}