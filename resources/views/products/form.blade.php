@extends('layout.template')
@section('content')

<form method='post'>
@csrf_field
<div class='row'>
	<div class='col-12'>
		<div class='mb-3'>
			<label for='id' class='form-label'>id</label>
			<input class='form-control' id='id' name='id' value='{{ $model->id }}'>
		<div>
	</div>
	<div class='col-12'>
		<div class='mb-3'>
			<label for='manufacturers' class='form-label'>manufacturers</label>
			<select class='form-control' id='manufacturer_id' name='manufacturer_id'>
				<option value=''>-- SELECIONE --</option>
				@foreach ($model->manufacturers as $relationshipModel )
					<option @if ($relationshipModel->id == $model->manufacturer_id) selected  @endif value='{{ $relationshipModel->id }}'>{{ $relationshipModel->name }}</option>
				@endforeach
			</select>
		<div>
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
		<div>
	</div>
	<div class='col-12'>
		<div class='mb-3'>
			<label for='title' class='form-label'>title</label>
			<input class='form-control' id='title' name='title' value='{{ $model->title }}'>
		<div>
	</div>
	<div class='col-12'>
		<div class='mb-3'>
			<label for='description' class='form-label'>description</label>
			<input class='form-control' id='description' name='description' value='{{ $model->description }}'>
		<div>
	</div>
	<div class='col-12'>
		<div class='mb-3'>
			<label for='code' class='form-label'>code</label>
			<input class='form-control' id='code' name='code' value='{{ $model->code }}'>
		<div>
	</div>
	<div class='col-12'>
		<div class='mb-3'>
			<label for='created_at' class='form-label'>created_at</label>
			<input class='form-control' id='created_at' name='created_at' value='{{ $model->created_at }}'>
		<div>
	</div>
	<div class='col-12'>
		<div class='mb-3'>
			<label for='updated_at' class='form-label'>updated_at</label>
			<input class='form-control' id='updated_at' name='updated_at' value='{{ $model->updated_at }}'>
		<div>
	</div>
	<div class='col-12'>
		<div class='mb-3'>
			<label for='deleted_at' class='form-label'>deleted_at</label>
			<input class='form-control' id='deleted_at' name='deleted_at' value='{{ $model->deleted_at }}'>
		<div>
	</div>
</div>

@endsection