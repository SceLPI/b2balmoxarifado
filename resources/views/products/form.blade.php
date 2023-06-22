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
						<label for='manufacturers' class='form-label'>manufacturers</label>
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
						<label for='categories' class='form-label'>categories</label>
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
						<label for='title' class='form-label'>title</label>
						<input class='form-control' id='title' name='title' value='{{ $model->title }}'>
					</div>
				</div>
				<div class='col-12'>
					<div class='mb-3'>
						<label for='description' class='form-label'>description</label>
						<input class='form-control' id='description' name='description' value='{{ $model->description }}'>
					</div>
				</div>
				<div class='col-12'>
					<div class='mb-3'>
						<label for='code' class='form-label'>code</label>
						<input class='form-control' id='code' name='code' value='{{ $model->code }}'>
					</div>
				</div>
				<div class='col-12'>
					<button class='btn btn-success'>Salvar</button>
				</div>
			</div>
		</form>

@endsection