@extends('layouts.app')


@section('content')

<section class="content container-fluid">
    <div class="card-header d-flex">
        <h3 class="card-title">Sucursal Detalle</h3>
        <div class="ms-auto flex-shrink-0">
            <div class="btn-group">
                <a class="btn btn-secondary" onclick="back()"><i class="fas fa-arrow-left"></i> volver</a>
            </div>
        </div>
    </div>

    <div class="card">
            <!-- ---------------------
                start Timeline
            ---------------- -->
            
            <!-- Tabs -->
            <ul class="nav nav-pills custom-pills" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="pills-profile-tab" data-bs-toggle="pill" href="#last-month" role="tab" aria-controls="pills-profile" aria-selected="true">Perfil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-setting-tab" data-bs-toggle="pill" href="#previous-month" role="tab" aria-controls="pills-setting" aria-selected="false">Configuracion</a>
                </li>
            </ul>
            <!-- Tabs -->
            
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="last-month" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12 d-flex align-items-stretch">
                               
                                    <div class="card w-100">
                                        <div class="card-body">
                                            <!-- title -->
                                            <div class="row">
                                                <div class="col-md-3 col-xs-3 b-r"> <strong>Nombre</strong>
                                                    <br>
                                                    <p class="text-muted">{{ $sucursal->suc_nombre }}</p>
                                                </div>
                                                <div class="col-md-2 col-xs-6 b-r"> <strong>Empresa</strong>
                                                    <br>
                                                    <p class="text-muted">{{ $sucursal->emp_nombre }}</p>
                                                </div>
                                                <div class="col-md-2 col-xs-6 b-r"> 
                                                <strong>Tipo</strong>
                                                    <br>
                                                    <p class="text-muted">
                                                        @switch($sucursal->suc_tipo)
                                                        @case(1)
                                                            Ventas
                                                        @break
                                                        @case(2)
                                                            Bodega
                                                        @break
                                                        @case(3)
                                                            Ventas / Bodega
                                                        @break
                                                        @default
                                                        Otro.
                                                        @break
                                                        @endswitch

                                                    </p>
                                                </div>
                                                <div class="col-md-5 col-xs-6 b-r"> 
                                                <strong>Direccion</strong>
                                                    <br>
                                                    <p class="text-muted">{{ $sucursal->dir_calle.' #'.$sucursal->dir_numero.' ,'.$sucursal->com_nombre.' /'.$sucursal->reg_nombre.' - '.$sucursal->pai_nombre }}</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                            <div class="d-md-flex align-items-center">
                                                <div>
                                                    <h4 class="card-title agregalh">Productos:</h4>
                                                </div>
                                                <div class="ms-auto d-flex align-items-center">
                                                    <div class="dl"></div>
                                                </div>
                                            </div>
                                            <!-- title -->
                        
                                            <div class="table-responsive">
                                                <table id="myTable" class="table tabla-sucursales table-striped table-bordered table-light">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Imagen</th>
                                                            <th>Nombre</th>
                                                            <th>Codigo</th>
                                                            <th>Cantidad</th>
                                                            <th>Estado</th>
                                                            <th class="sorte-false">Acciones</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($productos as $p )
                                    <tr>
                                        <?php 

                                    switch ($p->pro_estado) {
                                        case 1:
                                            
                                            $estado = "badge bg-success";

                                            break;

                                        case 0:

                                            $estado = "badge bg-danger";

                                            break;
                                        
                                        default:
                                            
                                            break;
                                    }

                                    ?>
                                        <td>{{ ++$i }}</td>
                                        <td>
                                            @if($p->pro_imagen)

                                                <img href="{{$p->pro_imagen}}" class="rounded img-fluid"
                                                    width="50px">

                                            @endif
                                        </td>
                                        <td>{{ $p->pro_nombre }}</td>                         
                                        <td>{{ $p->pro_sku }}</td>                         
                                        <td>{{ $p->sto_cantidad }}</td>                 
                                        <td>
                                            <span class="<?=$estado?>">
                                                {{ $p->pro_estado == 1 ? 'Habilitado' : 'Deshabilitado' }}
                                            </span>
                                        </td>          
                                        <td>
@if($p->pro_estado == 1)
                                        <a class="btn btn-sm btn-info"
                                            href="{{ route('usuarios.show',$p->id) }}">
                                            <i class="fas fa-folder-open" title="Detalle"></i>
                                        </a>
                                      
                                        <button type="buttom" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#danger-header-modal" onclick="id_delete({{ $p->id }})"><i class="fa fa-fw fa-trash" title="Eliminar" ></i></button>
                                   
