@extends('layouts.app')


@section('content')

<!-- -------------------------------------------------------------- -->
<!-- Bread crumb and right sidebar toggle -->
<!-- -------------------------------------------------------------- -->
<div class="page-breadcrumb">
    <div class="row">
        <div class="card card-custom gutter-b" id="kt_blockui_card"></div>
        <div class="col-5 align-self-center">
            <h4 class="page-title">Mantenedor de Familias</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="dashboard.html">Inicio</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Familias</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
        <!--Formulario-->
        <div class="row">
            <div class="col-sm-12">

                    @include('categoria.create')

            </div>
        </div>
        <!--Fin-->
        <!--Zona de Modals-->
        <div id="danger-header-modal" class="modal fade" tabindex="-1" aria-labelledby="danger-header-modalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header modal-colored-header bg-danger text-white">
                        <h4 class="modal-title" id="danger-header-modalLabel">Deshabilitar Familia
                        </h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h5 class="mt-0">Deshabilitar Familia</h5>
                        <p>¿Esta seguro de Deshabilitar la familia?.</p>
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
                        <h4 class="modal-title" id="success-header-modalLabel">Habilitar Familia
                        </h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h5 class="mt-0">Habilitar Familia</h5>
                        <p>¿Esta seguro de Habilitar la familia?.</p>
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
        <!--Fin-->

        <!--Lista-->
        <div class="row">
            <div class="col-sm-12 d-flex align-items-stretch">
                <div class="card w-100">
                    <div class="card-body">
                        <div class="d-md-flex align-items-center">
                            <div>
                                <h4 class="card-title agregalh">Listado de Familias</h4>
                            </div>
                            <div class="ms-auto d-flex align-items-center">
                                <div class="dl"></div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="myTable" class="table customize-table mb-0 v-middle">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="border-bottom border-top" >Imagen</th>
                                        <th class="border-bottom border-top" >Nombre</th>
                                        <th class="border-bottom border-top" >Tipo</th>
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
        <!--Fin-->

</div>

<!--Formulario-->
<script>

    $(function() 
    {

        $('#com1').parent().parent().hide();
        $('#cat_imagen').parent().parent().hide();
        
        $('#cat_padre').parent().parent().hide();
        $('#sub_familia').parent().parent().hide();
        $('#subcheck').parent().parent().parent().parent().hide();

        $("input[name=subcheck]").on('change', function()
        {
            var rti_operadorck = $(this).val();
            console.log(rti_operadorck);
            if(rti_operadorck != 1 )
            {
                $('#com1').parent().parent().hide();
                $('#cat_imagen').parent().parent().hide();
              

            }
            else
            {
                $('#com1').parent().parent().show();
                $('#cat_imagen').parent().parent().show();
               
                $('#sub_familia').parent().parent().hide();

            }	
        });

        $("#cat_tipo").change(function (event)
        {
            var cat_tipo = $(this).val();
            console.log(cat_tipo);
            if(cat_tipo == 1)
            {
                $('#com1').parent().parent().show();
                $('#cat_imagen').parent().parent().show();
              
                $('#sub_familia').parent().parent().hide();
                $('#cat_padre').parent().parent().hide();
                $('#subcheck').parent().parent().parent().parent().hide();
            }
            else
            {
                $('#com1').parent().parent().hide();
                $('#cat_imagen').parent().parent().hide();
              
                $('#subcheck').parent().parent().parent().parent().show();
                $('#sub_familia').parent().parent().show();
                $('#cat_padre').parent().parent().show();
                
            }

        });
        
    });
</script>

<!--Tabla-->
<script>
    
    $(document).ready(function(){

    tabla();

    });

    function tabla()
    {
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

                url : "{{ route('familias/registros') }}",
                data:{
            
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

       
            { "data": "imagen" , name:"imagen",  searchable: false},
            { "data": "nombre" , name:"nombre"},
            { "data": "tipo" , name:"tipo"},
            { "data": "estado" , name:"estado",  searchable: false},
            { "data": "acciones" , name:"acciones",  searchable: false},

            ],
            order:[[2,'asc']],

        });

        $('.buttons-print, .buttons-pdf, .buttons-excel').addClass('btn btn-orange text-white');
        $('.buttons-excel').addClass('mdi mdi-file-excel');
        $('.buttons-print').addClass('mdi mdi-printer');
        $('.buttons-pdf').addClass('mdi mdi-file-pdf');

        tabla.buttons().container().appendTo('#my-buttons');

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
        let url = "{{ route('categorias.show', ':id') }}";
        url = url.replace(':id', id);
        document.location.href=url;
    
    }

</script>

@endsection
