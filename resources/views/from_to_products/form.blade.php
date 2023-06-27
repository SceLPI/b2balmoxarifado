@extends('layout.template')
@section('content')

		<form method='post' action='@if ( $model->id ) {{ route('from_to_products.update', [$model->id]) }}  @else {{ route('from_to_products.store') }} @endif'>
			@csrf

			@if($model->id)
			@method('PUT')
			@endif

			<div class='row'>
				<div class='col-12'>
					<div class='mb-3'>
						<label for='products' class='form-label'>{{ __('from_to_products.form.products') }} <b style="color: red">*</b></label>
						<select class='form-control' id='main_product_id' name='main_product_id' required>
							<option value=''>-- SELECIONE --</option>
							@foreach ($model->mainProducts as $relationshipModel )
								<option @if ($relationshipModel->id == $model->main_product_id) selected  @endif value='{{ $relationshipModel->id }}'>{{ $relationshipModel->title }}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class='col-12'>
					<div class='mb-3'>
						<label for='products' class='form-label'>{{ __('from_to_products.form.products') }} <b style="color: red">*</b></label>
						<select class='form-control' id='secondary_product_id' name='secondary_product_id' required>
							<option value=''>-- SELECIONE --</option>
							@foreach ($model->secondaryProducts as $relationshipModel )
								<option @if ($relationshipModel->id == $model->secondary_product_id) selected  @endif value='{{ $relationshipModel->id }}'>{{ $relationshipModel->title }}</option>
							@endforeach
						</select>
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
