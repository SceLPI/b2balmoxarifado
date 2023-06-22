@extends('layout.template')
@section('content')

		<form method='post' action='@if ( $model->id ) {{ route('manufacturers.update', [$model->id]) }}  @else {{ route('manufacturers.store') }} @endif'>
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
						<label for='cnpj' class='form-label'>cnpj</label>
						<input class='form-control' id='cnpj' name='cnpj' value='{{ $model->cnpj }}'>
					</div>
				</div>
				<div class='col-12'>
					<button class='btn btn-success'>Salvar</button>
				</div>
			</div>
		</form>

@endsection