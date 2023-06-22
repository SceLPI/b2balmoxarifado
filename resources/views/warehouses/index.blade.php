@extends('layout.template')
@section('content')
	<div class='row'>
		<a href="{{ route('warehouses.create') }}" class="btn btn-success mt-3 mb-5">+ Adicionar</a>
		<table class='table table-striped table-bordered'>
			<thead>
				<tr>
					<th>
						#
					</th>
					<th>
						{{ __('warehouses.index.name') }}
					</th>
					<th>
						{{ __('warehouses.index.address') }}
					</th>
					<th>
						{{ __('warehouses.index.number') }}
					</th>
					<th>
						{{ __('warehouses.index.neighborhood') }}
					</th>
					<th>
						{{ __('warehouses.index.completion') }}
					</th>
					<th>
						{{ __('warehouses.index.city') }}
					</th>
					<th>
						{{ __('warehouses.index.state') }}
					</th>
					<th>
						{{ __('database.created_at') }}
					</th>
					<th>
						{{ __('database.updated_at') }}
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
						{{ $item->name }}
					</td>
					<td>
						{{ $item->address }}
					</td>
					<td>
						{{ $item->number }}
					</td>
					<td>
						{{ $item->neighborhood }}
					</td>
					<td>
						{{ $item->completion }}
					</td>
					<td>
						{{ $item->city }}
					</td>
					<td>
						{{ $item->state }}
					</td>
					<td>
						{{ $item->created_at?->format("d/m/Y H:i:s") }}
					</td>
					<td>
						{{ $item->updated_at?->format("d/m/Y H:i:s") }}
					</td>
					<td>
						<a href="{{ route('warehouses.show', ["$item->id"]) }}" class="btn btn-warning">EDITAR</a>
						<a href="{{ route('warehouses.destroy', ["$item->id"]) }}" class="btn btn-danger">EXCLUIR</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@endsection