@extends('layouts.app')

<?php


?>

@section('template_title')
{{$bodega[0]->bod_nombre}}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Bodega</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('bodegas.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre Bodega:</strong>
                            {{                     $bodega[0]->bod_nombre }}
                        </div>
                        <div class="form-group">
                            <strong>
                                Estado de Bodega:</strong>
                            {{$bodega[0]->bod_estado == 1 ? 'Activo'  : 'Desactivado' }}
                        </div>
                        <div class="form-group">
                            <strong>Tipo de Retiro:</strong>
                            {{ $bodega[0]->bod_retiro == 1 ? 'Retira en tienda' : 'Despacho' }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre de la Empresa:</strong>
                            {{ $bodega[0]->emp_nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Id Direccion:</strong>
                            {{ $bodega[0]->id_direccion }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
