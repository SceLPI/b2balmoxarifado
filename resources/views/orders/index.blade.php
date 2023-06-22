@extends('layout.template')
@section('content')
	<div class='row'>
		<a href="{{ route('orders.create') }}" class="btn btn-success mt-3 mb-5">+ Adicionar</a>
		<table class='table table-striped table-bordered'>
			<thead>
				<tr>
					<th>
						#
					</th>
					<th>
						{{ __('orders.index.entities') }}
					</th>
					<th>
						{{ __('orders.index.ordered_by') }}
					</th>
					<th>
						{{ __('orders.index.is_finished') }}
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
						{{ $item->entity->name }}
					</td>
					<td>
						{{ $item->ordered_by }}
					</td>
					<td>
						{{ $item->is_finished ? "SIM" : "NÃO" }}
					</td>
					<td>
						{{ $item->created_at?->format("d/m/Y H:i:s") }}
					</td>
					<td>
						{{ $item->updated_at?->format("d/m/Y H:i:s") }}
					</td>
					<td>
						<a href="{{ route('orders.show', ["$item->id"]) }}" class="btn btn-warning">EDITAR</a>
						<a href="{{ route('orders.destroy', ["$item->id"]) }}" class="btn btn-danger">EXCLUIR</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@endsection