@extends('layouts.app')

@section('content')

<!-- -------------------------------------------------------------- -->
<!-- Bread crumb and right sidebar toggle -->
<!-- -------------------------------------------------------------- -->
<div class="page-breadcrumb">
    <div class="row">
        <div class="card card-custom gutter-b" id="kt_blockui_card"></div>
        <div class="col-5 align-self-center">
            <h4 class="page-title">Mantenedor de Clientes</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="dashboard.html">Inicio</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Cliente</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <!-- -------------------------------------------------------------- -->
    <!-- Product Sales -->
    <!-- -------------------------------------------------------------- -->
    <div class="row">
        <div class="col-sm-12">
            <!-- ---------------------
            start Product Sales
        ---------------- -->

                @include('cliente.create')

            <!-- ---------------------
            end Product Sales
        ---------------- -->
        </div>
    </div>

    <div id="danger-header-modal" class="modal fade" tabindex="-1" 
        aria-labelledby="danger-header-modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-colored-header bg-danger text-white">
                    <h4 class="modal-title" id="danger-header-modalLabel">Eliminar Cliente
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h5 class="mt-0">Eliminar Cliente</h5>
                    <p>¿Esta seguro de eliminr el cliente?.</p>
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
                    <h4 class="modal-title" id="success-header-modalLabel">Habilitar Cliente
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h5 class="mt-0">Habilitar Cliente</h5>
                    <p>¿Esta seguro de Habilitar al cliente?.</p>
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
                                    <label for="emp_nombre" class="col-sm-3 text-center control-label">Cliente</label>
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
                                    <label >Tipo:
                                    </label>
                                    <select class="form-select select2" id="cli_tipo" name="cli_tipo">
                                        <option value="0"> -=Tipo=-</option>
                                        <option value="1">Cliente</option>
                                        <option value="2">Prospecto</option>
                                        <option value="3">Cotizando</option>
                                </select>
                                </div>
                            </div>
                            <p></p>
                        </div>
                        <input type="hidden" id="id_modal" name="id" value="">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-danger font-medium waves-effect text-start" data-bs-dismiss="modal">Cerrar</button>
                    <button class="btn btn-light-success font-medium waves-effect text-start" id="btn-modal" data-bs-dismiss="modal">Guardar</button>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-sm-12 d-flex align-items-stretch">
            <!-- ---------------------
            start Products of the Month
        ---------------- -->
            <div class="card w-100">
                <div class="card-body">
                    <!-- title -->
                    <div class="d-md-flex align-items-center">
                        <div>
                            <h4 class="card-title agregalh">Listado de Clientes</h4>
                        </div>
                        <div class="ms-auto d-flex align-items-center">
                            <div class="dl"></div>
                        </div>
                    </div>
                    <!-- title -->

                    <div class="table-responsive">
                        <table id="myTable" class="table tabla-clientes table-striped table-bordered table-light">
                            <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>Rut</th>
                                    <th>Razón social</th>
                                    <th>Correo</th>
                                    <th>Telefono</th>
                                    <th>Direccion</th>
                                    <th>Tipo</th>
                                    <th>Estado</th>
                                    <th class="sorte-false"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($clientes as $u )
                                    <tr>
                                <?php 

                                    switch ($u->cli_estado) {
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
                                        <td>{{ $u->cli_rut }}</td>
                                        <td>{{ $u->cli_nombre }}</td>
                                        <td>{{ $u->cli_mail }}</td>
                                        <td>{{ $u->cli_telefono }}</td> 
                                        <td>{{ $u->dir_calle."  #".$u->dir_numero." , ".$u->com_nombre." , ".$u->reg_nombre." , ".$u->pai_nombre  }}</td>
                                        <td>{{ $u->cli_tipo == 1 ? 'Cliente' : 'Cliente'  }}</td>
                                        <td>
                                            <span class="<?=$estado?>">
                                                {{ $u->cli_estado == 1 ? 'Habilitada' : 'Deshabilitada' }}
                                            </span>
                                        </td>                      
                                        <td>
                                        <div class="btn-group">

@if($u->cli_estado == 1)
                                            <button type="button" class="btn waves-effect waves-dark btn-orange text-white dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="btn-setting">
                                            <i class="fas fa-cog"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end animated flipInY" aria-labelledby="btn-setting">
                                                <a class="dropdown-item" href="{{ route('clientes.show',$u->id) }}">Detalle</a>
                                                <a class="dropdown-item" href="{{ route('clientes.cotizacion',$u->id) }}">Nueva Cotizacion</a>
                                                <a type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#staticBackdrop" onclick="capturar({{$u->id}})" >Cambiar estado</a>
                                            </div>

                                      
                                        <button type="buttom" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#danger-header-modal" onclick="id_delete({{ $u->id }})"><i class="fa fa-fw fa-trash" title="Eliminar" ></i></button>
                                   
@else
                                    <a class="btn btn-sm btn-info"
                                        href="{{ route('categorias.show',$u->id) }}">
                                        <i class="fas fa-folder-open" title="Detalle"></i></a>
                                    <button type="buttom" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#success-header-modal" 
                                        onclick="cli_enable({{ $u->id }})">
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
                message: '<img class="fas fa-spin fa-sync text-white">',
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

            const request = await fetch("{{ route('clientes.store') }}", {
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
                    location.replace("{{ route('clientes.index') }}")
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
                
                mensaje.setTitle = "Completado!"
                mensaje.setMessage = "Cliente Eliminado"
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

    $('#cli_rut').blur(function () {
        if (!Fn.validaRut(this.value)) {
            $('#cli_rut').attr('class', 'form-control is-invalid');
            $('#cli_rut').val('');
        } else {
            $('#cli_rut').attr('class', 'form-control is-valid');
        }
    });

    $('#cli_telefono').blur(function () {
        if (!validarnumero(this)) {
            $('#cli_telefono').attr('class', 'form-control is-invalid');
            $('#cli_telefono').val('');
        } else {
            $('#cli_telefono').attr('class', 'form-control is-valid');
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

    function cli_enable(id)
    {  
        event.preventDefault();

        $.blockUI({
            overlayColor: '#817F7F ',
            type: 'loader',
            state: 'primary',
            message: '<img class="fas fa-spin fa-sync text-white">',
        }, );

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
                $.unblockUI();
                console.log('false')
            });
        });

        $.unblockUI();
    
    }


</script>
<script>
    $(function() {

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

    })
</script>

<script>

    function capturar(e)
    {
        $.ajax({
            url: "{{ route('clientes.ajax') }}",
            type: "POST",
            dataType: "json",
            data:{
                id : e,
                _token: '{!! csrf_token() !!}'
            }}).done(function (res){
                console.log(res.res.cli_tipo)
                $("#mod_nombre").val(res.res.cli_nombre);
                let cli_tipo = '';
                switch(res.res.cli_tipo)
                {
                    case 1:
                        cli_tipo = 'Cliente';
                        console.log('Cliente')

                        break;
                    case 2:
                        cli_tipo = 'Prospecto';
                        console.log('Prospecto')
                        
                        break;
                    case 3:
                        cli_tipo = 'Cotizando';
                        console.log('Cotizando')

                        break;
                    default:
                        cli_tipo ='Administrador';
                        console.log('Administrador')

                    break;
                }
                $("#mod_tipo").val(cli_tipo)
                $("#id_modal").val(res.res.id)

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
            message: '<img class="fas fa-spin fa-sync text-white">',
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

        const request = await fetch("{{ route('cliente.estado') }}", {
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





@endsection
