@extends('layouts.app')


@section('content')

<div class="card">
    <div class="card-header d-flex">
        <h3 class="card-title">Cotizacion</h3>
        <div class="ms-auto flex-shrink-0">
            <div class="btn-group">
                <a class="btn btn-secondary" href="{{ route('clientes.index') }}"><i class="fas fa-arrow-left"></i> volver</a>
            </div>
        </div>
    </div>
</div>
@if($cliente->cli_tipo == 2)
<div class="card">
    <div class="row">
            
            <div class="card-body wizard-content">
                <div class="card-header">
                    <h5>Datos Prospecto</h5>
                </div>
                <form enctype="multipart/form-data" class=" form-material" id="formu">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" required id="cli_rut" class="form-control" name="cli_rut" value="<?=$cliente->cli_rut ? $cliente->cli_rut : old('cli_rut') ?>">
                                <label><i class="fas fa-address-book text-orange fill-white me-2"></i>RUT Cliente</label>
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
                                <input type="text" class="form-control"  name="cli_telefono" id="cli_telefono" value='<?=$cliente->cli_telefono ? $cliente->cli_telefono : old('cli_telefono')?>'>
                                <label><i class="fas fa-phone text-orange fill-white me-2"></i>Telefono</label>
                                <div class="invalid-feedback">El teléfono ingresado debe tener el formato +56978953712.</div>
                            </div>
                        </div>
                        <input type="hidden" value="{{$cliente->id}}" name="cli_id">
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="mail" class="form-control" required  name="cli_mail" value='<?=$cliente->cli_mail ? $cliente->cli_mail : old('cli_mail')?>'>
                                <label><i class="far fa-envelope text-orange fill-white me-2"></i>Correo Electronido</label>
                            </div>
                        </div>
                        <div class="col-md-4">
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
                        <div class="col-md-4">
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="id_region"><span class="border-start ps-3">Region</span></label>
                                <select class="form-select select2 " id="id_region" name="id_region">
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="id_comuna"><span class="border-start ps-3">Comuna</span></label>
                                <select class="form-select select2 " id="id_comuna" name="id_comuna">
                                </select>
                            </div>
                        </div>

                        <div class="col-md-9">
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
                    </div> 
                    <div class="form-group">
                        <div class="col-sm-12" style="
                        text-align: end;">
                            <button class="btn btn-success" id="btn-next">Siguiente</button>
                        </div>
                    </div>
                </form>
            </div>
        
    </div>
</div>

