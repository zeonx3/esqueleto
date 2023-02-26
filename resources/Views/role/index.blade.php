@extends('layouts.app')

@section('content')

<div class="page-breadcrumb">
    <div class="row">
        <div class="card card-custom gutter-b" id="kt_blockui_card"></div>
        <div class="col-5 align-self-center">
            <h4 class="page-title">Mantenedor de Roles</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="dashboard.html">Inicio</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Roles</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">

    <div class="row">
        <div class="col-sm-12">
            <!-- ---------------------
            start Product Sales
        ---------------- -->
             @include('role.create') 
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
                    <h4 class="modal-title" id="danger-header-modalLabel">Deshabilitar Rol
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h5 class="mt-0">Deshabilitar Rol</h5>
                    <p>¿Esta seguro de deshabilitar la rol?.</p>
                    <p style="color: red">Se deshabilitaran las respuestas y rols que surjan de esta!.</p>
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

    <div id="success-header-modal" class="modal fade" tabindex="-1" 
        aria-labelledby="success-header-modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-colored-header bg-success text-white">
                    <h4 class="modal-title" id="success-header-modalLabel">Habilitar Rol
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h5 class="mt-0">Habilitar Rol</h5>
                    <p>¿Esta seguro de activar la rol?.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light"
                        data-bs-dismiss="modal">Cerrar</button>
                        <input type="hidden" class="form-control" name="iddel" id="iddel" value="">
                    <button type="button" id="btn-enablepre" class="btn btn-light-success text-success font-medium">Habilitar</button>
                </div>
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
                            <h4 class="card-title agregalh">Listado de Roles</h4>
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
                                    <th>Nombre Rol</th>
                                    <th>Empresa</th>
                                    <th>Estado</th>
                                    <th class="sorte-false">Accion</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($roles as $rol )
                                    <tr>
                                        <?php 
                                          

                                    switch ($rol->rol_estado) {
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
                                        <td>{{ $rol->rol_nombre }}</td>
                                        <td>{{ $rol->emp_nombre }}</td>
                                        <td>
                                            <span class="<?=$estado?>">
                                                {{ $rol->rol_estado == 1 ? 'Habilitado' : 'Deshabilitado' }}
                                            </span></td>
                                        <td>
                                        @if($rol->rol_estado == 1)
                                            <a class="btn btn-sm btn-info" href="{{ route('roles.show',$rol->id) }}">
                                                <i class="fas fa-folder-open" title="Detalle"></i>
                                            </a>
                                            <button type="buttom" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#danger-header-modal" onclick="rol_delete({{ $rol->id }})"><i class="fa fa-fw fa-trash" title="Deshabilitar" ></i></button>
                                       
                                        @else
                                            <a class="btn btn-sm btn-info" href="{{ route('roles.show',$rol->id) }}">
                                            <i class="fas fa-folder-open" title="Detalle"></i></a>
                                            <button type="buttom" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#success-header-modal" onclick="rol_enable({{ $rol->id }})"><i class="fas fa-power-off"  title="Habilitar" ></i></button>
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

<script>

function rol_delete(id)
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
        url: "{{ route('roles.delete') }}",
        type: "POST",
        dataType: "json",
        data:{
        id : id,
        _token: '{!! csrf_token() !!}'
        }}).done(function (res){

        mensaje.setTitle = "Completado!"
        mensaje.setMessage = "Rol Deshabilitado"
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

function rol_enable(id)
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

    $("#btn-enablepre").click(function ()
    {
    $.ajax({
    url: "{{ route('roles.enable') }}",
    type: "POST",
    dataType: "json",
    data:{
    id : id,
    _token: '{!! csrf_token() !!}'
    }}).done(function (res){

    mensaje.setTitle = "Completado!"
    mensaje.setMessage = "Habilitar Rol"
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

$(function (){

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



@endsection
