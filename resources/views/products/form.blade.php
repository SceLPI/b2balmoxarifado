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
						<label for='manufacturers' class='form-label'>{{ __('products.form.manufacturers') }}</label>
						<select class='form-control' id='manufacturer_id' name='manufacturer_id'>
							<option value=''>-- SELECIONE --</option>
							@foreach ($model->manufacturers as $relationshipModel )
								<option @if ($relationshipModel->id == $model->manufacturer_id) selected  @endif value='{{ $relationshipModel->id }}'>{{ $relationshipModel->name }}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class='col-12'>
					<div class='mb-3'>
						<label for='categories' class='form-label'>{{ __('products.form.categories') }}</label>
						<select class='form-control' id='category_id' name='category_id'>
							<option value=''>-- SELECIONE --</option>
							@foreach ($model->categories as $relationshipModel )
								<option @if ($relationshipModel->id == $model->category_id) selected  @endif value='{{ $relationshipModel->id }}'>{{ $relationshipModel->name }}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class='col-12'>
					<div class='mb-3'>
						<label for='warehouses' class='form-label'>{{ __('products.form.warehouses') }}</label>
						<select class='form-control' id='warehouse_id' name='warehouse_id'>
							<option value=''>-- SELECIONE --</option>
							@foreach ($model->warehouses as $relationshipModel )
								<option @if ($relationshipModel->id == $model->warehouse_id) selected  @endif value='{{ $relationshipModel->id }}'>{{ $relationshipModel->name }}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class='col-12'>
					<div class='mb-3'>
						<label for='title' class='form-label'>{{ __('products.form.title') }}</label>
						<input class='form-control' id='title' name='title' value='{{ $model->title }}'>
					</div>
				</div>
				<div class='col-12'>
					<div class='mb-3'>
						<label for='code' class='form-label'>{{ __('products.form.code') }}</label>
						<input class='form-control' id='code' name='code' value='{{ $model->code }}'>
					</div>
				</div>
				<div class='col-12'>
					<div class='mb-3'>
						<label for='stock' class='form-label'>{{ __('products.form.stock') }}</label>
						<input class='form-control' id='stock' name='stock' value='{{ $model->stock }}'>
					</div>
				</div>
				<div class='col-12'>
					<button class='btn btn-success'>Salvar</button>
				</div>
			</div>
		</form>

@endsection
