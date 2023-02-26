@extends('layouts.app')

@section('content')

<div class="page-breadcrumb">
    <div class="row">
        <div class="card card-custom gutter-b" id="kt_blockui_card"></div>
        <div class="col-5 align-self-center">
            <h4 class="page-title">Mantenedor de Empresas</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="dashboard.html">Inicio</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Empresas</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
                @include('empresa.create')
        </div>
    </div>
    <div id="danger-header-modal" class="modal fade" tabindex="-1" 
        aria-labelledby="danger-header-modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-colored-header bg-danger text-white">
                    <h4 class="modal-title" id="danger-header-modalLabel">Eliminar Empresa
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h5 class="mt-0">Eliminar Empresa</h5>
                    <p>¿Esta seguro de eliminr el empresa?.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light"
                        data-bs-dismiss="modal">Cerrar</button>
                        <input type="hidden" class="form-control" name="iddel" id="iddel" value="">
                    <button type="button" id="btn-delete" class="btn btn-light-danger text-danger font-medium">Eliminar</button>
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
                    <p>¿Esta seguro de Habilitar la categoria?.</p>
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

    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header modal-colored-header bg-primary text-white">
                    <h4 class="modal-title" id="myLargeModalLabel">Cambiar Estado</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form enctype="multipart/form-data" class=" form-material" id="formodal">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3 row">
                                    <label for="emp_nombre" class="col-sm-3 text-center control-label">Empresa</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="mod_nombre" readonly>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="emp_nombre" class="col-sm-3 text-center control-label">Tipo</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="mod_tipo" readonly>
                                    </div>
                                </div>
                            </div>
                            <p>
                                <h5 class="text-muted">Modificar:</h5>
                            </p>
                            <div class="col-md-6">
                                <div class="md-6">
                                    <label for="id_categoria">Tipo:
                                    </label>
                                    <select class="form-select select2" id="emp_tipo" name="emp_tipo">
                                        <option value="0"> -=Tipo=-</option>
                                        <option value="1">Cliente</option>
                                        <option value="2">Prospecto</option>
                                        <option value="3">Cotizando</option>
                                </select>
                                </div>
                            </div>
                            <p></p>
                        </div>
                        <input type="hidden" id="id_modal" class="id_modal" name="id" value="">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-danger font-medium waves-effect text-start" data-bs-dismiss="modal">Cerrar</button>
                    <button class="btn btn-light-success font-medium waves-effect text-start" id="btn-modal" data-bs-dismiss="modal">Guardar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalmetpago" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header modal-colored-header bg-primary text-white">
                    <h4 class="modal-title" id="myLargeModalLabel">Metodos de pago</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" id="btn-clomet2" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form enctype="multipart/form-data" class=" form-material" id="formet">
                        @csrf
                        <input type="hidden" id="id_empre" name="id_empresa">
                        <div class="row">
                            <div class="form-check form-check-inline">
                                @foreach ($metododepagos as $met)
                                <label class="form-check-label" 
                                for="success3-check">{{$met->met_nombre}}
                                </label>
                                <input class="form-check-input success id_metodos" type="checkbox" name="id_metodos[{{$met->id}}]" id="{{$met->id}}">
                                
                                <br>
                                @endforeach
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-danger font-medium waves-effect text-start" id="btn-clomet" data-bs-dismiss="modal">Cerrar</button>
                    <button class="btn btn-light-success font-medium waves-effect text-start" id="btn-metpago" data-bs-dismiss="modal">Guardar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12 d-flex align-items-stretch">

            <div class="card w-100">
                <div class="card-body">
                   
                    <div class="d-md-flex align-items-center">
                        <div>
                            <h4 class="card-title agregalh">Listado de Empresas</h4>
                        </div>
                        <div class="ms-auto d-flex align-items-center">
                            <div class="dl"></div>
                        </div>
                    </div>
                  

                    <div class="table-responsive">
                        <table id="myTable" class="table tabla-empresas table-striped table-bordered table-light">
                           
                            <thead class="thead-light">
                                <tr>
                                    <th style="width: 3%">#</th>
                                    <th style="width: 10%">Rut</th>
                                    <th style="width: 10%">Razón social</th>
                                    <th style="width: 3%">Correo</th>
                                    <th style="width: 3%">Telefono</th>
                                    <th>Direccion</th>
                                    <th>Tipo</th>
                                    <th>Estado</th>
                                    <th class="sort-false"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($empresas as $u )
                                    <tr>
                                <?php 

                                    switch ($u->emp_estado) {
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
                                        <td>{{ $u->emp_rut }}</td>
                                        <td>{{ $u->emp_nombre }}</td>
                                        <td>{{ $u->emp_mail }}</td>
                                        <td>{{ $u->emp_telefono }}</td> 
                                        <td>{{ $u->dir_calle."  #".$u->dir_numero." , ".$u->com_nombre." , ".$u->reg_nombre." , ".$u->pai_nombre  }}</td>
                                        <td>
                                        @switch($u->emp_tipo)
                                            
                                        @case(1)
                                            Cliente
                                            @break
                                        @case(2)
                                            Prospecto
                                            @break
                                        @case(3)
                                            Cotizando
                                            @break
                                        @default
                                            Administrador
                                            @break
                                        @endswitch
                                        </td>
                                        <td>
                                            <span class="<?=$estado?>">
                                                {{ $u->emp_estado == 1 ? 'Habilitada' : 'Deshabilitada' }}
                                            </span>
                                        </td>                      
                                        <td>
@if($u->emp_estado == 1)
                                      
                                        <div class="btn-group">
                                            <button type="button" class="btn waves-effect waves-dark btn-orange text-white dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="btn-setting">
                                            <i class="fas fa-cog"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end animated flipInY" aria-labelledby="btn-setting">
                                                <a class="dropdown-item" href="{{ route('empresas.show',$u->id) }}">Detalle</a>
                                                <a class="dropdown-item" href="{{ route('empresas.cotizacion',$u->id) }}">Nueva Cotizacion</a>
                                                <a type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#staticBackdrop" onclick="capturar({{$u->id}})" >Cambiar estado</a>
                                                @if(count(EmpresasUser(Auth::user()->id))>1)
                                                <a type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalmetpago" onclick="empmetpago({{$u->id}})" >Metodos de pago</a>
                                              
                                                @endif
                                            </div>
                                            
                                       
                                        <button type="buttom" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#danger-header-modal" onclick="id_delete({{ $u->id }})"><i class="fa fa-fw fa-trash" title="Eliminar" ></i></button>
                                   
@else
                                    <a class="btn btn-sm btn-info"
                                        href="{{ route('empresas.show',$u->id) }}">
                                        <i class="fas fa-folder-open" title="Detalle"></i></a>
                                    <button type="buttom" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#success-header-modal" 
                                        onclick="emp_enable({{ $u->id }})">
                                        <i class="fas fa-power-off" title="
                                        Activar"></i>
                                        </button>
@endif
                                    </div>
                                    </td>
                                    </tr>
@endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
<script>
    var form = $(".validation-wizard").show();

    $(".validation-wizard").steps({
        headerTag: "h6",
        bodyTag: "section",
        transitionEffect: "fade",
        titleTemplate: '<span class="step">#index#</span> #title#',
        button: "a",
        labels: {
            finish: "Guardar",
            previous: "Anterior",
            next: "Siguiente"
        },
        onStepChanging: function (event, currentIndex, newIndex) {
            return currentIndex > newIndex || !(3 === newIndex && Number($("#age-2").val()) <
                18) && (currentIndex < newIndex && (form.find(".body:eq(" + newIndex +
                    ") label.error").remove(), form.find(".body:eq(" + newIndex +
                    ") .error").removeClass("error")), form.validate().settings.ignore =
                ":disabled,:hidden", form.valid())
        },
        onFinishing: function (event, currentIndex) {
            return form.validate().settings.ignore = ":disabled", form.valid()

        },
        onFinished: async function (event, currentIndex) {

            event.preventDefault();
            
            $.blockUI({
                overlayColor: '#817F7F ',
                type: 'loader',
                state: 'primary',
                message: '<button class="btn btn-primary" type="button" disabled><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>Cargando...</button>',
            }, );

            var mensaje = new messageSwal();

            var formEl = document.forms.formu;
            var formData = new FormData(formEl);
            var csrf = $("input[name='csrf']").val();

            console.log(formData)
            console.log(formEl)

            if (!mensaje.messageExist()) {

            } else {
                mensaje.setTitle = "Error!";
                mensaje.setType = 'error';
                mensaje.mostrarMessage('body');
            }

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

        }
    });


    $(".validation-wizard").validate({
        ignore: "input[type=hidden]",
        errorClass: "text-danger",
        successClass: "text-success",
        highlight: function (element, errorClass) {
            $(element).removeClass(errorClass)
        },
        unhighlight: function (element, errorClass) {
            $(element).removeClass(errorClass)
        },
        errorPlacement: function (error, element) {
            error.insertAfter(element)
        },
        rules: {
            email: {
                email: !0
            }
        }
    })

</script>

<script>
    $(".bt-switch input[type='checkbox'], .bt-switch input[type='radio']").bootstrapSwitch();
    var radioswitch = function () {
        var bt = function () {
            $(".radio-switch").on("switch-change", function () {

                    $(".radio-switch").bootstrapSwitch("toggleRadioState")
                }),
                $(".radio-switch").on("switch-change", function () {

                    $(".radio-switch").bootstrapSwitch("toggleRadioStateAllowUncheck")
                }),
                $(".radio-switch").on("switch-change", function () {

                    $(".radio-switch").bootstrapSwitch("toggleRadioStateAllowUncheck", !1)
                })
        };
        return {
            init: function () {
                bt()
            }
        }
    };

    function id_delete(id)
    {
        event.preventDefault();

        $.blockUI({
            overlayColor: '#817F7F ',
            type: 'loader',
            state: 'primary',
            message: '<button class="btn btn-primary" type="button" disabled><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>Cargando...</button>',
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

        $("#btn-delete").click(function ()
        {
            $.ajax({
            url: "{{ route('empresas.delete') }}",
            type: "POST",
            dataType: "json",
            data:{
                id : id,
                _token: '{!! csrf_token() !!}'
            }}).done(function (res){
                
                mensaje.setTitle = "Completado!"
                mensaje.setMessage = "Empresa Eliminado"
                mensaje.setType = "success"
                mensaje.mostrarMessage('body');
                $.unblockUI();
                window.location.reload(); 

            }).fail(function (res){
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
            placeholder: "-=Regiones=-",allowClear: true,
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
            placeholder: "-=Comunas=-",allowClear: true,
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

        $("#id_pais").change(() => {
            $("#id_region").val(0).change();
            $("#id_comuna").val(0).change();
        });

        var table = $("#myTable").DataTable({
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
            dom: 'Bfrtip',
                buttons: [
                    {
                        extend:'pdf',
                        text: '',
                        footer:true,
                        exportOptions:{
                            columns: "thead th:not(.sort-false)"
                        }
                    },
                    {
                        extend:'excel',
                        text: '',
                        footer:true,
                        exportOptions:{
                            columns: "thead th:not(.sort-false)"
                        }
                    },
                    {
                        extend:'print',
                        text: '',
                        footer:true,
                        exportOptions:{
                            columns: "thead th:not(.sort-false)"
                        }
                    }

                ]
            
        });
        $('.buttons-print, .buttons-pdf, .buttons-excel').addClass('btn btn-orange text-white');
        $('.buttons-excel').addClass('mdi mdi-file-excel');
        $('.buttons-print').addClass('mdi mdi-printer');
        $('.buttons-pdf').addClass('mdi mdi-file-pdf');
        
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

    function emp_enable(id)
    {  
        event.preventDefault();

        $.blockUI({
            overlayColor: '#817F7F ',
            type: 'loader',
            state: 'primary',
            message: '<button class="btn btn-primary" type="button" disabled><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>Cargando...</button>',
        }, );

        $("#btn-enable").click(function ()
        {
            $.ajax({
            url: "{{ route('empresas.enable') }}",
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


</script>

<script>
    function capturar(e)
    {
        $.ajax({
            url: "{{ route('empresa.ajax') }}",
            type: "POST",
            dataType: "json",
            data:{
                id : e,
                _token: '{!! csrf_token() !!}'
            }}).done(function (res){
                console.log(res.res.emp_tipo)
                $("#mod_nombre").val(res.res.emp_nombre);
                let emp_tipo = '';
                switch(res.res.emp_tipo)
                {
                    case 1:
                        emp_tipo = 'Cliente';
                        console.log('Cliente')

                        break;
                    case 2:
                        emp_tipo = 'Prospecto';
                        console.log('Prospecto')
                        
                        break;
                    case 3:
                        emp_tipo = 'Cotizando';
                        console.log('Cotizando')

                        break;
                    default:
                        emp_tipo ='Administrador';
                        console.log('Administrador')

                    break;
                }
                $("#mod_tipo").val(emp_tipo)
                $(".id_modal").val(res.res.id)

            }).fail(function (res){
                console.log('false')
            });

        document.getElementById("samedata-modal").value=e;
    }

</script>

<script>

    $("#btn-modal").click( async function (e){
        e.preventDefault();

        $.blockUI({
            overlayColor: '#817F7F ',
            type: 'loader',
            state: 'primary',
            message: '<button class="btn btn-primary" type="button" disabled><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>Cargando...</button>',
        }, );

        var mensaje = new messageSwal();

        var formEl = document.forms.formodal;
        var formData = new FormData(formEl);
        var csrf = $("input[name='csrf']").val();

        if (!mensaje.messageExist()) {
        } 
        else 
        {
            mensaje.setTitle = "Error!";
            mensaje.setType = 'error';
            mensaje.mostrarMessage('body');
        }

        const request = await fetch("{{ route('empresa.estado') }}", {
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
            location.reload();
        }

        });

    });

</script>

<script>
    function empmetpago(id)
    {
        $.ajax({
            url: "{{ route('empresa.ajax_empmetpago') }}",
            type: "POST",
            dataType: "json",
            data:{
                id : id,
                _token: '{!! csrf_token() !!}'
            }}).done(function (res){
           
                res.forEach(empmet);

            }).fail(function (res){
                console.log('false')
            });
        $("#id_empre").val(id)
        
    }

    function empmet(item, index, arr){
        $("#"+arr[index].id).prop("checked",true).change();
        $("#"+arr[index].id).val(arr[index].estado);
    }

    

    $("#btn-metpago").click(async function(){
    {
        event.preventDefault();

        $.blockUI({
            overlayColor: '#817F7F ',
            type: 'loader',
            state: 'primary',
            message: '<button class="btn btn-primary" type="button" disabled><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>Cargando...</button>',
        }, );

        var mensaje = new messageSwal();

        var formEl = document.forms.formet;
        var formData = new FormData(formEl);
        var csrf = $("input[name='csrf']").val();

        console.log(formData)
        console.log(formEl)

        if (!mensaje.messageExist()) {

        } else {
            mensaje.setTitle = "Error!";
            mensaje.setType = 'error';
            mensaje.mostrarMessage('body');
        }

        const request = await fetch("{{ route('empresa.empmetpago') }}", {
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

    }
    })
    
    $("#btn-clomet").click(function(){
        $("#formet")[0].reset();
    });
    $("#btn-clomet2").click(function(){
        $("#formet")[0].reset();
    });

</script>
@endsection
