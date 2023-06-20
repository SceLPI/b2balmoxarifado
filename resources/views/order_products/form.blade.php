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
			<label for='products' class='form-label'>products</label>
			<select class='form-control' id='product_id' name='product_id'>
				<option value=''>-- SELECIONE --</option>
				@foreach ($model->products as $relationshipModel )
					<option @if ($relationshipModel->id == $model->product_id) selected  @endif value='{{ $relationshipModel->id }}'>{{ $relationshipModel->name }}</option>
				@endforeach
			</select>
		<div>
	</div>
	<div class='col-12'>
		<div class='mb-3'>
			<label for='orders' class='form-label'>orders</label>
			<select class='form-control' id='order_id' name='order_id'>
				<option value=''>-- SELECIONE --</option>
				@foreach ($model->orders as $relationshipModel )
					<option @if ($relationshipModel->id == $model->order_id) selected  @endif value='{{ $relationshipModel->id }}'>{{ $relationshipModel->name }}</option>
				@endforeach
			</select>
		<div>
	</div>
	<div class='col-12'>
		<div class='mb-3'>
			<label for='amount' class='form-label'>amount</label>
			<input class='form-control' id='amount' name='amount' value='{{ $model->amount }}'>
		<div>
	</div>
	<div class='col-12'>
		<div class='mb-3'>
			<label for='canceled' class='form-label'>canceled</label>
			<input class='form-control' id='canceled' name='canceled' value='{{ $model->canceled }}'>
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