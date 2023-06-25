@extends('layout.template')
@section('content')

		<form method='post' action='@if ( $model->id ) {{ route('types.update', [$model->id]) }}  @else {{ route('types.store') }} @endif'>
			@csrf

			@if($model->id)
			@method('PUT')
			@endif

			<div class='row'>
				<div class='col-12'>
					<div class='mb-3'>
						<label for='name' class='form-label'>{{ __('types.form.name') }} <b style="color: red">*</b></label>
						<input class='form-control' id='name' name='name' value='{{ $model->name }}' required>
					</div>
				</div>
				<div class='col-12'>
					<button class='btn btn-success'>Salvar</button>
				</div>
			</div>
		</form>

@endsection