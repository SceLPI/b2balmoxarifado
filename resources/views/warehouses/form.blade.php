@extends('layout.template')
@section('content')

		<form method='post' action='@if ( $model->id ) {{ route('warehouses.update', [$model->id]) }}  @else {{ route('warehouses.store') }} @endif'>
			@csrf

			@if($model->id)
			@method('PUT')
			@endif

			<div class='row'>
				<div class='col-12'>
					<div class='mb-3'>
						<label for='name' class='form-label'>{{ __('warehouses.form.name') }} <b style="color: red">*</b></label>
						<input class='form-control' id='name' name='name' value='{{ $model->name }}' required>
					</div>
				</div>
				<div class='col-12'>
					<div class='mb-3'>
						<label for='address' class='form-label'>{{ __('warehouses.form.address') }}</label>
						<input class='form-control' id='address' name='address' value='{{ $model->address }}' >
					</div>
				</div>
				<div class='col-12'>
					<div class='mb-3'>
						<label for='number' class='form-label'>{{ __('warehouses.form.number') }}</label>
						<input class='form-control' id='number' name='number' value='{{ $model->number }}' >
					</div>
				</div>
				<div class='col-12'>
					<div class='mb-3'>
						<label for='neighborhood' class='form-label'>{{ __('warehouses.form.neighborhood') }}</label>
						<input class='form-control' id='neighborhood' name='neighborhood' value='{{ $model->neighborhood }}' >
					</div>
				</div>
				<div class='col-12'>
					<div class='mb-3'>
						<label for='completion' class='form-label'>{{ __('warehouses.form.completion') }}</label>
						<input class='form-control' id='completion' name='completion' value='{{ $model->completion }}' >
					</div>
				</div>
				<div class='col-12'>
					<div class='mb-3'>
						<label for='city' class='form-label'>{{ __('warehouses.form.city') }}</label>
						<input class='form-control' id='city' name='city' value='{{ $model->city }}' >
					</div>
				</div>
				<div class='col-12'>
					<div class='mb-3'>
						<label for='state' class='form-label'>{{ __('warehouses.form.state') }}</label>
						<input class='form-control' id='state' name='state' value='{{ $model->state }}' >
					</div>
				</div>
				<div class='col-12'>
					<button class='btn btn-success'>Salvar</button>
				</div>
			</div>
		</form>

@endsection