@else
  
    <div class="card">
        <div class="card-header d-flex">
            <h5 class="card-title">Datos Cliente:</h5>
            
        </div>
        <div class="card-body">
            <form class="form-horizontal">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="mb row">
                            <label for="fname2" class="col-sm control-label col-form-label">RUT Cliente</label>
                            <div class="col-sm">
                                <input type="text" class="form-control" id="fname2" readonly value="{{ $cliente->cli_rut }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="mb row">
                            <label for="lname2" class="col-sm control-label col-form-label">Razón social</label>
                            <div class="col-sm">
                                <input type="text" class="form-control" id="lname2" readonly value="{{$cliente->cli_nombre}}">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="mb row">
                            <label for="uname1" class="col-sm control-label col-form-label">Giro</label>
                            <div class="col-sm">
                                <input type="email" readonly class="form-control" value="{{ $cliente->cli_giro }}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="mb row">
                            <label for="nname" class="col-sm control-label col-form-label">Correo Electronico</label>
                            <div class="col-sm">
                                <input type="text" readonly class="form-control" value="{{ $cliente->cli_mail }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="mb row">
                            <label for="nname" class="col-sm control-label col-form-label">Telefono</label>
                            <div class="col-sm">
                                <input type="text" readonly class="form-control" value="{{ $cliente->cli_telefono }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="mb row">
                            <label for="nname" class="col-sm-2 control-label col-form-label">Direccion</label>
                            <div class="col-sm-6">
                                <input type="text" readonly class="form-control" value="{{  $cliente->dir_calle."  #".$cliente->dir_numero." , ".$cliente->com_nombre." , ".$cliente->reg_nombre." , ".$cliente->pai_nombre }}">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div id="danger-header-modal" class="modal fade" tabindex="-1" 
        aria-labelledby="danger-header-modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-colored-header bg-danger text-white">
                    <h4 class="modal-title" id="danger-header-modalLabel">Eliminar Producto
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h5 class="mt-0">Eliminar Producto</h5>
                    <p>¿Esta seguro de eliminr el producto?.</p>
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

    <div class="card">
        <div class="card-header d-flex">
            <h5 class="card-title">Producto / Servicio:</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-5">
                    <div class="mb-3 row">
                        <label class="col-sm-3 text-end control-label col-form-label" for="id_pais">Familia</label>
                        <div class="col-sm-6">
                            <select class="form-select select2" id="id_categoria" name="id_categoria">
                            <option>-=Familia=-</option>
                            @foreach ($categorias as $cat)
                                <option value="{{ $cat->id }}">{{$cat->cat_nombre}}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="mb row">
                        <label class="col-sm-3 text-end control-label col-form-label" for="id_subcategoria">Sub Familia</label>
                        <div class="col-sm-6">
                            <select class="form-select select2 " id="id_subcategoria" name="id_subcategoria">
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 text-end flex-shrink-0">
                    <div class="btn-group">
                        <button onclick="productos_fields();" class="btn rounded-pill px-4 btn-light-success text-success font-medium waves-effect waves-light" type="button">
                            <i data-feather="plus-circle" class="feather-sm fill-white"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="m_repeater_section mt-4">
                    <form id="frompro">
                        @csrf
                        <input type="hidden"  name="id_cotizacion"value="<?=$cotizacion ? $cotizacion->id : Cotizacioncliente($cliente->id)?>">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="mb-2 row">
                                    <label class="col-sm control-label col-form-label">Producto/Servicio</label>
                                    <select class="form-select select2 select_producto"
                                        name="id_productos[]">
                                        <option></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <label class="col-sm control-label col-form-label">Descuento</label>
                                <div class="mb-2">
                                    <input type="number" class="form-control" name="cop_descuento[]" placeholder="Descuento">
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="mb-2 row">
                                    <label class="col-sm control-label col-form-label">Tipo:</label>
                                    <select class="form-select select2"
                                        name="cop_destipo[]">
                                        <option value="0">-=TIPO=-</option>
                                        <option value="1">%</option>
                                        <option value="2">$</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <label class="col-sm control-label col-form-label">Cantidad</label>
                                <div class="mb-2">
                                    <input type="number" class="form-control" name="cop_cantidad[]" placeholder="Cantidad">
                                </div>
                            </div>
                        </div>
                        <div id="productos_fields" class="mt-4"></div>

                        <div class="ms-auto text-end flex-shrink-0">
                            <div class="btn-group">
                                <button class="btn fa fa-save rounded-pill px-4 btn-light-info font-medium waves-effect waves-light add-pro">
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                
                <table class="tablesaw table-striped table-hover table-bordered table no-wrap tablesaw-columntoggle">
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Valor unitario</th>
                            <th>Cantidad</th>
                            <th>Descuento $</th>
                            <th>Total</th>
                            <th></th>
                        </tr>
                    </thead>
                    
                    @foreach ( $productos as $p)
                        <?php 

                        $total = 0;
                        $final = 0;
                        $a = 0;
                        $b = 0;
                        $total = $p->pro_bruto * $p->cop_cantidad;
                        if($p->cop_destipo == 1)
                        {

                        $a = ($p->cop_descuento/100);
                        $b = ($total * $a);
                        $total = ($total - (int)$b);
                        $final = $p->pro_bruto * $p->cop_cantidad;
                        $final = $final - $total;

                        }
                        else 
                        {
                        
                            $final = $p->cop_descuento;
                            $total = $total - $final;
                        }
                        
                        ?>
                        <tbody>
                            <tr>
                                <td>{{ $p->pro_nombre }}</td>
                                <td>{{ $p->pro_bruto }}</td>
                                <td>{{ $p->cop_cantidad }}</td>
                                @if($p->cop_destipo == 1)
                                    <td>{{ $b }}</td>
                                    @else
                                    <td>{{ $p->cop_descuento }}</td>
                                @endif
                                @if($p->cop_descuento > 0)
                                    <td>{{  $total  }}</td>
                                    @else
                                    <td>{{ $total }}</td>
                                @endif
                                <td>
                                    <button type="buttom" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#danger-header-modal" onclick="btn_delete({{ $p->id }})"><i class="fa fa-fw fa-trash" title="Eliminar" ></i></button>
                                </td>
                            </tr>
                        </tbody>
                        
                    @endforeach
                </table>
                    
            </div>
        </div>
        
    </div>

    @if($cotizacion)
    
    <div class="card">
        <div class="card-header d-flex">
            <h5 class="card-title">Finalizar Cotizacion</h5>
        </div>
        <form id="formcoti" class="form-horizontal striped-rows b-form border-top">
            @csrf
            <input type="hidden" name="id_cotizacion" value="{{$cotizacion->id}}">
            <div class="card-body">
                <div class="row">
                    <div class="col-3">
                        <div class="b-label">
                            <label for="inputEmail3" class="control-label col-form-label">Total:</label>
                        </div>
                    </div>
                    <div class="col-9">
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1">
                                $
                            </span>
                            <input type="number"  readonly class="form-control" id="total_producto" value="{{$cotizacion->cot_bruto}}" aria-label="Amount (to the nearest dollar)">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-3">
                        <div class="b-label">
                            <label for="inputEmail3" class="control-label col-form-label">Descuento Cotizacion:</label>
                        </div>
                    </div>
                    <div class="col-9">
                        <div class="input-group">
                            <select class="form-select select2" id="cot_destipo" name="cot_destipo">
                                <option value="1">%</option>
                                <option value="2">$</option>
                            </select>
                            <input type="number" name="cot_des_total" id="cot_des_total" class="form-control" value="{{$cotizacion->cot_des_total}}" >
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-3">
                        <div class="b-label">
                            <label for="inputEmail3" class="control-label col-form-label">Observacion</label>
                        </div>
                    </div>
                    <div class="col-9">
                        <textarea name="cot_observacion" class="form-control" id="exampleTextarea" rows="3"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-3">
                        <div class="b-label">
                            <label for="inputEmail3" class="control-label col-form-label">Total a Pagar:</label>
                        </div>
                    </div>
                    <div class="col-9">
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input type="number" name="cot_total_coti" id="cot_total_coti" readonly class="form-control" aria-label="Amount (to the nearest dollar)">
                            
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="p-3 border-top">
                <div class="form-group mb-0 text-end">
                    <a type="buttom" target="_blank" href="{{ route('cotizacion.pdf',$cotizacion->id) }}"  class="btn btn-danger px-4 far fa-file-pdf"></a>
                    <button type="submit" id="btn-coti" class="btn btn-info px-4 ">Guardar</button>
                    <button type="submit" class="btn btn-dark rounded-pill px-4 waves-effect waves-light">Cancel</button>
                </div>
            </div>
        </form>

    </div>


    @endif

   


    <script>
        $(function(){
    
            var total = document.getElementById('total_producto').value;
            var destipo = 0;
    
            $("#cot_destipo").change(function(){
                destipo = $(this).val();
                $("#cot_des_total").val(0);
                $("#cot_total_coti").val(0);
            });
    
    
            $('#cot_des_total').change(function(){
                var cot_especial = $(this).val();
    
                console.log(cot_especial);
                console.log(destipo);
                if(destipo == 1)
                {
                let desc = cot_especial / 100;
                let desc_t = total * desc;
                let cot_total = total - desc_t;
    
                $("#cot_total_coti").val(cot_total);
                }
                else
                {
    
                let cot_total = total - cot_especial;
                $("#cot_total_coti").val(cot_total);
                }
    
            });
    
            $("#btn-coti").click( async function(e){
    
                e.preventDefault();
    
                $.blockUI({
                    overlayColor: '#817F7F ',
                    type: 'loader',
                    state: 'primary',
                    message: '<img class="fas fa-spin fa-sync text-white">',
                }, );
    
                var mensaje = new messageSwal();
    
                var formEl = document.forms.formcoti;
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
    
                const request = await fetch("{{ route('cotizacion.finalizar') }}", {
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
                      
                        location.replace("{{ route('cotizaciones.show',$cotizacion->id)}}")
                        
                    }
    
                });
    
            });
    
        })
    </script>
    
    

