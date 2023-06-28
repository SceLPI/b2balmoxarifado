@extends('layout.template')
@section('content')

		<form method='post' action='@if ( $model->id ) {{ route('users.update', [$model->id]) }}  @else {{ route('users.store') }} @endif'>
			@csrf

			@if($model->id)
			@method('PUT')
			@endif

			<div class='row'>
				<div class='col-12'>
					<div class='mb-3'>
						<label for='name' class='form-label'>{{ __('users.form.name') }} <b style="color: red">*</b></label>
						<input class='form-control' id='name' name='name' value='{{ $model->name }}' required>
					</div>
				</div>
				<div class='col-12'>
					<div class='mb-3'>
						<label for='email' class='form-label'>{{ __('users.form.email') }} <b style="color: red">*</b></label>
						<input class='form-control' id='email' name='email' value='{{ $model->email }}' required>
					</div>
				</div>
				<div class='col-12'>
					<div class='mb-3'>
						<label for='password' class='form-label'>{{ __('users.form.password') }}@if (!$model->id) <b style="color: red">*</b>@endif</label>
						<input class='form-control' id='password' name='password' value='' >
@if ($model->id)						<small style="color: #88F">(Deixe em branco caso não queira alterar)</small>
@endif					</div>
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