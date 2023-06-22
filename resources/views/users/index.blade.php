@extends('layout.template')
@section('content')
	<div class='row'>
		<a href="{{ route('users.create') }}" class="btn btn-success mt-3 mb-5">+ Adicionar</a>
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
						email
					</th>
					<th>
						email_verified_at
					</th>
					<th>
						password
					</th>
					<th>
						remember_token
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
						{{ $item->email }}
					</td>
					<td>
						{{ $item->email_verified_at?->format("d/m/Y H:i:s") }}
					</td>
					<td>
						{{ $item->password }}
					</td>
					<td>
						{{ $item->remember_token }}
					</td>
					<td>
						{{ $item->created_at?->format("d/m/Y H:i:s") }}
					</td>
					<td>
						{{ $item->updated_at?->format("d/m/Y H:i:s") }}
					</td>
					<td>
						<a href="{{ route('users.show', ["$item->id"]) }}" class="btn btn-warning">EDITAR</a>
						<a href="{{ route('users.destroy', ["$item->id"]) }}" class="btn btn-danger">EXCLUIR</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@endsection