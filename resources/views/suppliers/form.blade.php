@extends('layout.template')
@section('content')

		<form method='post' action='@if ( $model->id ) {{ route('suppliers.update', [$model->id]) }}  @else {{ route('suppliers.store') }} @endif'>
			@csrf

			@if($model->id)
			@method('PUT')
			@endif

			<div class='row'>
				<div class='col-12'>
					<div class='mb-3'>
						<label for='fantasy_name' class='form-label'>{{ __('suppliers.form.fantasy_name') }} <b style="color: red">*</b></label>
						<input class='form-control' id='fantasy_name' name='fantasy_name' value='{{ $model->fantasy_name }}' required>
					</div>
				</div>
				<div class='col-12'>
					<div class='mb-3'>
						<label for='social_reason' class='form-label'>{{ __('suppliers.form.social_reason') }} <b style="color: red">*</b></label>
						<input class='form-control' id='social_reason' name='social_reason' value='{{ $model->social_reason }}' required>
					</div>
				</div>
				<div class='col-12'>
					<div class='mb-3'>
						<label for='cnpj' class='form-label'>{{ __('suppliers.form.cnpj') }} <b style="color: red">*</b></label>
						<input class='form-control' id='cnpj' name='cnpj' value='{{ $model->cnpj }}' required minlength="18" >
					</div>
				</div>
				<div class='col-12'>
					<div class='mb-3'>
						<label for='phone' class='form-label'>{{ __('suppliers.form.phone') }} <b style="color: red">*</b></label>
						<input class='form-control' id='phone' name='phone' value='{{ $model->phone }}' required minlength="15" >
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
			var element = document.getElementById('phone');
			var maskOptions = {
				mask: '(00) 00000-0000'
			};
			var mask = IMask(element, maskOptions);
		</script>
@endsection