@extends('layout.template')
@section('content')

		<form method='post' action='@if ( $model->id ) {{ route('categories.update', [$model->id]) }}  @else {{ route('categories.store') }} @endif'>
			@csrf

			@if($model->id)
			@method('PUT')
			@endif

			<div class='row'>
				<div class='col-12'>
					<div class='mb-3'>
						<label for='name' class='form-label'>{{ __('categories.form.name') }}</label>
						<input class='form-control' id='name' name='name' value='{{ $model->name }}'>
					</div>
				</div>
				<div class='col-12'>
					<button class='btn btn-success'>Salvar</button>
				</div>
			</div>
		</form>

@endsection