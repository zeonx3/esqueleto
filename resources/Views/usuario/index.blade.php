@extends('layouts.app')

@section('content')

<!-- -------------------------------------------------------------- -->
<!-- Bread crumb and right sidebar toggle -->
<!-- -------------------------------------------------------------- -->
<div class="page-breadcrumb">
    <div class="row">
        <div class="card card-custom gutter-b" id="kt_blockui_card"></div>
        <div class="col-5 align-self-center">
            <h4 class="page-title">Mantenedor de Usuarios</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="dashboard.html">Inicio</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Usuarios</li>
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
    <div id="danger-header-modal" class="modal fade" tabindex="-1" 
    aria-labelledby="danger-header-modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-colored-header bg-danger text-white">
                    <h4 class="modal-title" id="danger-header-modalLabel">Eliminar Usuario
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h5 class="mt-0">Eliminar Usuario</h5>
                    <p>¿Esta seguro de eliminr el usuario?.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light"
                        data-bs-dismiss="modal">Cerrar</button>
                        <input type="hidden" class="form-control" name="iddel" id="iddel" value="">
                    <button type="button" id="btn-deletepro" class="btn btn-light-danger text-danger font-medium">Eliminar</button>
                </div>
            </div>
        </div>
    </div>

    <div id="success-header-modal" class="modal fade" tabindex="-1" aria-labelledby="success-header-modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-colored-header bg-success text-white">
                    <h4 class="modal-title" id="success-header-modalLabel">Habilitar Usuario
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h5 class="mt-0">Habilitar Usuario</h5>
                    <p>¿Esta seguro de habilitar este Usuario?.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light"
                        data-bs-dismiss="modal">Cerrar</button>
                        <input type="hidden" class="form-control" name="iddel" id="iddel" value="">
                    <button type="button" id="btn-enablepro" class="btn btn-light-success text-success font-medium">Habilitar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <!-- ---------------------
            start Product Sales
        ---------------- -->

                @include('usuario.create')

            <!-- ---------------------
            end Product Sales
        ---------------- -->
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12 d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-body">
                    <div class="d-md-flex align-items-center">
                        <div>
                            <h4 class="card-title agregalh">Filtros de Usuarios</h4>
                        </div>
                        <div class="ms-auto d-flex align-items-center">
                            <div class="dl"></div>
                        </div>
                    </div>
                    <div class="row">
                       
                            <div class="col-md-3">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control form-input-bg" name="nombrefil" id="nombrefil" value="{{ old('nombrefil') }}" required>
                                    <label for="nombrefil">Nombre</label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control form-input-bg" name="rutfil" id="rutfil" value="{{ old('rutfil') }}" required>
                                    <label for="rutfil">Rut</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control form-input-bg" name="direccionfil" id="direccionfil" value="{{ old('direccionfil') }}" required>
                                    <label for="direccionfil">Direccion</label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control form-input-bg" name="correofil" id="correofil" value="{{ old('correofil') }}" required>
                                    <label for="correofil">Correo</label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control form-input-bg" name="numerofil" id="numerofil" value="{{ old('numerofil') }}" required>
                                    <label for="numerofil">Telefono</label>
                                </div>
                            </div>

                        </div>
                        
                        <div class="row">
                            <div class="col-sm-12 text-center" role="group" aria-label="..." style="padding-top: 30px;">
                                <button class="btn btn-secondary" onclick="limpiar();"><span class="fa fa-sync">Limpiar</span></button>
                                <button id="btn-buscar" class="btn btn-primary" onclick="tabla();"><span class="fa fa-search"></span>Buscar</button>
                                <div class="row">
                                    <div id="my-buttons" class="text-end"></div>
                                </div>
                            </div>
                        </div>
                    </div>
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
                            <h4 class="card-title agregalh">Listado de Usuarios</h4>
                        </div>
                        <div class="ms-auto d-flex align-items-center">
                            <div class="dl"></div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="myTable" class="table customize-table mb-0 v-middle" style="width:100%;">
                            <thead class="thead-light">
                                <tr>
                                    <th class="border-bottom border-top" >Rut</th>
                                    <th class="border-bottom border-top" >Imagen</th>
                                    <th class="border-bottom border-top" >Nombre</th>
                                    <th class="border-bottom border-top" >Direccion</th>
                                    <th class="border-bottom border-top" >Correo</th>
                                    <th class="border-bottom border-top" >Telefono</th>
                                    <th class="border-bottom border-top" >Estado</th>
                                    <th class="sorte-false border-bottom border-top">Acciones</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
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

            const request = await fetch("{{ route('usuarios.store') }}", {
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
                    location.replace("{{ route('usuarios.index') }}")
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

    $(function() {
        $('#usu_numoficina').parent().hide();
        $("input[name=dir_tipo]").change(function () {
            var dir_tipo = $(this).val();
            console.log(dir_tipo)

            if (dir_tipo == 1) {
                $('#usu_numoficina').parent().show();

            } else {
                $('#usu_numoficina').parent().hide();
            }
        });
        $("#dir_tipo").prop('checked', true).change();

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
        url: "{{ route('usuarios.delete') }}",
        type: "POST",
        dataType: "json",
        data:{
            id : id,
            _token: '{!! csrf_token() !!}'
        }}).done(function (res){
            
            mensaje.setTitle = "Completado!"
            mensaje.setMessage = "Usuario Deshabilitado"
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

    $("#id_rol").select2({
        placeholder: "-=Roles=-",
        allowClear: true,
        dropdownAutoWidth: true,
        width: '100%',
        ajax: {
            url: '{{ route("ajax.rol") }}',
            type: "POST",
            dataType: "json",
            delay: 250,
            data: function (e) {
                return {
                    q: e.term,
                    id_empresa: $("#id_empresa option:selected").val(),
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
            cache: !0,
            
        },
        escapeMarkup: function (markup) {
            return markup;
        }
    });

    $(".id_empresa").change(() => {
        $("#id_rol").val(0).change();
    });
    $(".rut_usuario").change(() => {
        $("#id_rol").val(0).change();
    });
    });

    function usu_enable(id)
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
        url: "{{ route('usuarios.enable') }}",
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

    $('#usu_rut').blur(function () {
        if (!Fn.validaRut(this.value)) {
            $('#usu_rut').attr('class', 'form-control is-invalid');
            $('#usu_rut').val('');
        } else {
            $('#usu_rut').attr('class', 'form-control is-valid');
        }
    });

    $('#usu_telefono').blur(function () {
        if (!validarnumero(this)) {
            $('#usu_telefono').attr('class', 'form-control is-invalid');
            $('#usu_telefono').val('');
        } else {
            $('#usu_telefono').attr('class', 'form-control is-valid');
        }
    });

    $('#password').blur(function () {
        if (!validarpassword(this)) {
            $('#password').attr('class', 'form-control is-invalid');
            $('#password').val('');
        } else {
            $('#password').attr('class', 'form-control is-valid');
        }
    });

    function validarnumero(input) {
        var regex = /^\+[\d]+$/;
        if (input.value.match(regex)) {
            return true;
        }
        return false;
    }

    function validarpassword(input) {
        var regex = /^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{6,16}$/;
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

<!-- tabla -->
<script>
 
    $(document).ready(function(){

        tabla();

    });

    function tabla()
    {

        nombrefil = document.getElementById("nombrefil").value;
        direccionfil = document.getElementById("direccionfil").value;
        numerofil = document.getElementById("numerofil").value;
        correofil = document.getElementById("correofil").value;
        rutfil = document.getElementById("rutfil").value;

        table = $('#myTable').DataTable();

        table.destroy();

        var tabla = $('#myTable').DataTable({

            "processing": false,

            "serverSide": true,
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
            "ajax":{

                url : "{{ route('usuario/registros') }}",
                data:{
                    "nombrefil" : nombrefil,
                    "direccionfil" : direccionfil,
                    "numerofil": numerofil,
                    "correofil": correofil,
                    "rutfil": rutfil
                }
            },
            dom: 'Blfrtip',
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

            ],

            "columns":[

            { "data": "rut", name:"rut" ,searchable: false},
            { "data": "imagen" , name:"imagen",  searchable: false},
            { "data": "nombre" , name:"nombre"},
            { "data": "direccion", name:"direccion",  searchable: false},
            { "data": "correo", name:"correo",  searchable: false},
            { "data": "telefono" , name:"telefono",  searchable: false},
            { "data": "estado" , name:"estado",  searchable: false},
            { "data": "acciones" , name:"acciones",  searchable: false},

            ],

           

        });

        $('.buttons-print, .buttons-pdf, .buttons-excel').addClass('btn btn-orange text-white');
        $('.buttons-excel').addClass('mdi mdi-file-excel');
        $('.buttons-print').addClass('mdi mdi-printer');
        $('.buttons-pdf').addClass('mdi mdi-file-pdf');

        tabla.buttons().container().appendTo('#my-buttons');

    }

    function limpiar()
    {
        document.getElementById("nombrefil").value = null;
        document.getElementById("direccionfil").value = null;
        document.getElementById("numerofil").value = null;
        document.getElementById("correofil").value = null;
        document.getElementById("rutfil").value = null;
        
        tabla();

    }

    function pro_delete(id)
    {
        event.preventDefault();

        $.blockUI({
            overlayColor: '#817F7F ',
            type: 'loader',
            state: 'primary',
            message: '<img class="fas fa-spin fa-sync text-white">',
        }, );

        $("#btn-deletepro").click(function ()
        {
            $.ajax({
            url: "{{ route('usuarios.delete') }}",
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

    function pro_enable(id)
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

        $("#btn-enablepro").click(function ()
        {
            $.ajax({
            url: "{{ route('usuarios.enable') }}",
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
                mensaje.setMessage = "Usuario Habilitado!."
                mensaje.setType = "error"
                mensaje.mostrarMessage('body');
                $.unblockUI();
                console.log('false')
            });
        });

        $.unblockUI();
    }

    function show(id){
        let url = "{{ route('usuarios.show', ':id') }}";
        url = url.replace(':id', id);
        document.location.href=url;
    
    }

</script>



            @endsection
