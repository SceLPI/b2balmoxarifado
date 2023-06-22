<div class="row">
    <div class="col-md-8">
        <label for='product_id' class='form-label'>Selecione o Produto</label>
        <select class='form-control' id='product_id' name='product_id'>
            <option value=''>-- SELECIONE --</option>
            @foreach ($model->entities as $relationshipModel )
                <option @if ($relationshipModel->id == $model->entity_id) selected  @endif value='{{ $relationshipModel->id }}'>{{ $relationshipModel->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-4">
        <label for='amount' class='form-label'>Quantidade</label>
        <input class='form-control' id='amount' name='amount' value='{{ $model->ordered_by }}'>
    </div>
</div>
