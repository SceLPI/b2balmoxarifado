@extends('layout.template')
@section('content')

		<form method='post' action='@if ( $model->id ) {{ route('orders.update', [$model->id]) }}  @else {{ route('orders.store') }} @endif'>
			@csrf

			@if($model->id)
			@method('PUT')
			@endif

			<div class='row'>
				<div class='col-12'>
					<div class='mb-3'>
						<label for='entities' class='form-label'>entities</label>
						<select class='form-control' id='entity_id' name='entity_id'>
							<option value=''>-- SELECIONE --</option>
							@foreach ($model->entities as $relationshipModel )
								<option @if ($relationshipModel->id == $model->entity_id) selected  @endif value='{{ $relationshipModel->id }}'>{{ $relationshipModel->name }}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class='col-12'>
					<div class='mb-3'>
						<label for='ordered_by' class='form-label'>ordered_by</label>
						<input class='form-control' id='ordered_by' name='ordered_by' value='{{ $model->ordered_by }}'>
					</div>
				</div>
				<div class='col-12'>
					<div class='mb-3'>
						<label for='finished' class='form-label'>finished</label>
						<div class="form-check">
							<input class="form-check-input" value="1" type="checkbox" @if ($model->finished) checked @endif value="" id="finished" name="finished">
							<label class="form-check-label" for="finished">
								SIM, ESTÁ FINALIZADO
							</label>
						</div>
					</div>
				</div>
				<div class='col-12'>
					<button class='btn btn-success'>Salvar</button>
				</div>
			</div>
		</form>

@endsection