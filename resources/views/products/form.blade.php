@extends('layout.template')
@section('content')

		<form method='post' action='@if ( $model->id ) {{ route('products.update', [$model->id]) }}  @else {{ route('products.store') }} @endif'>
			@csrf

			@if($model->id)
			@method('PUT')
			@endif

			<div class='row'>
				<div class='col-12'>
					<div class='mb-3'>
						<label for='suppliers' class='form-label'>{{ __('products.form.suppliers') }} <b style="color: red">*</b></label>
						<select class='form-control' id='supplier_id' name='supplier_id' required>
							<option value=''>-- SELECIONE --</option>
							@foreach ($model->suppliers as $relationshipModel )
								<option @if ($relationshipModel->id == $model->supplier_id) selected  @endif value='{{ $relationshipModel->id }}'>{{ $relationshipModel->fantasy_name }}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class='col-12'>
					<div class='mb-3'>
						<label for='categories' class='form-label'>{{ __('products.form.categories') }} <b style="color: red">*</b></label>
						<select class='form-control' id='category_id' name='category_id' required>
							<option value=''>-- SELECIONE --</option>
							@foreach ($model->categorys as $relationshipModel )
								<option @if ($relationshipModel->id == $model->category_id) selected  @endif value='{{ $relationshipModel->id }}'>{{ $relationshipModel->name }}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class='col-12'>
					<div class='mb-3'>
						<label for='warehouses' class='form-label'>{{ __('products.form.warehouses') }}</label>
						<select class='form-control' id='warehouse_id' name='warehouse_id' >
							<option value=''>-- SELECIONE --</option>
							@foreach ($model->warehouses as $relationshipModel )
								<option @if ($relationshipModel->id == $model->warehouse_id) selected  @endif value='{{ $relationshipModel->id }}'>{{ $relationshipModel->name }}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class='col-12'>
					<div class='mb-3'>
						<label for='title' class='form-label'>{{ __('products.form.title') }} <b style="color: red">*</b></label>
						<input class='form-control' id='title' name='title' value='{{ $model->title }}' required>
					</div>
				</div>
				<div class='col-12'>
					<div class='mb-3'>
						<label for='code' class='form-label'>{{ __('products.form.code') }} <b style="color: red">*</b></label>
						<input class='form-control' id='code' name='code' value='{{ $model->code }}' required>
					</div>
				</div>
				<div class='col-12'>
					<div class='mb-3'>
						<label for='ultimo_valor_compra' class='form-label'>{{ __('products.form.ultimo_valor_compra') }}</label>
						<input class='form-control' id='ultimo_valor_compra' name='ultimo_valor_compra' value='{{ $model->ultimo_valor_compra }}' >
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