@extends('layouts.app')

@section('template_title')
    {{ $stock->name ?? 'Show Stock' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Stock</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('stocks.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Id Bodega:</strong>
                            {{ $stock->id_bodega }}
                        </div>
                        <div class="form-group">
                            <strong>Id Producto:</strong>
                            {{ $stock->id_producto }}
                        </div>
                        <div class="form-group">
                            <strong>Sto Cantidad:</strong>
                            {{ $stock->sto_cantidad }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
