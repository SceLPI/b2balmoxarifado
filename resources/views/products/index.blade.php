@extends('layout.template')
@section('content')
	<div class='row'>
		<a href="{{ route('products.create') }}" class="btn btn-success mt-3 mb-5">+ Adicionar</a>
		<table class='table table-striped'>
			<thead>
				<tr>
					<th>
						#
					</th>
					<th>
						manufacturers
					</th>
					<th>
						categories
					</th>
					<th>
						title
					</th>
					<th>
						description
					</th>
					<th>
						code
					</th>
					<th>
						created_at
					</th>
					<th>
						updated_at
					</th>
					<th>
						deleted_at
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
						{{ $item->manufacturer->name }}
					</td>
					<td>
						{{ $item->category->name }}
					</td>
					<td>
						{{ $item->title }}
					</td>
					<td>
						{{ $item->description }}
					</td>
					<td>
						{{ $item->code }}
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