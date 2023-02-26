@extends('layouts.app')


@section('content')

<section class="content container-fluid">
    <div class="card-header d-flex">
        <h3 class="card-title">Detalle</h3>
        <div class="ms-auto flex-shrink-0">
            <div class="btn-group">
                <a class="btn btn-secondary" onclick="back()"><i class="fas fa-arrow-left"></i> volver</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 col-xlg-3 col-md-5">
            <div class="card">
                <div class="card-body">
                    <center class="mt-4"> <img src="{{ $empresa->emp_logo}}"class="rounded img-fluid" width="80px"></center>
                    <h4>{{$empresa->emp_nombre}}</h4>
                    <p>
                    {{$empresa->emp_mail}}<br>
                        {{$empresa->emp_giro." | Rut:".$empresa->emp_rut." | Contacto:".$empresa->emp_contacto}}
                    </p>
                </div>
            </div>
            <div class="w-100 datos-empresa">
                <div class="card w-100">
                    <div class="card-body border-bottom">
                        <h4 class="card-title mb-0">Datos empresa</h4>
                    </div>
                    <div class="p-3 pb-0">
                        <div class="row">
                            <div class="col-3 col-xl-2 col-md-2 d-flex align-items-center">
                                <div class="bg-light-primary text-primary d-inline-block px-0 py-3 rounded">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                            </div>
                            <div class="col-7 col-xl-8 col-md-8 d-flex align-items-center">
                                <div>
                                    <div class="card-title fs-4 link lh-sm">Dirección principal</div>
                                    <h6 class="card-subtitle mt-2 mb-0 fw-normal">{{$empresa->dir_calle." #".$empresa->dir_numero.", ".$empresa->com_nombre." - ".$empresa->reg_nombre}}</h6>
                                </div>
                            </div>
                            <div class="col-2 col-xl-2 col-md-2 d-flex align-items-center">
                                <div class="text-secundary d-inline-block px-4 py-3">
                                    <i class="far fa-copy"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card w-100">
                    <div class="p-3 pb-0">
                        <div class="row">
                            <div class="col-3 col-xl-2 col-md-2 d-flex align-items-center">
                                <div class="bg-light-primary text-primary d-inline-block px-0 py-3 rounded">
                                    <i class="fas fa-envelope"></i>
                                </div>
                            </div>
                            <div class="col-7 col-xl-8 col-md-8 d-flex align-items-center">
                                <div>
                                    <div class="card-title fs-4 link lh-sm">Correo contacto</div>
                                    <h6 class="card-subtitle mt-2 mb-0 fw-normal">{{$empresa->emp_mail}}</h6>
                                </div>
                            </div>
                            <div class="col-2 col-xl-2 col-md-2 d-flex align-items-center">
                                <div class="text-secundary d-inline-block px-4 py-3">
                                    <i class="far fa-copy"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card w-100">
                    <div class="p-3 pb-0">
                        <div class="row">
                            <div class="col-3 col-xl-2 col-md-2 d-flex align-items-center">
                                <div class="bg-light-primary text-primary d-inline-block px-0 py-3 rounded">
                                    <i class="fas fa-phone"></i>
                                </div>
                            </div>
                            <div class="col-7 col-xl-8 col-md-8 d-flex align-items-center">
                                <div>
                                    <div class="card-title fs-4 link lh-sm">Teléfono contacto</div>
                                    <h6 class="card-subtitle mt-2 mb-0 fw-normal">{{$empresa->emp_telefono}}</h6>
                                </div>
                            </div>
                            <div class="col-2 col-xl-2 col-md-2 d-flex align-items-center">
                                <div class="text-secundary d-inline-block px-4 py-3">
                                    <i class="far fa-copy"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
        <div class="col-lg-8 col-xlg-9 col-md-7">
          
            <div class="card">
                <div id="danger-header-modal" class="modal fade" tabindex="-1" aria-labelledby="danger-header-modalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header modal-colored-header bg-danger text-white">
                                <h4 class="modal-title" id="danger-header-modalLabel">Deshabilitar 
                                    Empresa
                                </h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <h5 class="mt-0">Deshabilitar Empresa</h5>
                                <p>¿Esta seguro de deshabilitar la Empresa?.</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light"
                                    data-bs-dismiss="modal">Cerrar</button>
                                    <input type="hidden" class="form-control" name="iddel" id="iddel" value="">
                                <button type="button" id="btn-delete" class="btn btn-light-danger text-danger font-medium">Deshabilitar</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="success-header-modal" class="modal fade" tabindex="-1" aria-labelledby="success-header-modalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header modal-colored-header bg-success text-white">
                                <h4 class="modal-title" id="success-header-modalLabel">Habilitar Empresa
                                </h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <h5 class="mt-0">Habilitar Empresa</h5>
                                <p>¿Esta seguro de habilitar la Empresa?.</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light"
                                    data-bs-dismiss="modal">Cerrar</button>
                                    <input type="hidden" class="form-control" name="iddel" id="iddel" value="">
                                <button type="button" id="btn-enable" class="btn btn-light-success text-success font-medium">Habilitar</button>
                            </div>
                        </div>
                    </div>
                </div>

                <ul class="nav nav-pills custom-pills" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-profile-tab" data-bs-toggle="pill" href="#last-month" role="tab" aria-controls="pills-profile" aria-selected="true">Perfil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-setting-tab" data-bs-toggle="pill" href="#previous-month" role="tab" aria-controls="pills-setting" aria-selected="false">Configuracion</a>
                    </li>
                </ul>  

                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="last-month" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <div class="card-body">
                        @if($empresa->emp_tipo == 1)
                            <div class="row">
                                <div class="col-md-3 col-xs-3 b-r"> <strong>Razon social</strong>
                                    <br>
                                    <p class="text-muted">{{ $empresa->emp_nombre }}</p>
                                </div>
                                <div class="col-md-3 col-xs-6 b-r"> <strong>RUT</strong>
                                    <br>
                                    <p class="text-muted">{{ $empresa->emp_rut }}</p>
                                </div>
                                <div class="col-md-3 col-xs-6 b-r"> 
                                    <strong>Contacto</strong>
                                        <br>
                                        <p class="text-muted">{{ $empresa->emp_contacto }}</p>
                                    </div>
                                <div class="col-md-3 col-xs-6 b-r"> 
                                <strong>Giro</strong>
                                    <br>
                                    <p class="text-muted">{{ $empresa->emp_giro }}</p>
                                </div>
                                <div class="col-md-3 col-xs-6 b-r"> 
                                <strong>Correo</strong>
                                    <br>
                                    <p class="text-muted">{{ $empresa->emp_mail }}</p>
                                </div>
                            </div>
                            <hr>
                            @if(EmpresaUsiario(Auth::user()->id) != 13)
                            <div class="card-body">
                                <h4 class="card-title">Clientes</h4>
                            </div>
                            <div class="table-respondive" >
                                <table class="table customize-table mb-0 v-middle">
                                    <thead class="table-light" >
                                        <tr>
                                            <th class="border-bottom border-top" >N°</th>
                                            <th class="border-bottom border-top" >Nombre</th>
                                            <th class="border-bottom border-top" >Rut</th>
                                            <th class="border-bottom border-top" >Estado</th>
                                            <th class="border-bottom border-top">Acciones</th>
                                        </tr>
                                    </thead>
                                    <?php $i = 1;?>
                                    @foreach ( $clientes as $cli )
                                    
                                    <tbody>
                                        <?php 

                                        switch ((int)$cli->cli_estado) 
                                        {
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
                                        <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$cli->cli_nombre}}</td>
                                        <td>{{$cli->cli_rut}}</td>
                                        <td> <span class="<?=$estado?>">
                                            <?=$cli->cli_estado == 1 ? 'Activo' : 'Deshabilitado'?></span>
                                        </td>
                                        <td>
                                            @if($cli->cli_estado == 1)
                                            <a class="btn btn-sm btn-info" href="{{ route('clientes.show',$cli->id) }}">
                                                <i class="fas fa-folder-open" title="Detalle"></i>
                                            </a>
                                            <button type="buttom" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#danger-header-modal" onclick="cli_delete({{ $cli->id }})"><i class="fa fa-fw fa-trash" title="Deshabilitar" ></i></button>
                                            @else
                                            <a class="btn btn-sm btn-info" href="{{ route('clientes.show',$cli->id) }}">
                                            <i class="fas fa-folder-open" title="Detalle"></i></a>
                                            <button type="buttom" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#success-header-modal" 
                                            onclick="cli_enable({{ $cli->id }})">
                                            <i class="fas fa-power-off" title="
                                            Activar"></i>
                                            </button>
                                            @endif
                                        </td>
                                        </tr> 
                                    </tbody>
                                    @endforeach
                                </table>
                            </div>
                            @else

                            @endif
                        
                            
                        @else
                            <div class="row">
                                <div class="col-sm-12 d-flex align-items-stretch">
                                
                                    <div class="card w-100">
                                        <div class="card-body">
                                            <!-- title -->
                                            <div class="d-md-flex align-items-center">
                                                <div>
                                                    <h4 class="card-title agregalh">Cotizaciones:</h4>
                                                </div>
                                                <div class="ms-auto d-flex align-items-center">
                                                    <div class="dl"></div>
                                                </div>
                                            </div>
                                            <!-- title -->
                        
                                            <div class="table-responsive">
                                                <table class="table tabla-empresas table-striped table-bordered table-light">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Realizada por</th>
                                                            <th>Fecha Creacion</th>
                                                            <th>Ultimo Cambio</th>
                                                            <th>Estado</th>
                                                            <th class="sorte-false"></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($cotizaciones as $c )
                                                            <tr>
                                                        <?php 
                        
                                                            switch ($c->cot_estado) {
                                                                case 1:
                                                                    
                                                                    $estado = "badge bg-success";
                        
                                                                    break;
                        
                                                                case 2:
                        
                                                                    $estado = "badge bg-warning";
                        
                                                                    break;
                                                                
                                                                default:
                                                                    $estado = "badge bg-danger";
                                                                    
                                                                    break;
                                                            }
                        
                                                        ?>
                                                                <td>{{ $c->id }}</td>
                                                                <td>{{ $c->usu_nombre.'  '.$c->usu_appaterno }}</td>
                                                                <td>{{ $c->created_at }}</td>
                                                                <td>{{ $c->updated_at }}</td> 
                                                                <td>
                                                                    <span class="<?=$estado?>">
                                                                        {{ $c->cot_estado == 1 ? 'Finalizada' : 'Proceso' }}
                                                                    </span>
                                                                </td>                      
                                                                <td>
                        
                                                                <a class="btn btn-sm btn-info"
                                                                    href="{{ route('cotizaciones.show',$c->id) }}">
                                                                    <i class="fas fa-folder-open" title="Detalle"></i>
                                                                </a>
                                                                <button type="buttom" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#danger-header-modal" onclick="id_delete({{ $c->id }})"><i class="fa fa-fw fa-trash" title="Eliminar" ></i></button>
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
                        @endif
                        </div>
                    </div>

                    <div class="tab-pane fade" id="previous-month" role="tabpanel" aria-labelledby="pills-setting-tab">
                        <div class="card-body">
                            <form enctype="multipart/form-data" class=" form-material" id="formu">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" required id="emp_rut" class="form-control" name="emp_rut" value="<?=$empresa->emp_rut ? $empresa->emp_rut : old('emp_rut') ?>">
                                            <label><i class="fas fa-address-book text-orange fill-white me-2"></i>RUT Empresa</label>
                                        </div>
                                        <div class="invalid-feedback">El rut debe ser ingresado sin puntos y con guión.</div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" name="emp_nombre" autofocus required value='<?=$empresa->emp_nombre ? $empresa->emp_nombre : old('emp_nombre')?>'>
                                            <label><i class="fas fa-address-book text-orange fill-white me-2"></i>Razón social</label>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" name="emp_giro" value='<?=$empresa->emp_giro ? $empresa->emp_giro : old('emp_nomfanta')?>'>
                                            <label><i class="fas fa-address-book text-orange fill-white me-2"></i>Giro</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control"  name="emp_telefono" id="emp_telefono" value='<?=$empresa->emp_telefono ? $empresa->emp_telefono : old('emp_telefono')?>'>
                                            <label><i class="fas fa-phone text-orange fill-white me-2"></i>Telefono</label>
                                            <div class="invalid-feedback">El teléfono ingresado debe tener el formato +56978953712.</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="mail" class="form-control" required  name="emp_mail" value='<?=$empresa->emp_mail ? $empresa->emp_mail : old('emp_mail')?>'>
                                            <label><i class="far fa-envelope text-orange fill-white me-2"></i>Correo Electronido</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" required  name="emp_contacto" value='<?=$empresa->emp_contacto? $empresa->emp_contacto : old('emp_contacto')?>'>
                                            <label><i class="far  fa-address-book text-orange fill-white me-2"></i>Cotacto</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group mb-3">
                                            <label class="input-group-text" for="id_pais"><span class="border-start ps-3">Pais</span></label>
                                                <select class="form-select select2" id="id_pais" name="id_pais">
                                            <option value="">-=Pais=-</option>
                                            @foreach ($pais as $p)
                                                <option value="{{ $p['id'] }}">{{$p['pai_nombre']}}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group mb-3">
                                                <label class="input-group-text" for="id_region"><span class="border-start ps-3">Region</span></label>
                                                <select class="form-select select2 " id="id_region" name="id_region">
                                                </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group mb-3">
                                                <label class="input-group-text" for="id_comuna"><span class="border-start ps-3">Comuna</span></label>
                                                <select class="form-select select2 " id="id_comuna" name="id_comuna">
                                                </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                                <input type="text" class="form-control" name="emp_calle" value='<?=$empresa->dir_calle ? $empresa->dir_calle : old('emp_calle')?>'>
                                                <label><i class="fas fa-location-arrow text-orange fill-white me-2"></i><span class="border-start ps-3">Calle</span></label>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-floating mb-3">
                                                <input type="text" class="form-control" name="emp_numcalle" value='<?=$empresa->dir_numero ? $empresa->dir_numero : old('emp_numcalle')?>'>
                                                <label><i class="fas fa-hashtag text-orange fill-white me-2"></i><span class="border-start ps-3">Numero Calle</span></label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" type="file" name="emp_logo" id="formFile" >
                                            <label for="formFile" class="form-label"><i class="fas fa-address-book text-orange fill-white me-2"></i>Logo Empresa</label>
                                        </div>
                                    </div>
                                    <input type="hidden" name="emp_id" value="<?=$empresa->id ? $empresa->id : 0 ?>">
                                </div> 
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

        const request = await fetch("{{ route('empresas.store') }}", {
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
                location.replace("{{ route('empresas.index') }}")
            }

        });
    });
