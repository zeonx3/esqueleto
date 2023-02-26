@extends('layouts.app')

@section('template_title')
{{ $producto->pro_nombre ?? 'Show Producto' }}
@endsection

@section('content')

<section class="content container-fluid">
    <div class="card-header d-flex">
        <h3 class="card-title">Detalle</h3>
        <div class="ms-auto flex-shrink-0">
        <div class="btn-group">
            <a class="btn btn-secondary" href="{{ route('productos.index') }}"><i class="fas fa-arrow-left"></i> volver</a>
        </div>
    </div>
    </div>
    <div class="row">

        <div class="col-lg-4 col-xlg-3 col-md-5">
            <!-- ---------------------
                    start Hanna Gover
                ---------------- -->
            <div class="card">
                <div class="card-body">
                    <center class="mt-4"> <img src="/storage/{{ $producto->pro_imagen }}"
                            alt="{{ $producto->pro_nombre }}" class="rounded img-fluid" width="200px">
                        <h4 class="card-title mt-2">{{ $producto->pro_nombre }}</h4>
                        <h6 class="card-subtitle">{{ $producto->cat_nombre }}</h6>
                    </center>
                </div>
                <div>
                    <hr>
                </div>
                <div class="card-body"> <small class="text-muted">Unidad de Medida</small>
                    <h6>{{ $producto->unid_nombre.' | '.$producto->unid_nombre_corto }}
                    </h6> <small class="text-muted pt-4 db">Tipo Producto</small>
                    <h6>{{ $producto->pro_tipo ? 'Base' : 'Kit' }}
                    </h6> <small class="text-muted pt-4 db">SKU</small>
                    <h6>{{ $producto->pro_sku }}</h6>
                    <small class="text-muted pt-4 db">Codigo de Barra</small>
                    <h6>{{ $producto->pro_codbarra }}</h6>
                </div>
            </div>
            <!-- ---------------------
                    end Hanna Gover
                ---------------- -->
        </div>

        <div class="col-lg-8 col-xlg-9 col-md-7">
            <!-- ---------------------
                start Timeline
            ---------------- -->
            <div class="card">
                <!-- Tabs -->
                
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3 col-xs-6 b-r"> <strong>Neto</strong>
                                <br>
                                <p class="text-muted">{{ '$'.' '.$producto->pro_neto }}</p>
                            </div>
                            <div class="col-md-3 col-xs-6 b-r"> <strong>Bruto</strong>
                                <br>
                                <p class="text-muted">{{ '$'.' '.$producto->pro_bruto }}</p>
                            </div>
                            <div class="col-md-3 col-xs-6 b-r"> <strong>Costo</strong>
                                <br>
                                <p class="text-muted">{{ '$'.' '.$producto->pro_costo }}</p>
                            </div>
                        </div>
                        <hr>
                        <p class="mt-4">{{ $producto->pro_descripcion }}</p>

                        </hr>
                    </div>
               
            </div>
            <!-- ---------------------
                end Timeline
            ---------------- -->
        </div>
    </div>
</section>
@endsection
