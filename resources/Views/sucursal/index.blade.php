@extends('layouts.app')

@section('content')

<div class="page-breadcrumb">
    <div class="row">
        <div class="card card-custom gutter-b" id="kt_blockui_card"></div>
        <div class="col-5 align-self-center">
            <h4 class="page-title">Mantenedor de Sucursales</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="dashboard.html">Inicio</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Sucursal</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="border-bottom title-part-padding">
                    <h4 class="card-title mb-0">Crear nueva Sucursal</h4>
                </div>
                <div class="card-body wizard-content">
                    <form enctype="multipart/form-data" class="validation-wizard wizard-circle mt-5" id="formu">
                        @csrf
                        @include('sucursal.form')
                    </form>
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
                            <h4 class="card-title agregalh">Listado de Sucursales</h4>
                        </div>
                        <div class="ms-auto d-flex align-items-center">
                            <div class="dl"></div>
                        </div>
                    </div>
                    <!-- title -->
                    <div class="table-responsive">
                        <table id="myTable"class="table customize-table mb-0 v-middle" style="width:100%">
                            <thead class="thead-light">
                                <tr>
                                    <th class="border-bottom border-top" >#</th>
                                    <th class="border-bottom border-top" >Nombre</th>
                                    <th class="border-bottom border-top" >Direccion</th>
                                    <th class="border-bottom border-top" >Estado</th>
                                    <th class="border-bottom border-top" >Acciones</th>
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

    $(function (){

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

        $("#btn-save").click( async function (e){
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

        if (!mensaje.messageExist()) {
        } 
        else 
        {
            mensaje.setTitle = "Error!";
            mensaje.setType = 'error';
            mensaje.mostrarMessage('body');
        }

        const request = await fetch("{{ route('sucursales.store') }}", {
                        method: 'POST',
                        body: formData
        });

        console.log(request);

        const response = await request.json();

        mensaje.setMessage = response.Message;
        mensaje.setTitle = response.status == 200 ? "Completado!" : "Error!";
        mensaje.setType = response.status == 200 ? "success" : "error";

        mensaje.mostrarMessage('body', function () {

        if (response.status != 200) {
            $.unblockUI();
        } else {
            location.replace("{{ route('sucursales.index') }}")
        }

        });

        });

    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }});

    function tabla() {
        return $.ajax({
            url: "{{ route('sucursales/registros') }}",
            type: "POST",
            data: {
                _token: '{!! csrf_token() !!}'
            },
            dataType: "json",
            processData: false,
            contentType: false,
        }).always(function(data){
            var i = 1;
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
                    "data": data.sucursal,
                    // buttons
                    "dom": 'lf<"table-filter-container">rtipF',
                    initComplete: function(settings){
                    var api = new $.fn.dataTable.Api( settings );
                    $('.table-filter-container', api.table().container()).append(
                    $('#table-filter').detach().show(),
                    $('#table-filter2').detach().show()
                    )}
                    ,
                    "buttons": [
                        'excel', 'pdf', 'print'
                    ],
                    // responsive
                    "responsive": true,
                    "columns": [{
                            "data": "id",
                            "render": function(data, type, row, meta) {
                                return i++;
                            }
                        },
                        {
                            "data": "nombre",
                            "render": function(data, type, row, meta) {
                                
                                return row.suc_nombre;
                            }
                        }
                        ,
                        {
                            "data": "direccion",
                            "render": function(data, type, row, meta) {
                                return row.dir_calle+' #'+row.dir_numero+' ,'+row.com_nombre+' /'+row.reg_nombre+' - '+row.pai_nombre
                            }
                        },
                        {

                            "data": "Estado",
                            "render": function(data, type, row, meta) {
                                switch(row.suc_estado)
                                {
                                case 1:
                                    return '<span class="badge bg-success">Habilitado</span>';
                                    break;
                                case 2:
                                    return '<span class="badge bg-danger">Deshabilitado</span>';
                                    break;
                                    return "Otros";
                                    break;
                                
                                }
                            }
                        },
                        {
                        'data': 'Acciones',
                        'render': function (data, type, row, meta) {
                                    return '<div class="btn-group"><button type="button" class="btn waves-effect waves-dark btn-orange text-white dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="btn-setting"><i class="fas fa-cog"></i><div class="dropdown-menu dropdown-menu-end animated flipInY" aria-labelledby="btn-setting"></button><div class="dropdown-menu dropdown-menu-end animated flipInY" aria-labelledby="btn-setting"><a type="buttom" class="dropdown-item" onclick="show(' + row.id + ')">Detalle</a><a type="buttom" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#danger-header-modal"  onclick="pro_delete(' + row.id + ')">Eliminar</a></div></div>'
                            }
                        }
                        ]
                    });
                $('#table-filter select').on('change', function(){
                    table.search(this.value).draw();   
                }); 
                $('#table-filter2 select').on('change', function(){
                    table.search(this.value).draw();   
                }); 
                
                $('.buttons-print, .buttons-pdf, .buttons-excel').addClass('btn btn-orange text-white');
                $('.buttons-excel').addClass('mdi mdi-file-excel');
                $('.buttons-print').addClass('mdi mdi-printer');
                $('.buttons-pdf').addClass('mdi mdi-file-pdf');
        }).fail(function(){ console.log('chao') });

    }

    tabla();

</script>
<script>
    $(function(){

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

    })

    function show(id){
        let url = "{{ route('sucursales.show', ':id') }}";
        url = url.replace(':id', id);
        document.location.href=url;
    
    }
</script>


@endsection