@else
                                    <a class="btn btn-sm btn-info"
                                        href="{{ route('usuarios.show',$p->id) }}">
                                        <i class="fas fa-folder-open" title="Detalle"></i></a>
                                    <button type="buttom" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#success-header-modal" 
                                        onclick="pro_enable({{ $p->id }})">
                                        <i class="fas fa-power-off" title="
                                        Activar"></i>
                                        </button>
@endif
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
                    </div>

                    <div class="tab-pane fade" id="previous-month" role="tabpanel" aria-labelledby="pills-setting-tab">
                        <div class="card-body">
                            <form enctype="multipart/form-data" class=" form-material" id="formu">
                                @csrf
                                <section>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" name="suc_nombre">
                                                    <label><i class="fas fa-location-arrow text-orange fill-white me-2"></i>Nombre</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 text-end control-label col-form-label" for="suc_tipo">Tipo</label>
                                                <div class="col-sm-6">
                                                    <select class="form-select" id="suc_tipo" name="suc_tipo">
                                                    <option>-=Tipo Sucursal=-</option>
                                                    <option value="1" >Venta</option>
                                                    <option value="2" >Bodega</option>
                                                    <option value="3" >Venta/Bodega</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" name="suc_calle">
                                                    <label><i class="fas fa-location-arrow text-orange fill-white me-2"></i>Calle</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 text-end control-label col-form-label" for="id_pais">Pais</label>
                                                <div class="col-sm-6">
                                                    <select class="form-select" id="id_pais" name="id_pais">
                                                    <option >-= Pais =-</option>
                                                    @foreach ($paises as $cat)
                                                        <option value="{{ $cat->id }}">{{$cat->pai_nombre}}</option>
                                                    @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" name="suc_numcalle">
                                                    <label><i class="fas fa-hashtag text-orange fill-white me-2"></i>Numero Calle</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 text-end control-label col-form-label" for="id_region">Region</label>
                                                <div class="col-sm-6">
                                                    <select class="form-select" id="id_region" name="id_region">
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <div class="mb-3">
                                                    <label>Tipo de lugar :</label>
                                                    <div class="c-inputs-stacked">
                                                        <div class="form-check">
                                                            <input type="radio" id="dir_tipo1" name="dir_tipo" class="form-check-input" value="1">
                                                            <label class="form-check-label" for="dir_tipo1">Oficina\Departamento.</label>
                                                        </div>
                                                        <div class="form-check">
                                                        <input type="radio" id="dir_tipo2" name="dir_tipo" class="form-check-input" value="2">
                                                        <label class="form-check-label" for="dir_tipo2">Casa\Bodega\Etc.</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 text-end control-label col-form-label" for="id_comuna">Comuna</label>
                                                <div class="col-sm-6">
                                                    <select class="form-select" id="id_comuna" name="id_comuna">
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" name="suc_numero">
                                                    <label><i class="fas fa-hashtag text-orange fill-white me-2"></i>Telefono</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" name="suc_contacto">
                                                    <label><i class="fas fa-hashtag text-orange fill-white me-2"></i>Contacto</label>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                    <input type="text" id="pro_numoficina" class="form-control" name="suc_numoficina">
                                                    <label><i class="fas fa-building text-orange fill-white me-2"></i>Numero Oficina\Departamento</label>
                                            </div>
                                        </div>
                                        @if(count(EmpresasUser(Auth::user()->id)) > 1)
                                        <div class="col-md-6">
                                            <div class="input-group">
                                                <label class="input-group-text" for="id_empresa"><span class="border-start ps-3">Empresas</span></label>
                                                <select class="form-select" id="id_empresa" name="id_empresa">
                                                <option value="{{ old('id_empresa')  ? @producto['id_empresa'] : ''}}">-=Empresas=-</option>
                                                @foreach (EmpresasUser(Auth::user()->id) as $emp)
                                                    <option value="{{ $emp->id }}">{{$emp->emp_nombre}}</option>
                                                @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        @else
                                        <?php
                                        ;
                                        $empresa = EmpresasUser(Auth::user()->id);
                                       ?>
                                        <input type="hidden" name="id_empresa" value="<?=$empresa[0]->id?>">
                                        @endif 
                                        <div class="p-3 border-top">
                                            <div class="text-end">
                                                <button type="button" id="btn-save" name="btn-save" class="btn btn-success rounded-pill px-4 waves-effect waves-light">Guardar</button>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                    
                                <div class="form-group text-end">
                                    <div class="col-sm-12">
                                        <button class="btn btn-success" id="btn-edit">Editar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
