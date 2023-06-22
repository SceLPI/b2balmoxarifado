<?php

namespace App\Http\Repositories;
use App\Models\User;

class UserRepository extends Repository
{

		public function __construct() {
			$this->model = new User;
		}

		public function saveFromRequest() : User {
			if ( request()->get('name') !== null ) {
				$this->model->name = request()->get('name');
			} else if ( !isset($this->model->name) ) {
				abort(400, "name cannot be null.");
			}
			if ( request()->get('email') !== null ) {
				$this->model->email = request()->get('email');
			} else if ( !isset($this->model->email) ) {
				abort(400, "email cannot be null.");
			}
			if ( $email_verified_at = request()->get('email_verified_at') ) {
				$this->model->email_verified_at = $email_verified_at;
			}
			if ( request()->get('password') !== null ) {
				$this->model->password = request()->get('password');
			} else if ( !isset($this->model->password) ) {
				abort(400, "password cannot be null.");
			}
			if ( $remember_token = request()->get('remember_token') ) {
				$this->model->remember_token = $remember_token;
			}
			if ( $created_at = request()->get('created_at') ) {
				$this->model->created_at = $created_at;
			}
			if ( $updated_at = request()->get('updated_at') ) {
				$this->model->updated_at = $updated_at;
			}
			$this->model->save();
			return $this->model;
		}

}
