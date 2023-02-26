<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('id_bodega') }}
            {{ Form::text('id_bodega', $stock->id_bodega, ['class' => 'form-control' . ($errors->has('id_bodega') ? ' is-invalid' : ''), 'placeholder' => 'Id Bodega']) }}
            {!! $errors->first('id_bodega', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('id_producto') }}
            {{ Form::text('id_producto', $stock->id_producto, ['class' => 'form-control' . ($errors->has('id_producto') ? ' is-invalid' : ''), 'placeholder' => 'Id Producto']) }}
            {!! $errors->first('id_producto', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('sto_cantidad') }}
            {{ Form::text('sto_cantidad', $stock->sto_cantidad, ['class' => 'form-control' . ($errors->has('sto_cantidad') ? ' is-invalid' : ''), 'placeholder' => 'Sto Cantidad']) }}
            {!! $errors->first('sto_cantidad', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>