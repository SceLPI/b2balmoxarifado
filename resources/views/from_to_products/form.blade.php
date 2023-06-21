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
			<label for='main_product_id' class='form-label'>main_product_id</label>
			<input class='form-control' id='main_product_id' name='main_product_id' value='{{ $model->main_product_id }}'>
		<div>
	</div>
	<div class='col-12'>
		<div class='mb-3'>
			<label for='secondary_product_id' class='form-label'>secondary_product_id</label>
			<input class='form-control' id='secondary_product_id' name='secondary_product_id' value='{{ $model->secondary_product_id }}'>
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