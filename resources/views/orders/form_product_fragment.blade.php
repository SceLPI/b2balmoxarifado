<div class="row mt-2">
    <div class="col-md-8">
        <label for='product_id' class='form-label'>Selecione o Produto</label>
        <select class='form-control' id='product_id' name='product_id'>
            <option value=''>-- SELECIONE --</option>
            @foreach ($products as $product )
                <option value='{{ $product->id }}'>{{ $product->title }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-4">
        <label for='amount' class='form-label'>Quantidade</label>
        <input class='form-control' id='amount' name='amount' value=''>
    </div>
</div>
