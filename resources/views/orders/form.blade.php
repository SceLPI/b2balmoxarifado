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
						<label for='entities' class='form-label'>{{ __('orders.form.entities') }} <b style="color: red">*</b></label>
						<select class='form-control' id='entity_id' name='entity_id' required>
							<option value=''>-- SELECIONE --</option>
							@foreach ($model->entitys as $relationshipModel )
								<option @if ($relationshipModel->id == $model->entity_id) selected  @endif value='{{ $relationshipModel->id }}'>{{ $relationshipModel->name }}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class='col-12'>
					<div class='mb-3'>
						<label for='ordered_by' class='form-label'>{{ __('orders.form.ordered_by') }} <b style="color: red">*</b></label>
						<input class='form-control' id='ordered_by' name='ordered_by' value='{{ $model->ordered_by }}' required>
					</div>
				</div>
				<div class='col-12'>
					<div class='mb-3'>
						<label for='is_finished' class='form-label'>{{ __('orders.form.is_finished') }} <b style="color: red">*</b></label>
						<div class="form-check">
							<input class="form-check-input" value="1" type="checkbox" @if ($model->is_finished) checked @endif value="" id="is_finished" name="is_finished">
							<label class="form-check-label" for="is_finished">
								{{ __('orders.form.is_finished.checkbox') }}
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

@section('js-footer')
<script>
		</script>
@endsection