@extends('layout.template')
@section('content')

		<form method='post' enctype="multipart/form-data" action='{{ route('products.invoice.review') }}'>
			@csrf

			<div class='row'>
				<div class='col-12'>
					<div class='mb-3'>
						<label for='xml' class='form-label'>{{ __('products.invoice.form.select') }}</label>
						<input type="file" class='form-control' id='xml' name='xml' value='' accept="text/xml" required>
					</div>
				</div>
				<div class='col-12'>
					<button class='btn btn-success'>Carregar</button>
				</div>
			</div>
		</form>

        <div class='row mt-5'>
            <div class="col-12">
                <h5>Ultimas Notas</h5>
                <table class='table table-striped table-bordered'>
                    <thead>
                        <tr>
                            <th>
                                #
                            </th>
                            <th>
                                {{ __('xml_files.index.key') }}
                            </th>
                            <th>
                                {{ __('xml_files.index.number') }}
                            </th>
                            <th>
                                {{ __('xml_files.index.supplier_id') }}
                            </th>
                            <th>
                                {{ __('xml_files.index.value') }}
                            </th>
                            <td>
                                {{ __('xml_files.index.is_finished') }}
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach( $xmls as $xml )
                        <tr>
                            <td>
                                {{ $i++ }}
                            </td>
                            <td>
                                {{ $xml->key }}
                            </td>
                            <td>
                                {{ $xml->number }}
                            </td>
                            <td>
                                {{ $xml->supplier->fantasy_name }}
                            </td>
                            <td>
                                R$ {{ number_format($xml->value, 2, ",", ".") }}
                            </td>
                            <td>
                                {{ $xml->is_finished ? "Sim" : "Não" }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

@endsection

@section('js-footer')
@endsection
