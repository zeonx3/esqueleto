@extends('layouts.app')


@section('content')

<div class="page-breadcrumb">
    <div class="row">
        <div class="card card-custom gutter-b" id="kt_blockui_card"></div>
        <div class="col-5 align-self-center">
            <h4 class="page-title">Mantenedor de Productos</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="dashboard.html">Inicio</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Productos</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">

    <div id="danger-header-modalpro" class="modal fade" tabindex="-1" aria-labelledby="danger-header-modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-colored-header bg-danger text-white">
                    <h4 class="modal-title" id="danger-header-modalLabel">Deshabilitar Producto
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h5 class="mt-0">Deshabilitar Producto</h5>
                    <p>¿Esta seguro de deshabilitar el producto?.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light"
                        data-bs-dismiss="modal">Cerrar</button>
                        <input type="hidden" class="form-control" name="iddel" id="iddel" value="">
                    <button type="button" id="btn-deletepro" class="btn btn-light-danger text-danger font-medium">Deshabilitar</button>
                </div>
            </div>
        </div>
    </div>

    <div id="importmodal" class="modal fade" tabindex="-1" aria-labelledby="success-header-modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-colored-header bg-orange text-white">
                    <h4 class="modal-title" id="importmodallabel">Importar Productos
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form enctype="multipart/form-data" class=" form-material" id="forimport">   
                        @csrf
                        <div class="row">
                            <div class="mb-3 row text-end"> 
                                <a type="buttom" target="_blank" href="{{route('productos.import_ejemplo')}}"  class="btn btn-success px-4 fas fa-file-excel"> Plantilla de Ejemplo</a>
                            </div>
                            <div class="mb-3 row">
                                <label for="formFile" class="col-sm-3 text-end control-label col-form-label">Cargar Excel</label>
                                <div class="col-sm-6">
                                    <input class="form-control" type="file" id="pro_import" name="pro_import">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="formFile" class="col-sm-3 text-end control-label col-form-label">Imagenes</label>
                                <div class="col-sm-6">
                                    <input class="form-control" type="file" id="pro_imagenes" multiple name="pro_imagenes[]">
                                </div>
                            </div>
                            <br>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light"
                        data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" id="btn-import" class="btn btn-light-success text-white font-medium">importar</button>
                </div>
            </div>
        </div>
    </div>

    <div id="success-header-modalpro" class="modal fade" tabindex="-1" aria-labelledby="success-header-modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-colored-header bg-success text-white">
                    <h4 class="modal-title" id="success-header-modalLabel">Habilitar Producto
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h5 class="mt-0">Habilitar Producto</h5>
                    <p>¿Esta seguro de habilitar el producto?.</p>
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

    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header modal-colored-header bg-primary text-white">
                    <h4 class="modal-title" id="myLargeModalLabel">Actualizar Stock</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form enctype="multipart/form-data" class=" form-material" id="formodal">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3 row">
                                    <label  class="col-sm-3 text-center control-label">Producto</label>

                                    <input type="hidden" id="mod_producto" name="mod_producto"/>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="mod_nombre" readonly>
                                    </div>
                                </div>
                            </div>
                            <p>
                                <h5 class="text-muted">Actualizar cantidad:</h5>
                            </p>
                            <div class="col-md-6">
                                <div class="md-6">
                                    <label for="id_categoria">Sucursales:
                                    </label>
                                    <select class="form-select select2" id="id_sucursal" name="id_sucursal">
                                        <option>-= Sucursales =-</option>
                                        @foreach ( $sucursales as $suc )
                                        <option value="{{$suc->id}}">{{$suc->suc_nombre}}</option>
                                        @endforeach                                
                                    </select>
                                </div>
                                <div class="mb-3 row">
                                    <label for="emp_nombre" class="col-sm-3 text-center control-label">Cantidas</label>
                                    <div class="col-sm-6">
                                        <input type="number" class="form-control" id="mod_cantidad" name="mod_cantidad">
                                    </div>
                                </div>
                            </div>
                            <p></p>
                        </div>
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
        <div class="col-sm-12">
            <!-- ---------------------
            start Product Sales
        ---------------- -->

                @include('producto.create')

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
                            <h4 class="card-title agregalh">Filtros de productos</h4>
                        </div>
                        <div class="ms-auto d-flex align-items-center">
                            <div class="dl"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3 col-md-offset-0">
                            <label class="col-sm-3 control-label col-form-label" for="id_subcatfil">Familia</label>
                            <select class="select2" id="id_subcatfil">
                            <option selected>-=Todos=-</option>
                                @foreach ( $subcat as $a )
                                <option value="{{$a->id}}">{{$a->cat_nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-3 col-md-offset-0">
                            <label class="col-sm-3 control-label col-form-label" for="id_codigo">Codigo</label>
                            <select class="select2" id="id_codigo">
                                        <option selected value=''>-=Todos=-</option>
                                @foreach ( $codigos as $co )
                                        <option value="{{$co->pro_sku}}">{{$co->pro_sku}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-3 col-md-offset-0">
                            <label class="col-sm-3 control-label col-form-label" for="id_estado">Estado</label>
                            <select id="id_estado" name="estado" type="time" class="form-control input-md">
                                <option selected>-=Todos=-</option>
                                <option value="1">Habilitado</option>
                                <option value="2">Deshabilitado</option>
                            </select>
                        </div>
                        <div class="col-sm-2" role="group" aria-label="..." style="padding-top: 30px;">
                            <button class="btn btn-secondary" onclick="limpiar();"><span class="fa fa-sync">Limpiar</span></button>
                            <button id="btn-buscar" class="btn btn-primary" onclick="tabla();"><span class="fa fa-search"></span>Buscar</button>
                        </div>
                    </div>
                    <p>
                        
                    <div class="row">
                        <div id="my-buttons" class="text-center"></div>
                    </div>
                </div>
            </div>
        </div>        
    </div>

    <div class="row">

        <div class="col-sm-12 d-flex align-items-stretch">
            <div class="card w-100">
                <div class="row">
                    <div class="card-body">
                        <div class="d-md-flex align-items-center">
                            <div>
                                <h4 class="card-title agregalh">Listado de Productos</h4>
                            </div>
                            <div class="ms-auto d-flex align-items-center">
                                <div class="dl"></div>
                            </div>
                        </div>
                        <div class="table-responsive">
                          
                            <table id="myTable" class="table customize-table mb-0 v-middle" style="width:100%;">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="border-bottom border-top" >imagen</th>
                                        <th class="border-bottom border-top" >Codigo</th>
                                        <th class="border-bottom border-top" >Nombre</th>
                                        <th class="border-bottom border-top data-search" >Familia</th>
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
</div>

<!--Formulario -->
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

            const request = await fetch("{{ route('productos.store') }}", {
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
                    location.replace("{{ route('productos.index') }}")
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

<!-- tabla -->
<script>
 
    $(document).ready(function(){

        tabla();

    });

    function tabla(){

        id_familia = document.getElementById("id_subcatfil").value;
        codigo = document.getElementById("id_codigo").value;
        estado = document.getElementById("id_estado").value;

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

                url : "{{ route('producto/registros') }}",
                data:{

                    "id_familia" : id_familia,
                    "codigo" : codigo,
                    "estado" : estado

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

            { "data": "imagen", name:"imagen" },
            { "data": "codigo" , name:"codigo",  searchable: false},
            { "data": "nombre" , name:"nombre",  searchable: false},
            { "data": "familia", name:"familia",  searchable: false},
            { "data": "estado", name:"estado",  searchable: false},
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
            document.getElementById("id_subcatfil").value = 0;
            document.getElementById("id_codigo").value = null;
            document.getElementById("id_estado").value = 0;
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
            url: "{{ route('productos.delete') }}",
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
            url: "{{ route('productos.enable') }}",
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
                mensaje.setMessage = "Categoria del producto deshabilitado!."
                mensaje.setType = "error"
                mensaje.mostrarMessage('body');
                $.unblockUI();
                console.log('false')
            });
        });

        $.unblockUI();
    }


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
                $(document).ready(function () {
                    radioswitch.init()

                });
            }
        }
    };

    $(function () {

        $.ajaxSetup({
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#id_sub_categoria').select2({
            placeholder: "-=Sub Categorias=-",
            ajax: {
                url: '{{ route("sub_categorias") }}',
                type: "POST",
                dataType: "json",
                delay: 250,
                data: function (e) {
                    return {
                        q: e.term,
                        id_categoria: $("#id_categoria option:selected").val(),
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

        $('#pro_bruto').blur(function () 
        {

            var pro_bruto = 0;
            pro_bruto = $(this).val();
            console.log(pro_bruto);
            var formula = 0;
            formula = (pro_bruto * 0.19);

            formula = parseFloat(pro_bruto) + parseFloat(formula);
            
            console.log(formula)

            $("#pro_neto").val(formula);
            
        });

    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }});


 

    function show(id){
        let url = "{{ route('productos.show', ':id') }}";
        url = url.replace(':id', id);
        document.location.href=url;
    
    }

</script>

<script>
    function capturar(e)
    {
        $.ajax({
            url: "{{ route('producto.find') }}",
            type: "POST",
            dataType: "json",
            data:{
                id : e,
                _token: '{!! csrf_token() !!}'
            }}).done(function (res){
                console.log(res.pro_nombre)

                $("#mod_nombre").val(res.res.pro_nombre);
                $("#mod_producto").val(res.res.id);
                console.log(res.res.id)

            }).fail(function (res){
                console.log('false')
            });
    }

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

        const request = await fetch("{{ route('producto.stock') }}", {
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
    $(function(){

       $("#id_sucursal").change(function(event)
       {

        let = id_sucursal = $(this).val();
        let = id_producto = $('#mod_producto').val();

        $.ajax({
            url: "{{ route('sucursalcan') }}",
            type: "POST",
            dataType: "json",
            data:{
                id : id_sucursal,
                id_pro : id_producto,
                _token: '{!! csrf_token() !!}'
            }}).done(function (res){
                console.log(res.res)
                $("#mod_cantidad").val(res.res.sto_cantidad)

            }).fail(function (res){
             
                console.log('false')
            });


       })

    })
</script>

<!-- Importar -->>
<script>
    $("#btn-import").click(async function(e){
        event.preventDefault();

        $.blockUI({
            overlayColor: '#817F7F ',
            type: 'loader',
            state: 'primary',
            message: '<img class="fas fa-spin fa-sync text-white">',
        }, );

        var mensaje = new messageSwal();

        var formEl = document.forms.forimport;
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

        const request = await fetch("{{ route('productos.import') }}", {
                        method: 'POST',
                        body: formData
        });

        const response = await request.json();

            console.log(response.State)
            mensaje.setMessage = response.Message;
            mensaje.setTitle = response.State == 200 ? "Completado!" : "Error!";
            mensaje.setType = response.State == 200 ? "success" : "error";

            mensaje.mostrarMessage('body', function () {

            if (response.State != 200) {
                $.unblockUI();
            } else {
                location.replace("{{ route('productos.index') }}")
            }
        });

    })

</script>
@endsection