@endif

<script>

    $(function(){

        $("#btn-next").click( async function(e){

            e.preventDefault();

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

            const request = await fetch("{{ route('cotizacion.store_cliente') }}", {
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
                    location.reload()
                }

            });

        });

    })

</script>

<script>
    
    $(function (){
        
        $('.add-pro').click(async function(e){

            e.preventDefault();

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

            var formEl = document.forms.frompro;
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

            const request = await fetch("{{ route('proceso') }}", {
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
                    $.unblockUI();
                    location.reload();
                }

            });

        });

    })


</script>

<script>
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

        $('#id_subcategoria').select2({
            placeholder: "-=Sub Familia=-",
            allowClear: true,
            dropdownAutoWidth: true,
            width: '100%',
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

        $(".select_producto").select2({
            placeholder: "-=Producto=-",
            allowClear: true,
            dropdownAutoWidth: true,
            width: '100%',
            ajax: {
                url: '{{ route("ajax.producto") }}',
                type: "POST",
                dataType: "json",
                delay: 250,
                data: function (e) {
                    return {
                        q: e.term,
                        id_categoria: $("#id_categoria option:selected").val(),
                        id_subcategoria: $("#id_subcategoria option:selected").val(),
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
                
        });

        $(".bt-switch input[type='checkbox'], .bt-switch input[type='radio']").bootstrapSwitch();
        var radioswitch = function() {
        var bt = function() {
            $(".radio-switch").on("switch-change", function() {
                $(".radio-switch").bootstrapSwitch("toggleRadioState")
            }), $(".radio-switch").on("switch-change", function() {
                $(".radio-switch").bootstrapSwitch("toggleRadioStateAllowUncheck")
            }), $(".radio-switch").on("switch-change", function() {
                $(".radio-switch").bootstrapSwitch("toggleRadioStateAllowUncheck", !1)
            })
        };
        return {
            init: function() {
                bt()
            }
        }
        }();
        $(document).ready(function() {
            radioswitch.init()
        });

        $("#id_pais").change(() => {
                $("#id_region").val(0).change();
                $("#id_comuna").val(0).change();
        });

        $("#id_categoria").change(() => {
            $("#id_subcategoria").val(0).change();
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

    var room = 1;

    function productos_fields() {

        room++;
        var objTo = document.getElementById('productos_fields')
        var divtest = document.createElement("div");
        divtest.setAttribute("class", "mb-3 removeclass" + room);
        var rdiv = 'removeclass' + room;
        divtest.innerHTML = '<div class="row"><div class="col-sm-4"><div class="mb-2 row"><label class="col-sm control-label col-form-label">Producto/Servicio</label><select class="form-select select2 select_producto"name="id_productos[]"><option></option></select></div></div><div class="col-sm-2"><label class="col-sm control-label col-form-label">Descuento</label><div class="mb-2"><input type="number" class="form-control" name="cop_descuento[]" placeholder="Descuento"></div></div><div class="col-sm-2"><div class="mb-2 row"><label class="col-sm control-label col-form-label">Tipo:</label><select class="form-select select2" name="cop_destipo[]"><option value="0">-=TIPO=-</option><option value="2">$</option><option value="1">%</option></select></div></div><div class="col-sm-2"><label class="col-sm control-label col-form-label">Cantidad</label><div class="mb-2"><input type="number" class="form-control" name="cop_cantidad[]" placeholder="Cantidad"></div></div><div class="col-sm-2"><p><br></p><div class="mb-2 row"><button class="btn btn-danger" type="button" onclick="remove_productos_fields(' + room + ');"><i class="fa fa-minus"></i></button></div></div></div>';

        objTo.appendChild(divtest)

        $(".select_producto").select2({
            placeholder: "-=Producto=-",
            allowClear: true,
            dropdownAutoWidth: true,
            width: '100%',
            ajax: {
                url: '{{ route("ajax.producto") }}',
                type: "POST",
                dataType: "json",
                delay: 250,
                data: function (e) {
                    return {
                        q: e.term,
                        id_categoria: $("#id_categoria option:selected").val(),
                        id_subcategoria: $("#id_subcategoria option:selected").val(),
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

        $(".bt-switch input[type='checkbox'], .bt-switch input[type='radio']").bootstrapSwitch();
        var radioswitch = function() {
            var bt = function() {
                $(".radio-switch").on("switch-change", function() {
                    $(".radio-switch").bootstrapSwitch("toggleRadioState")
                }), $(".radio-switch").on("switch-change", function() {
                    $(".radio-switch").bootstrapSwitch("toggleRadioStateAllowUncheck")
                }), $(".radio-switch").on("switch-change", function() {
                    $(".radio-switch").bootstrapSwitch("toggleRadioStateAllowUncheck", !1)
                })
            };
            return {
                init: function() {
                    bt()
                }
            }
        }();
        $(document).ready(function() {
            radioswitch.init()
        });

    }

    function remove_productos_fields(rid) {
        $('.removeclass' + rid).remove();
    }

</script>

<script>

    function btn_delete(id)
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
            url: "{{ route('cotizacionproducto.delete') }}",
            type: "POST",
            dataType: "json",
            data:{
                id : id,
                _token: '{!! csrf_token() !!}'
            }}).done(function (res){
                
                mensaje.setTitle = "Completado!"
                mensaje.setMessage = "Producto Eliminado"
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

</script>


@endsection