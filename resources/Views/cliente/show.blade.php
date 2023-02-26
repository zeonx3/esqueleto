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

    <div>
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
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="last-month" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3 col-xs-3 b-r"> <strong>Razon social</strong>
                                    <br>
                                    <p class="text-muted">{{ $cliente->cli_nombre }}</p>
                                </div>
                                <div class="col-md-3 col-xs-6 b-r"> <strong>RUT</strong>
                                    <br>
                                    <p class="text-muted">{{ $cliente->cli_rut }}</p>
                                </div>
                                <div class="col-md-3 col-xs-6 b-r"> 
                                <strong>Giro</strong>
                                    <br>
                                    <p class="text-muted">{{ $cliente->cli_giro }}</p>
                                </div>
                                <div class="col-md-3 col-xs-6 b-r"> 
                                <strong>Correo</strong>
                                    <br>
                                    <p class="text-muted">{{ $cliente->cli_mail }}</p>
                                </div>
                            </div>
                            <hr>
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
                        </div>
                    </div>
                    <div class="tab-pane fade" id="previous-month" role="tabpanel" aria-labelledby="pills-setting-tab">
                        <div class="card-body">
                            <form enctype="multipart/form-data" class=" form-material" id="formu">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" required id="cli_rut" class="form-control" name="cli_rut" value="<?=$cliente->cli_rut ? $cliente->cli_rut : old('cli_rut') ?>">
                                            <label><i class="fas fa-address-book text-orange fill-white me-2"></i>RUT</label>
                                        </div>
                                        <div class="invalid-feedback">El rut debe ser ingresado sin puntos y con guión.</div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" name="cli_nombre" autofocus required value='<?=$cliente->cli_nombre ? $cliente->cli_nombre : old('cli_nombre')?>'>
                                            <label><i class="fas fa-address-book text-orange fill-white me-2"></i>Razón social</label>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" name="cli_giro" value='<?=$cliente->cli_giro ? $cliente->cli_giro : old('cli_nomfanta')?>'>
                                            <label><i class="fas fa-address-book text-orange fill-white me-2"></i>Giro</label>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" name="cli_nomfanta" value='<?=$cliente->cli_nomfanta ? $cliente->cli_nomfanta : old('cli_nomfanta')?>'>
                                                <label><i class="fas fa-address-book text-orange fill-white me-2"></i>Nombre Fantasía</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control"  name="cli_telefono" id="cli_telefono" value='<?=$cliente->cli_telefono ? $cliente->cli_telefono : old('cli_telefono')?>'>
                                            <label><i class="fas fa-phone text-orange fill-white me-2"></i>Telefono</label>
                                            <div class="invalid-feedback">El teléfono ingresado debe tener el formato +56978953712.</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="mail" class="form-control" required  name="cli_mail" value='<?=$cliente->cli_mail ? $cliente->cli_mail : old('cli_mail')?>'>
                                            <label><i class="far fa-envelope text-orange fill-white me-2"></i>Correo Electronido</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="input-group mb-3">
                                            <label class="input-group-text" for="cli_tipo"><span class="border-start ps-3">Tipo</span></label>
                                                <select class="form-select select2" id="cli_tipo" name="cli_tipo">
                                                    <option value="0"> -=Tipo Cliente=-</option>
                                                    <option value="1" <?= $cliente->cli_tipo == 1 ? 'selected' : '' ?>>Cliente</option>
                                                    <option <?= $cliente->cli_tipo == 2 ? 'selected' : '' ?>value="2">Prospecto</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
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
                                    <div class="col-md-3">
                                        <div class="input-group mb-3">
                                                <label class="input-group-text" for="id_region"><span class="border-start ps-3">Region</span></label>
                                                <select class="form-select select2 " id="id_region" name="id_region">
                                                </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="input-group mb-3">
                                                <label class="input-group-text" for="id_comuna"><span class="border-start ps-3">Comuna</span></label>
                                                <select class="form-select select2 " id="id_comuna" name="id_comuna">
                                                </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                                <input type="text" class="form-control" name="cli_calle" value='<?=$cliente->dir_calle ? $cliente->dir_calle : old('cli_calle')?>'>
                                                <label><i class="fas fa-location-arrow text-orange fill-white me-2"></i><span class="border-start ps-3">Calle</span></label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-floating mb-3">
                                                <input type="text" class="form-control" name="cli_numcalle" value='<?=$cliente->dir_numero ? $cliente->dir_numero : old('cli_numcalle')?>'>
                                                <label><i class="fas fa-hashtag text-orange fill-white me-2"></i><span class="border-start ps-3">Numero Calle</span></label>
                                        </div>
                                    </div>
                                    
                                    <input type="hidden" name="cli_id" value="<?=$cliente->id ? $cliente->id : 0 ?>">
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
            <!-- ---------------------
                end Timeline
            ---------------- -->
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


    });
</script>
<script>
 
    $(function (){

        var tipo = $('#cli_tipo').val();

        if(tipo != 1)
        {
            $("#cli_padre").parent().parent().show();
            $("#cli_imagen").parent().parent().show();
        }
        else{

            $("#cli_padre").parent().parent().hide();
            $("#cli_imagen").parent().parent().hide();
        }


        $("#cli_tipo").on('change', function(){

            var cli_tipo = $(this).val();

            if(cli_tipo != 1)
            {
                $("#cli_padre").parent().parent().show();
                $("#cli_imagen").parent().parent().show();


            }
            else
            {
                $("#cli_imagen").parent().parent().hide();
                $("#cli_padre").parent().parent().hide();

            }


        });

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
                mensaje.setMessage = "Error en activar cliente!."
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
            allowClear: !0,
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
            allowClear: !0,
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
