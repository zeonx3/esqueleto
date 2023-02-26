@extends('layouts.app')

@section('content')
<section class="content container-fluid">
    <div class="card-header d-flex">
        <h3 class="card-title">Detalle</h3>
        <div class="ms-auto flex-shrink-0">
        <div class="btn-group">
            <a class="btn btn-secondary" href="{{ route('usuarios.index') }}"><i class="fas fa-arrow-left"></i> volver</a>
        </div>
    </div>

    <!-- Modal Respuesta -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header modal-colored-header bg-primary text-white">
                    <h4 class="modal-title" id="myLargeModalLabel">Cambiar credenciales</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form enctype="multipart/form-data" class=" form-material" id="formodal">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control"   name="username" value="{{$usuario->usu_username ? $usuario->usu_username : old('username')}}">
                                    <label><i class="far address-book text-orange fill-white me-2"></i>Username</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                        <input type="password" id="password" class="form-control" name="password" required">
                                        <label><i class="fa fa-key text-orange fill-white me-2"></i><span class="border-start ps-3">Contraseña</span></label>
                                        <div class="invalid-feedback">la contraseña debe contener minimo 6 caracteres una mayuscula, minuscula, numero y simbolo.</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="password" id="passwordre" class="form-control" name="passwordre" required">
                                    <label><i class="fa fa-key text-orange fill-white me-2"></i><span class="border-start ps-3">Confirmas Contraseña</span></label>
                                    <div class="invalid-feedback">la contraseña debe contener minimo 6 caracteres una mayuscula, minuscula, numero y simbolo.</div>
                                </div>
                            </div>                   
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <label class="col-sm-3 text-end control-label col-form-label"><span class="border-start">Empresa</span></label>
                                    <select class="form-select select2" id="id_empresa" name="id_empresa">
                                        @foreach (EmpresasUser($usuario->id) as $emp)
                                        <option value="{{ $emp->id }}">{{$emp->emp_nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3 row">
                                    <label class="col-sm-2 text-end control-label col-form-label">Roles</label>
                                    <div class="col-sm-12">
                                        <select class="form-select select2 " id="id_rol" name="id_rol">
                                            <option value="{{$usuario->id_rol > 0 ? $usuario->id_rol : ''}}">{{$usuario->rol_nombre ? $usuario->rol_nombre : ''}}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <input type="hidden" name="usu_id" value="{{ $usuario->id }}">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-danger font-medium waves-effect text-start" data-bs-dismiss="modal">Cerrar</button>
                    <button class="btn btn-light-success font-medium waves-effect text-start" id="btn-modal" data-bs-dismiss="modal">Cambiar</button>
                </div>
            </div>
        </div>
    </div>

    <!---- fin del modal --->

    </div>
    <div class="row">
        <div class="col-lg-4 col-xlg-3 col-md-5">
            <div class="card">
                <div class="card-body">
                    <center class="mt-4"> <img src="{{$usuario->usu_imagen }}"
                            alt="{{ $usuario->usu_nombre }}" class="rounded img-fluid" width="200px">
                        <h4 class="card-title mt-2">{{ $usuario->usu_nombre."  ".$usuario->usu_segnombre }}</h4>
                        <h6 class="card-subtitle">{{ $usuario->usu_appaterno."  ".$usuario->usu_apmaterno }}</h6>
                    </center>
                </div>
                <div>
                    <hr>
                </div>
                <div class="card-body"> 
                    <div class="col-md-6 col-xs-6 b-r"> <strong>Rol Usuario</strong>
                        <br>
                        <p class="text-muted">{{ $rolusuario->rol_nombre }}</p>
                    </div>
                    <div class="col-md-6 col-xs-6 b-r"> <strong>Empresa</strong>
                        <br>
                        @foreach ($usuemp as  $e)
                        <p class="text-muted">{{ $e->emp_nombre }}</p>     
                        @endforeach
                    </div>
                    <div>
                        <button type="button" class="btn btn-light-primary text-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Cambiar credenciales de acceso</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
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
                            <div class="row">
                                <div class="col-md-6 col-xs-6 b-r"> <strong>Nombre Completo</strong>
                                    <br>
                                    <p class="text-muted">{{ $usuario->usu_nombre."  ".$usuario->usu_segnombre."  ".
                                    $usuario->usu_appaterno."  ".$usuario->usu_segnombre }}</p>
                                </div>
                                <div class="col-md-3 col-xs-6 b-r"> <strong>Telefono</strong>
                                    <br>
                                    <p class="text-muted">{{ $usuario->usu_telefono }}</p>
                                </div>
                                <div class="col-md-3 col-xs-6 b-r"> <strong>Correo electronico</strong>
                                    <br>
                                    <p class="text-muted">{{ $usuario->email }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="card-body">
                                    <div class="profiletimeline mt-0">
                                        @foreach ( $logs as $l )
                                        <div class="sl-item">
                                            <div class="sl-left"> <img src="{{$usuario->usu_imagen}}" alt="user" class="rounded-circle" /> </div>
                                            <div class="sl-right">
                                                <div><a href="javascript:void(0)" class="link">{{$usuario->usu_nombre." ".$usuario->usu_appaterno}}</a> <span class="sl-date">{{(new DateTime($l->created_at))->format('d-m-Y H:i')}}</span>
                                                    <p>Accion realizada :</p>
                                                    <div class="row">
                                                        <div>{{$l->log_accion}}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
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
                                            <input type="text" class="form-control" name="usu_nombre" autofocus required value='<?=$usuario->usu_nombre ? $usuario->usu_nombre : old('usu_nombre')?>'>
                                            <label><i class="fas fa-address-book text-orange fill-white me-2"></i>
                                                <span class="border-start ps-3">Nombre</span></label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" name="usu_segnombre" value="<?=$usuario->usu_segnombre ? $usuario->usu_segnombre : old('usu_segnombre') ?>">
                                                <label><i class="fas fa-address-book text-orange fill-white me-2"></i><span class="border-start ps-3">Segundo Nombre</span></label>
                                            </div>
                                    </div>

                                    <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" name="usu_appaterno" required value='<?=$usuario->usu_appaterno ? $usuario->usu_appaterno : old('usu_nombre')?>'>
                                                <label><i class="fas fa-address-book text-orange fill-white me-2"></i>
                                                    <span class="border-start ps-3">Apellido Paterno</span></label>
                                            </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" name="usu_apmaterno" value='<?=$usuario->usu_apmaterno ? $usuario->usu_apmaterno : old('usu_apmaterno')?>'>
                                            <label><i class="fas fa-address-book text-orange fill-white me-2"></i>
                                                <span class="border-start ps-3">Apellido Materno</span></label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="mail" class="form-control" required  name="email" value='<?=$usuario->email ? $usuario->email : old('email')?>'>
                                            <label><i class="far fa-envelope text-orange fill-white me-2"></i><span class="border-start ps-3">Correo Electronido</span></label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" type="file" id="formFile" name="usu_imagen">
                                            <label for="formFile" class="form-label"><i class="fas fa-address-book text-orange fill-white me-2"></i><span class="border-start ps-3">Imagen del usuario</span></label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" required id="usu_rut" class="form-control" name="usu_rut" value="<?=$usuario->usu_rut ? $usuario->usu_rut : old('usu_rut') ?>">
                                            <label><i class="fas fa-address-book text-orange fill-white me-2"></i><span class="border-start ps-3">RUT</span></label>
                                                <div class="invalid-feedback">El rut debe ser ingresado sin puntos y con guión.</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control"  name="usu_telefono" id="usu_telefono" value='<?=$usuario->usu_telefono ? $usuario->usu_telefono : old('usu_telefono')?>'>
                                            <label><i class="fas fa-phone text-orange fill-white me-2"></i><span class="border-start ps-3">Telefono</span></label>
                                            <div class="invalid-feedback">El teléfono ingresado debe tener el formato +56978953712.</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 control-label col-form-label" for="id_pais">Pais</label>
                                            <div class="col-sm-10">
                                                <select class="form-select select2" id="id_pais" name="id_pais">
                                                    <option value="{{$usuario->id_pais}}" selected>{{$usuario->pai_nombre}}</option>
                                                @foreach ($pais as $p)
                                                    <option value="{{ $p['id'] }}">{{$p['pai_nombre']}}</option>
                                                @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 control-label col-form-label" for="id_region">Region</label>
                                            <div class="col-sm-10">
                                                <select class="form-select select2 " id="id_region" name="id_region">
                                                    <option value="{{$usuario->id_region}}" selected>{{$usuario->reg_nombre}}</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 control-label col-form-label" for="id_comuna">Comuna</label>
                                            <div class="col-sm-9">
                                                <select class="form-select select2 " id="id_comuna" name="id_comuna">
                                                    <option value="{{$usuario->id_comuna}}" selected>{{$usuario->com_nombre}}</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <div class="mb-3">
                                                <label>Tipo :</label>
                                                    <div class="c-inputs-stacked">
                                                        <div class="form-check">
                                                            <input type="radio" id="dir_tipo1" name="dir_tipo" class="form-check-input" value="1">
                                                            <label class="form-check-label" for="dir_tipo1">Oficina\Departamento.</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input type="radio" id="dir_tipo2" name="dir_tipo" class="form-check-input" value="2">
                                                            <label class="form-check-label" for="dir_tipo2">Casa\Bodega\Etc.</label>
                                                        </div>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" name="usu_calle" value='<?=$usuario->dir_calle ? $usuario->dir_calle : old('usu_calle')?>'>
                                            <label><i class="fas fa-location-arrow text-orange fill-white me-2"></i><span class="border-start ps-3">Calle</span></label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" name="usu_numcalle" value='<?=$usuario->dir_numero ? $usuario->dir_numero : old('usu_numcalle')?>'>
                                            <label><i class="fas fa-hashtag text-orange fill-white me-2"></i><span class="border-start ps-3">Numero Calle</span></label>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" id="usu_numoficina" class="form-control" name="usu_numoficina" value='<?=$usuario->dir_depto ? $usuario->dir_depto : old('usu_numoficina')?>'>
                                            <label><i class="fas fa-building text-orange fill-white me-2"></i><span class="border-start ps-3">Numero Oficina\Departamento</span></label>
                                        </div>
                                    </div>
                                    <input type="hidden" name="usu_id" value="<?=$usuario->id ? $usuario->id : 0 ?>">
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


    });

</script>

<script>
    
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
    });


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
                cache: !0,
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
                cache: !0,
            },
            escapeMarkup: function (markup) {
                return markup;
            }
        });

        $("#id_rol").select2({
            placeholder: "-=Roles=-",
            dataAdaptable: "",
            allowClear: !0,
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
            },
        });

        $(".id_empresa").change(() => {
            $("#id_rol").val(0).change();
        });

        $(".id_pais").change(() => {
            $("#id_region").val(0).change();
            $("#id_comuna").val(0).change();
        });


    });

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

    
    $('#passwordre').blur(function () {
        if (!validarpassword(this)) {
            $('#passwordre').attr('class', 'form-control is-invalid');
            $('#passwordre').val('');
        } else {
            $('#passwordre').attr('class', 'form-control is-valid');
        }
    });

    function validarpassword(input) {
        var regex = /^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{6,16}$/;
        if (input.value.match(regex)) {
            return true;
        }

        return false;

    }

    function validarnumero(input) {
        var regex = /^\+[\d]+$/;
        if (input.value.match(regex)) {
            return true;
        }
        return false;
    }

    var Fn = {
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
    $("#btn-modal").click( async function (e){
        event.preventDefault();

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

        const request = await fetch("{{ route('usuarios.changepass') }}", {
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
