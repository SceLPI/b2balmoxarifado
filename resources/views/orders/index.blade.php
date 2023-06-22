@extends('layout.template')
@section('content')
	<div class='row'>
		<a href="{{ route('orders.create') }}" class="btn btn-success mt-3 mb-5">+ Adicionar</a>
		<table class='table table-striped'>
			<thead>
				<tr>
					<th>
						#
					</th>
					<th>
						entities
					</th>
					<th>
						ordered_by
					</th>
					<th>
						finished
					</th>
					<th>
						created_at
					</th>
					<th>
						updated_at
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
						{{ $item->finished ? "SIM" : "NÃO" }}
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