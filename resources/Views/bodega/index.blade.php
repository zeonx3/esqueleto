@extends('layouts.app')

@section('template_title')
    Bodega
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Bodega') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('bodegas.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        
										<th>N°</th>
										<th>Bodega</th>
										<th>Estado</th>
										<th>Tipo Retiro</th>
										<th>Empresa</th>
										<th>Direccion</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $n = 1 ;
                                    
                                    ?>
                                    @foreach ($bodegas as $bodega)
                                    
                                        <tr>
                                           
                                            <td>{{ $n++ }}</td>
											<td>{{ $bodega->bod_nombre }}</td>
											<td>{{ $bodega->bod_estado == 1 ? 'Activo'  : 'Desactivado' }}</td>
											<td>{{ $bodega->bod_retiro == 1 ? 'Retira en tienda' : 'Despacho'}}</td>
											<td>{{ $bodega->emp_nombre }}</td>
											<td>{{ $bodega->dir_calle.' # '.$bodega->dir_numero.' /'.$bodega->com_nombre.'/'. $bodega->reg_nombre.'/'.$bodega->pai_nombre }}</td>

                                            <td>
                                                <form action="{{ route('bodegas.destroy',$bodega->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('bodegas.show',$bodega->id) }}"><i class="fa fa-fw fa-eye"></i> Detalle</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('bodegas.edit',$bodega->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Eliminar</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
@endsection
