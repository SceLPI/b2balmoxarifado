@extends('layout.template')
@section('content')

		<form method='post' action='@if ( $model->id ) {{ route('entities.update', [$model->id]) }}  @else {{ route('entities.store') }} @endif'>
			@csrf

			@if($model->id)
			@method('PUT')
			@endif

			<div class='row'>
				<div class='col-12'>
					<div class='mb-3'>
						<label for='types' class='form-label'>types</label>
						<select class='form-control' id='type_id' name='type_id'>
							<option value=''>-- SELECIONE --</option>
							@foreach ($model->types as $relationshipModel )
								<option @if ($relationshipModel->id == $model->type_id) selected  @endif value='{{ $relationshipModel->id }}'>{{ $relationshipModel->name }}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class='col-12'>
					<div class='mb-3'>
						<label for='name' class='form-label'>name</label>
						<input class='form-control' id='name' name='name' value='{{ $model->name }}'>
					</div>
				</div>
				<div class='col-12'>
					<button class='btn btn-success'>Salvar</button>
				</div>
			</div>
		</form>

@endsection