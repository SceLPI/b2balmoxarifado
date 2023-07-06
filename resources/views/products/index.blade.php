@extends('layout.template')
@section('content')
	<div class='row'>
		<a href="{{ route('products.create') }}" class="btn btn-success mt-3 mb-5">+ Adicionar</a>
		<table class='table table-striped table-bordered'>
			<thead>
				<tr>
					<th>
						#
					</th>
					<th>
						{{ __('products.index.suppliers') }}
					</th>
					<th>
						{{ __('products.index.categories') }}
					</th>
					<th>
						{{ __('products.index.warehouses') }}
					</th>
					<th>
						{{ __('products.index.title') }}
					</th>
					<th>
						{{ __('products.index.code') }}
					</th>
					<th>
						{{ __('products.index.stock') }}
					</th>
					<th>
						{{ __('products.index.ultimo_valor_compra') }}
					</th>
					<th>
						{{ __('database.created_at') }}
					</th>
					<th>
						{{ __('database.updated_at') }}
					</th>
					<th>
						{{ __('database.deleted_at') }}
					</th>
					<th>
						Ações
					</th>
				</tr>
			</thead>
			<tbody>
				@foreach( $model as $item)
				<tr>
					<td>
						{{ $item->id }}
					</td>
					<td>
						{{ $item->supplier?->fantasy_name }}
					</td>
					<td>
						{{ $item->category?->name }}
					</td>
					<td>
						{{ $item->warehouses_of_product }}
					</td>
					<td>
						{{ $item->title }}
					</td>
					<td>
						{{ $item->code }}
					</td>
					<td>
						{{ $item->stock }}
                        @if ( preg_match("/,/", $item->warehouses_of_product) )
                            <button type="button" class="btn btn-info" data-bs-toggle="tooltip" data-bs-html="true" data-bs-title="Almoxarifados:<br>@foreach ($item->product_by_warehouse as $prow) <br>-{{ $prow->warehouse->name }} - {{ $prow->stock }} @endforeach">
                                ℹ︎
                            </button>

                        @endif
					</td>
					<td>
						R$ {{ number_format($item->ultimo_valor_compra, 2, ",", ".") }}
					</td>
					<td>
						{{ $item->created_at?->format("d/m/Y H:i:s") }}
					</td>
					<td>
						{{ $item->updated_at?->format("d/m/Y H:i:s") }}
					</td>
					<td>
						{{ $item->deleted_at?->format("d/m/Y H:i:s") }}
					</td>
					<td>
						<a href="{{ route('products.show', ["$item->id"]) }}" class="btn btn-warning">EDITAR</a>
						<a href="{{ route('products.destroy', ["$item->id"]) }}" class="btn btn-danger">EXCLUIR</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@endsection
