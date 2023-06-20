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
			<label for='entities' class='form-label'>entities</label>
			<select class='form-control' id='entity_id' name='entity_id'>
				<option value=''>-- SELECIONE --</option>
				@foreach ($model->entities as $relationshipModel )
					<option @if ($relationshipModel->id == $model->entity_id) selected  @endif value='{{ $relationshipModel->id }}'>{{ $relationshipModel->name }}</option>
				@endforeach
			</select>
		<div>
	</div>
	<div class='col-12'>
		<div class='mb-3'>
			<label for='ordered_by' class='form-label'>ordered_by</label>
			<input class='form-control' id='ordered_by' name='ordered_by' value='{{ $model->ordered_by }}'>
		<div>
	</div>
	<div class='col-12'>
		<div class='mb-3'>
			<label for='finished' class='form-label'>finished</label>
			<input class='form-control' id='finished' name='finished' value='{{ $model->finished }}'>
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
</div>

@endsection