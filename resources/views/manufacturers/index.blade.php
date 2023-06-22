@extends('layout.template')
@section('content')
	<div class='row'>
		<a href="{{ route('manufacturers.create') }}" class="btn btn-success mt-3 mb-5">+ Adicionar</a>
		<table class='table table-striped'>
			<thead>
				<tr>
					<th>
						#
					</th>
					<th>
						name
					</th>
					<th>
						cnpj
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
						{{ $item->name }}
					</td>
					<td>
						{{ $item->cnpj }}
					</td>
					<td>
						{{ $item->created_at->format("d/m/Y H:i:s") }}
					</td>
					<td>
						{{ $item->updated_at->format("d/m/Y H:i:s") }}
					</td>
					<td>
						<a href="{{ route('manufacturers.show', ["$item->id"]) }}" class="btn btn-warning">EDITAR</a>
						<a href="{{ route('manufacturers.destroy', ["$item->id"]) }}" class="btn btn-danger">EXCLUIR</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@endsection