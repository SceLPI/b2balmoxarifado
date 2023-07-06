<div class='col-12 mb-4'>
    <div class="card">
        <div class="card-header">
            Produto {{ $id + 1 }}
        </div>
        <div class="card-body">
            <div class="row">
                <div class='col-md-6 mb-3'>
                    <label for='products[{{ $id }}][description]' class='form-label'>Descrição:</label>
                    <input class='form-control' id='products[{{ $id }}][description]' name='products[{{ $id }}][description]' value='{{ $product->xProd }}'>
                </div>

                @if (!isset($product->cat_id))
                <div class="col-md-3">
                    <label for='products[{{ $id }}][category_id]' class='form-label'>Categoria:</label>
                    <div class="input-group mb-3">
                        <select class='form-control' id='products[{{ $id }}][category_id]' name='products[{{ $id }}][category_id]'>
                            <option value=''>-- SELECIONE --</option>
                            @foreach( $categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <a href="{{ route('categories.create') }}" target="_blank" class="btn btn-outline-secondary" type="button">Nova</a>
                    </div>
                </div>
                @else
                <div class="col-md-3">
                    <label for='products[{{ $id }}][supplier_id]' class='form-label'>Fornecedor:</label>
                    {{-- <div class="input-group mb-3"> --}}
                        <input class='form-control' type="hidden" id='products[{{ $id }}][category_id]' name='products[{{ $id }}][category_id]' value='{{ $product->cat_id }}'>
                        <input class='form-control' readonly value='{{ $product->cat_name }}'>
                        {{-- <a href="{{ route('suppliers.create') }}" target="_blank" class="btn btn-outline-secondary" type="button">Novo</a> --}}
                    {{-- </div> --}}
                </div>
                @endif

                <div class="col-md-3">
                    <label for='products[{{ $id }}][supplier_id]' class='form-label'>Fornecedor:</label>
                    {{-- <div class="input-group mb-3"> --}}
                        <input class='form-control' type="hidden" id='products[{{ $id }}][supplier_id]' name='products[{{ $id }}][supplier_id]' value='{{ $supplier->id }}'>
                        <input class='form-control' readonly value='{{ $supplier->fantasy_name }}'>
                        {{-- <a href="{{ route('suppliers.create') }}" target="_blank" class="btn btn-outline-secondary" type="button">Novo</a> --}}
                    {{-- </div> --}}
                </div>

                <div class="col-md-3">
                    <label for='products[{{ $id }}][code]' class='form-label'>Código:</label>
                    <input class='form-control' id='products[{{ $id }}][code]' name='products[{{ $id }}][code]' value='{{ $product->cProd }}'>
                </div>
                <div class="col-md-3">
                    <label for='products[{{ $id }}][amount]' class='form-label'>Qtd:</label>
                    <input class='form-control' id='products[{{ $id }}][amount]' name='products[{{ $id }}][amount]' value='{{ $product->qTrib }}'>
                </div>
                <div class="col-md-3">
                    <label for='products[{{ $id }}][value]' class='form-label'>Vl. Unit.:</label>
                    <input class='form-control' id='products[{{ $id }}][value]' name='products[{{ $id }}][value]' value='{{ $product->vUnTrib }}'>
                </div>

                <div class="col-md-3">
                    <label for='products[{{ $id }}][supplier_id]' class='form-label'>Almoxarifado:</label>
                    <div class="input-group mb-3">
                        <select class='form-control' id='products[{{ $id }}][warehouse_id]' name='products[{{ $id }}][warehouse_id]'>
                            <option value=''>-- SELECIONE --</option>
                            @foreach( $warehouses as $warehouse)
                            <option value="{{ $warehouse->id }}">{{ $warehouse->name }}</option>
                            @endforeach
                        </select>
                        <a href="{{ route('warehouses.create') }}" target="_blank" class="btn btn-outline-secondary" type="button">Novo</a>
                    </div>
                </div>

                <hr>

                <div class="col-12">
                    <label for='products[{{ $id }}][from_to]' class='form-label'>De Para:</label>
                    <div class="input-group mb-3">
                        <select class='form-control' id='products[{{ $id }}][from_to]' name='products[{{ $id }}][from_to]'>
                            <option value=''>-- SELECIONE --</option>
                            @foreach( $fromToProducts as $fromToProduct)
                            <option value="{{ $fromToProduct->id }}">{{ $fromToProduct->title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
