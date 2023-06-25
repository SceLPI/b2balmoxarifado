@extends('layout.template')
@section('content')

		<form method='post' action='@if ( $model->id ) {{ route('manufacturers.update', [$model->id]) }}  @else {{ route('manufacturers.store') }} @endif'>
			@csrf

			@if($model->id)
			@method('PUT')
			@endif

			<div class='row'>
				<div class='col-12'>
					<div class='mb-3'>
						<label for='name' class='form-label'>{{ __('manufacturers.form.name') }} <b style="color: red">*</b></label>
						<input class='form-control' id='name' name='name' value='{{ $model->name }}' required>
					</div>
				</div>
				<div class='col-12'>
					<div class='mb-3'>
						<label for='cnpj' class='form-label'>{{ __('manufacturers.form.cnpj') }}</label>
						<input class='form-control' id='cnpj' name='cnpj' value='{{ $model->cnpj }}'  minlength="18" >
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
			var element = document.getElementById('cnpj');
			var maskOptions = {
				mask: '00.000.000/0000-00'
			};
			var mask = IMask(element, maskOptions);
		</script>
@endsection