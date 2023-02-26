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
@if($categoria->cat_padres != 0)

        <div class="col-lg-4 col-xlg-3 col-md-5">
            <!-- ---------------------
                    start Hanna Gover
                ---------------- -->
            <div class="card">
                <div class="card-body">
    @if(!is_null($categoria->cat_imagen))

                        <center class="mt-4"> <img src="{{$categoria->cat_imagen }}"
                                alt="{{ $categoria->cat_nombre }}" class="rounded img-fluid" width="200px">
                        
                        </center>
    @endif
                </div>
            </div>
            <!-- ---------------------
                    end Hanna Gover
                ---------------- -->
        </div>
@endif
    <div class="<?=$categoria->cat_padres != 0 ? 'col-lg-8 col-xlg-9 col-md-7' : '' ?>">

        <div id="danger-header-modal" class="modal fade" tabindex="-1" aria-labelledby="danger-header-modalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header modal-colored-header bg-danger text-white">
                        <h4 class="modal-title" id="danger-header-modalLabel">Deshabilitar Categoria
                        </h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h5 class="mt-0">Deshabilitar Categoria</h5>
                        <p>¿Esta seguro de Deshabilitar la categoria?.</p>
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
                        <h4 class="modal-title" id="success-header-modalLabel">Habilitar Categoria
                        </h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h5 class="mt-0">Habilitar Categoria</h5>
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

            <!-- ---------------------
                start Timeline
            ---------------- -->
            <div class="card">
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
                @if($categoria->cat_padres == 0)
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="last-month" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3 col-xs-3 b-r"> <strong>Nombre</strong>
                                    <br>
                                    <p class="text-muted">{{ $categoria->cat_nombre }}</p>
                                </div>
                                <div class="col-md-3 col-xs-6 b-r"> <strong>Tipo de Categoria</strong>
                                    <br>
                                    <p class="text-muted"><?=$categoria->cat_padres > 0 ? 'Sub Categoria' : 'Padre' ?></p>
                                </div>
                            </div>
                            <hr>
                            <div class="card-body">
                                <h4 class="card-title">Sub Categorias</h4>
                            </div>
                            <div class="table-respondive" >
                                <table class="table customize-table mb-0 v-middle">
                                    <thead class="table-light" >
                                        <tr>
                                            <th class="border-bottom border-top" >Imagen</th>
                                            <th class="border-bottom border-top" >Nombre</th>
                                            <th class="border-bottom border-top" >Estado</th>
                                            <th class="border-bottom border-top">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cat_hijas as $p)
                                            <?php 

                                            switch ((int)$p->cat_estado) {
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
                                            <td><img src="{{ $p->cat_imagen }}" class="rounded-circle" width="40"></td>
                                            <td>{{ $p->cat_nombre }}</td>
                                            <td>
                                                <span class="<?=$estado?>">
                                                <?=$p->cat_estado == 1 ? 'Activo' : 'Deshabilitado'?></span>
                                            </td>
                                            <td>
                                            @if($p->cat_estado == 1)
                                            <a class="btn btn-sm btn-info" href="{{ route('categorias.show',$p->id) }}">
                                                <i class="fas fa-folder-open" title="Detalle"></i>
                                            </a>
                                            <button type="buttom" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#danger-header-modal" onclick="id_delete({{ $p->id }})"><i class="fa fa-fw fa-trash" title="Eliminar" ></i></button>
                                            @else
                                            <a class="btn btn-sm btn-info" href="{{ route('categorias.show',$p->id) }}">
                                            <i class="fas fa-folder-open" title="Detalle"></i></a>
                                            <button type="buttom" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#success-header-modal" 
                                            onclick="cat_enable({{ $p->id }})">
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
                        </div>
                    </div>
                    @else
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="last-month" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3 col-xs-3 b-r"> <strong>Nombre</strong>
                                        <br>
                                        <p class="text-muted">{{ $categoria->cat_nombre }}</p>
                                    </div>
                                    <div class="col-md-3 col-xs-6 b-r"> <strong>Tipo de Familia</strong>
                                        <br>
                                        <p class="text-muted"><?=$categoria->cat_padres > 0 ? 'Sub Familia' : 'Familia' ?></p>
                                    </div>
    @if($categoria->cat_padres > 0)
                                    <div class="col-md-3 col-xs-6 b-r"> <strong>Familia</strong>
                                        <br>
                                        <p class="text-muted">{{ $cat_padre->cat_nombre}}</p>
                                    </div>
    @endif
                                </div>
                                <hr>
                                <div class="card-body">
                                    <h4 class="card-title">Productos</h4>
                                </div>
                                <div class="table-respondive" >
                                    <table class="table customize-table mb-0 v-middle">
                                        <thead class="table-light" >
                                            <tr>
                                                <th class="border-bottom border-top" >Imagen</th>
                                                <th class="border-bottom border-top" >Nombre</th>
                                                <th class="border-bottom border-top" >Estado</th>
                                                <th class="border-bottom border-top" >Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($productos as $p)
    <?php 
    
    switch ((int)$p->pro_estado) {
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
                                                <td><img src="{{ $p->pro_imagen }}" class="rounded-circle" width="40"></td>
                                                <td>{{ $p->pro_nombre }}</td>
                                                <td>
                                                    <span class="<?=$estado?>">
                                                    <?=$p->pro_estado == 1 ? 'Habilitado' : 'Deshabilitado'?></span>
                                                </td>
                                                <td>
                                            @if($p->pro_estado == 1)
                                                <a class="btn btn-sm btn-info" href="{{ route('productos.show',$p->id) }}">
                                                    <i class="fas fa-folder-open" title="Detalle"></i>
                                                </a>
                                                <button type="buttom" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#danger-header-modalpro" onclick="pro_delete({{ $p->id }})"><i class="fa fa-fw fa-trash" title="Deshabilitar" ></i></button>
                                                @else
                                                <a class="btn btn-sm btn-info" href="{{ route('productos.show',$p->id) }}">
                                                <i class="fas fa-folder-open" title="Detalle"></i></a>
                                                <button type="buttom" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#success-header-modalpro" 
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
                    @endif
                    <div class="tab-pane fade" id="previous-month" role="tabpanel" aria-labelledby="pills-setting-tab">
                        <div class="card-body">
                            <form enctype="multipart/form-data" class=" form-material" id="formu">
                                @csrf
                                <div class="row">
                                    @if(count(EmpresasUser(Auth::user()->id)) > 1)
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 text-end control-label col-form-label">Empresa</label>
                                        <div class="col-sm-6">
                                            <select class="form-select select2" id="id_empresa" name="id_empresa">
                                            <option>-=Empresas=-</option>
                                            @foreach (EmpresasUser(Auth::user()->id) as $emp)
                                                <option value="{{ $emp->id }}">{{$emp->emp_nombre}}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    @else
                                    <?php
                                    
                                    $empresa = EmpresasUser(Auth::user()->id);
                                  
                                   ?>
                                    <input type="hidden" name="id_empresa" value="<?=$empresa[0]->id?>">
                                    @endif

                                    <div class="col-md-6">
                                        <div class="input-group mb-3">
                                            <label class="input-group-text" for="cat_tipo"><span class="border-start ps-3">Tipo de Familia</span></label>
                                                <select class="form-select select2" id="cat_tipo" name="cat_tipo">
                                            <option value="0">-=Tipo Familia=-</option>
                                            <option <?=$categoria->cat_padres > 0 ? '' : 'Selected' ?> value="1">Familia</option>
                                            <option <?=$categoria->cat_padres > 0 ? 'Selected' : '' ?> value="2">Sub Familia</option>
                                           
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" name="cat_nombre" autofocus required value='<?=$categoria->cat_nombre ? $categoria->cat_nombre : old('cat_nombre')?>'>
                                            <label>
                                                <i class="fas fa-address-book text-orange fill-white me-2"></i>
                                                <span class="border-start ps-3">Nombre</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" type="file" id="cat_imagen" name="cat_imagen" value="<?=$categoria->cat_imagen ? $categoria->cat_imagen : old('cat_imagen') ?>">
                                            <label for="formFile" class="form-label"><i class="fas fa-address-book text-orange fill-white me-2"></i><span class="border-start ps-3">Imagen</span></label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-group mb-3">
                                            <label class="input-group-text" for="cat_padre"><span class="border-start ps-3">Familia</span></label>
                                                <select class="form-select select2" id="cat_padre" name="cat_padre">
                                            <option value="">-=Familias=-</option>
                                            @foreach ($categorias as $c)
                                                <option  <?= $c->id == $categoria->cat_padres ? 'Selected' : ''?> value="{{ $c['id'] }}">{{$c['cat_nombre']}}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" type="text" id="cat_video" name="cat_video" value="<?=$categoria->cat_video ? $categoria->cat_video : old('cat_imagen') ?>">
                                            <label for="formFile" class="form-label"><i class="fas fa-address-book text-orange fill-white me-2"></i><span class="border-start ps-3">Video</span></label>
                                        </div>
                                    </div>
                                    <input type="hidden" name="cat_id" value="<?=$categoria->id ? $categoria->id : 0 ?>">
                                 
                                </div> 
                                <div class="form-group text-end">
                                    <div class="col-sm-12">
                                        <button class="btn btn-success" id="btn-save">Editar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ---------------------
                end Timeline
            ---------------- -->
        </div>
    </div>
</section>

<script>
 
    $(function (){

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

            const request = await fetch("{{ route('categorias.store') }}", {
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
                location.replace("{{ route('categorias.index') }}")
            }

        });

    });

    });

    function back()
    {
        history.back();
    }

    
    function id_delete(id)
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
            url: "{{ route('categorias.delete') }}",
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

    function cat_enable(id)
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
            url: "{{ route('categorias.enable') }}",
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
                mensaje.setMessage = "Familia deshabilitada!."
                mensaje.setType = "error"
                mensaje.mostrarMessage('body');
                $.unblockUI();
                console.log('false')
            });
        });

        $.unblockUI();
       
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
                mensaje.setMessage = "Familia del producto deshabilitada!."
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
    $(function(){

        var table = $(".table").DataTable({
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
