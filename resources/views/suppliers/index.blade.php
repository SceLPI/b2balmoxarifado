@extends('layout.template')
@section('content')
	<div class='row'>
		<a href="{{ route('suppliers.create') }}" class="btn btn-success mt-3 mb-5">+ Adicionar</a>
		<table class='table table-striped table-bordered'>
			<thead>
				<tr>
					<th>
						#
					</th>
					<th>
						{{ __('suppliers.index.fantasy_name') }}
					</th>
					<th>
						{{ __('suppliers.index.social_reason') }}
					</th>
					<th>
						{{ __('suppliers.index.cnpj') }}
					</th>
					<th>
						{{ __('suppliers.index.phone') }}
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
						{{ $item->fantasy_name }}
					</td>
					<td>
						{{ $item->social_reason }}
					</td>
					<td>
						{{ $item->cnpj }}
					</td>
					<td>
						{{ $item->phone }}
					</td>
					<td>
						{{ $item->created_at?->format("d/m/Y H:i:s") }}
					</td>
					<td>
						{{ $item->updated_at?->format("d/m/Y H:i:s") }}
					</td>
					<td>
						<a href="{{ route('suppliers.show', ["$item->id"]) }}" class="btn btn-warning">EDITAR</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@endsection