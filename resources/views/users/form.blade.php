@extends('layout.template')
@section('content')

		<form method='post' action='@if ( $model->id ) {{ route('users.update', [$model->id]) }}  @else {{ route('users.store') }} @endif'>
			@csrf

			@if($model->id)
			@method('PUT')
			@endif

			<div class='row'>
				<div class='col-12'>
					<div class='mb-3'>
						<label for='name' class='form-label'>name</label>
						<input class='form-control' id='name' name='name' value='{{ $model->name }}'>
					</div>
				</div>
				<div class='col-12'>
					<div class='mb-3'>
						<label for='email' class='form-label'>email</label>
						<input class='form-control' id='email' name='email' value='{{ $model->email }}'>
					</div>
				</div>
				<div class='col-12'>
					<div class='mb-3'>
						<label for='email_verified_at' class='form-label'>email_verified_at</label>
						<input type="date" class='form-control' id='email_verified_at' name='email_verified_at' value='{{ $model->email_verified_at }}'>
					</div>
				</div>
				<div class='col-12'>
					<div class='mb-3'>
						<label for='password' class='form-label'>password</label>
						<input class='form-control' id='password' name='password' value='{{ $model->password }}'>
					</div>
				</div>
				<div class='col-12'>
					<div class='mb-3'>
						<label for='remember_token' class='form-label'>remember_token</label>
						<input class='form-control' id='remember_token' name='remember_token' value='{{ $model->remember_token }}'>
					</div>
				</div>
				<div class='col-12'>
					<button class='btn btn-success'>Salvar</button>
				</div>
			</div>
		</form>

@endsection