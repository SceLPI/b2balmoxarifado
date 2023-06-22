@extends('layout.template')
@section('content')

		<form method='post' action='@if ( $model->id ) {{ route('orders.update', [$model->id]) }}  @else {{ route('orders.store') }} @endif'>
			@csrf

			@if($model->id)
			@method('PUT')
			@endif

			<div class='row'>
				<div class='col-12'>
					<div class='mb-3'>
						<label for='entities' class='form-label'>{{ __('orders.form.entities') }}</label>
						<select class='form-control' id='entity_id' name='entity_id'>
							<option value=''>-- SELECIONE --</option>
							@foreach ($model->entities as $relationshipModel )
								<option @if ($relationshipModel->id == $model->entity_id) selected  @endif value='{{ $relationshipModel->id }}'>{{ $relationshipModel->name }}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class='col-12'>
					<div class='mb-3'>
						<label for='ordered_by' class='form-label'>{{ __('orders.form.ordered_by') }}</label>
						<input class='form-control' id='ordered_by' name='ordered_by' value='{{ $model->ordered_by }}'>
					</div>
				</div>

                <div class="col-12 mb-3">
                    <div class="card">
                        <div class="card-header" style="position: relative">
                            PRODUTOS DO PEDIDO
                            <button type="button" class="btn btn-sm btn-success" style="position: absolute; right: 10px; top: 5px;">+ Produto</button>
                        </div>
                        <div class="card-body">
                            <div id="products_container">
                                @include('orders.form_product_fragment')
                            </div>
                        </div>
                    </div>
                </div>

				<div class='col-12'>
					<div class='mb-3'>
						<label for='is_finished' class='form-label'>{{ __('orders.form.is_finished') }}</label>
						<div class="form-check">
							<input class="form-check-input" value="1" type="checkbox" @if ($model->is_finished) checked @endif value="" id="is_finished" name="is_finished">
							<label class="form-check-label" for="is_finished">
								{{ __('orders.form.is_finished.checkbox') }}
							</label>
						</div>
					</div>
				</div>

				<div class='col-12'>
					<button class='btn btn-success'>Salvar</button>
				</div>
			</div>
		</form>

@endsection