</section>

<script>
    $("#btn-edit").click(async function (e){
        event.preventDefault();
                        
        $.blockUI({
            overlayColor: '#817F7F ',
            type: 'loader',
            state: 'primary',
            message: '<img class="fas fa-spin fa-sync text-white">',
        }, );

        var mensaje = new messageSwal();

        var formEl = document.forms.formu;
        var formData = new FormData(formEl);

        console.log(formData)
        console.log(formEl)

        const request = await fetch("{{ route('sucursales.store') }}", {
                            method: 'POST',
                            body: formData
                        });

        const response = await request.json();

        mensaje.setMessage = response.Message;
        mensaje.setTitle = response.State == 200 ? "Completado!" : "Error!";
        mensaje.setType = response.State == 200 ? "success" : "error";

        mensaje.mostrarMessage('body', function () {

            if (response.State != 200) {
                $.unblockUI();
            } else {
                location.replace("{{ route('sucursales.index') }}")
            }

        });
    });
</script>

<script>
    function back()
    {
        history.back();
    }

    $(function () {
                
        $.ajaxSetup({
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $("#id_region").select2({
            placeholder: "-=Regiones=-",
            allowClear: true,
            dropdownAutoWidth: true,
            width: '100%',
            ajax: {
                url: '{{ route("ajax") }}',
                type: "POST",
                dataType: "json",
                delay: 250,
                data: function (e) {
                    return {
                        q: e.term,
                        id_pais: $("#id_pais option:selected").val(),
                        page: e.page || 1
                    }
                },
                processResults: function (data, params) {
                    params.page = params.page || 1;
                    return {
                        results: data.items,
                        pagination: {
                            more: (params.page * 50) < data.total_count
                        }
                    };
                },
                success: function (data) {
                    console.log(data);
                },
                cache: !0
            },
            escapeMarkup: function (markup) {
                return markup;
            }
        });

        $("#id_comuna").select2({
            placeholder: "-=Comunas=-",
            allowClear: true,
            dropdownAutoWidth: true,
            width: '100%',
            ajax: {
                url: '{{ route("comunas") }}',
                type: "POST",
                dataType: "json",
                delay: 250,
                data: function (e) {
                    return {
                        q: e.term,
                        id_region: $("#id_region option:selected").val(),
                        page: e.page || 1
                    }
                },
                processResults: function (data, params) {
                    params.page = params.page || 1;
                    return {
                        results: data.items,
                        pagination: {
                            more: (params.page * 50) < data.total_count
                        }
                    };
                },
                success: function (data) {
                    console.log(data);
                },
                cache: !0
            },
            escapeMarkup: function (markup) {
                return markup;
            }
        });

        $(".id_pais").change(() => {
            $("#id_region").val(0).change();
            $("#id_comuna").val(0).change();
        });


        });


        $('#suc_telefono').blur(function () {
            if (!validarnumero(this)) {
                $('#suc_telefono').attr('class', 'form-control is-invalid');
                $('#suc_telefono').val('');
            } else {
                $('#suc_telefono').attr('class', 'form-control is-valid');
            }
        });

        function validarnumero(input) {
            var regex = /^\+[\d]+$/;
            if (input.value.match(regex)) {
                return true;
            }
            return false;
        }
       
</script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }});

    

    function tabla() {
      
                // Datatables
        var table = $('#myTable').DataTable({
            response: true,
            autowidth: false,
            "language": {
                "lengthMenu": "Paginas "+
                '<select class="custom-select custom-select-sm form-control form-control-sm"><option value="10" >10</option><option value="25" >25</option><option value="50" >50</option><option value="100" >100</option><option value="-1" >Todos</option></select>'+ "registros por pagina",
                "zeroRecords": "Sin registros",
                "info": "Pagina _PAGE_ de _PAGES_",
                "infoEmpty": "No registros disponibles",
                "infoFiltered": "(filtrado de  _MAX_ registros totales)",
                "search": "Buscar:",
                "paginate": {
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            },
            "dom": 'lf<"table-filter-container">rtipF',
            initComplete: function(settings){
            var api = new $.fn.dataTable.Api( settings );}
            ,
            "buttons": [
                'excel', 'pdf', 'print'
            ],
        })

    }

    tabla();
</script>




@endsection
