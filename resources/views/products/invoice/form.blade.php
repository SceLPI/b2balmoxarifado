@extends('layout.template')
@section('content')

		<form method='post' enctype="multipart/form-data" action='{{ route('products.invoice.review') }}'>
			@csrf

			<div class='row'>
				<div class='col-12'>
					<div class='mb-3'>
						<label for='xml' class='form-label'>{{ __('products.invoice.form.select') }}</label>
						<input type="file" class='form-control' id='xml' name='xml' value=''>
					</div>
				</div>
				<div class='col-12'>
					<button class='btn btn-success'>Salvar</button>
				</div>
			</div>
		</form>

@endsection

@section('js-footer')
@endsection
