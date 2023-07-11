@extends('layout.template')
@section('content')
<form method="post" action="{{ route('products.invoice.finish') }}">
    @csrf
    <input type="hidden" name="xmlfile" value="{{ $xmlFile->id }}">
    <div class='row'>
        @foreach($products as $id => $product)
        @include('products.invoice.product_fragment')
        @endforeach
        <div class='col-12'>
            <button class='btn btn-success'>Salvar</button>
        </div>
    </div>
</form>
@endsection
