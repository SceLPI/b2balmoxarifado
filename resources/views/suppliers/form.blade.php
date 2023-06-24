@extends('layout.template')
@section('content')

		<form method='post' action='@if ( $model->id ) {{ route('suppliers.update', [$model->id]) }}  @else {{ route('suppliers.store') }} @endif'>
			@csrf

			@if($model->id)
			@method('PUT')
			@endif

			<div class='row'>
				<div class='col-12'>
					<div class='mb-3'>
						<label for='fantasy_name' class='form-label'>{{ __('suppliers.form.fantasy_name') }}</label>
						<input class='form-control' id='fantasy_name' name='fantasy_name' value='{{ $model->fantasy_name }}'>
					</div>
				</div>
				<div class='col-12'>
					<div class='mb-3'>
						<label for='social_reason' class='form-label'>{{ __('suppliers.form.social_reason') }}</label>
						<input class='form-control' id='social_reason' name='social_reason' value='{{ $model->social_reason }}'>
					</div>
				</div>
				<div class='col-12'>
					<div class='mb-3'>
						<label for='cnpj' class='form-label'>{{ __('suppliers.form.cnpj') }}</label>
						<input class='form-control' id='cnpj' name='cnpj' value='{{ $model->cnpj }}'>
					</div>
				</div>
				<div class='col-12'>
					<div class='mb-3'>
						<label for='phone' class='form-label'>{{ __('suppliers.form.phone') }}</label>
						<input class='form-control' id='phone' name='phone' value='{{ $model->phone }}'>
					</div>
				</div>
				<div class='col-12'>
					<button class='btn btn-success'>Salvar</button>
				</div>
			</div>
		</form>

@endsection