</script>

<script>
    function back()
    {
        history.back();
    }

    function cli_delete(id)
        {
            event.preventDefault();

            $.blockUI({
                overlayColor: '#817F7F ',
                type: 'loader',
                state: 'primary',
                message: '<img class="fas fa-spin fa-sync text-white">',
            }, );

            $("#btn-delete").click(function ()
            {
                $.ajax({
                url: "{{ route('clientes.delete') }}",
                type: "POST",
                dataType: "json",
                data:{
                    id : id,
                    _token: '{!! csrf_token() !!}'
                }}).done(function (res){
                    
                    $.unblockUI();
                    window.location.reload(); 

                }).fail(function (res){
                    $.unblockUI();
                    console.log('false')
                });
            });

            $.unblockUI();

        }

    function cli_enable(id)
    {  
       event.preventDefault();

        $.blockUI({
            overlayColor: '#817F7F ',
            type: 'loader',
            state: 'primary',
            message: '<img class="fas fa-spin fa-sync text-white">',
        }, );

        var mensaje = new messageSwal();

        if (!mensaje.messageExist()) {
        } 
        else 
        {
            mensaje.setTitle = "Error!";
            mensaje.setType = 'error';
            mensaje.mostrarMessage('body');
        }

        $("#btn-enable").click(function ()
        {
            $.ajax({
            url: "{{ route('clientes.enable') }}",
            type: "POST",
            dataType: "json",
            data:{
                id : id,
                _token: '{!! csrf_token() !!}'
            }}).done(function (res){
                
                $.unblockUI();
                window.location.reload(); 

            }).fail(function (res){
                mensaje.setTitle = "Error!"
                mensaje.setMessage = "Cliente deshabilitado!."
                mensaje.setType = "error"
                mensaje.mostrarMessage('body');
                $.unblockUI();
                console.log('false')
            });
        });

        $.unblockUI();
       
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

        $('#emp_rut').blur(function () {
            if (!Fn.validaRut(this.value)) {
                $('#emp_rut').attr('class', 'form-control is-invalid');
                $('#emp_rut').val('');
            } else {
                $('#emp_rut').attr('class', 'form-control is-valid');
            }
        });

        $('#emp_telefono').blur(function () {
            if (!validarnumero(this)) {
                $('#emp_telefono').attr('class', 'form-control is-invalid');
                $('#emp_telefono').val('');
            } else {
                $('#emp_telefono').attr('class', 'form-control is-valid');
            }
        });

        function validarnumero(input) {
            var regex = /^\+[\d]+$/;
            if (input.value.match(regex)) {
                return true;
            }
            return false;
        }

        var Fn = {
            // Valida el rut con su cadena completa "XXXXXXXX-X"
        validaRut: function (rutCompleto) {
            if (!/^[0-9]+[-|‐]{1}[0-9kK]{1}$/.test(rutCompleto))
                return false;
            var tmp = rutCompleto.split('-');
            var digv = tmp[1];
            var rut = tmp[0];
            if (digv == 'K') digv = 'k';
            return (Fn.dv(rut) == digv);
        },
        dv: function (T) {
            var M = 0,
                S = 1;
            for (; T; T = Math.floor(T / 10))
                S = (S + T % 10 * (9 - M++ % 6)) % 11;
            return S ? S - 1 : 'k';
        }
        }

       
</script>

<script>
    $(function(){

        $(".table").DataTable({
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
        }
    });
    })
</script>


@endsection
