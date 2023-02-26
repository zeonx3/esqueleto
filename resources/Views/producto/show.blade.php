@extends('layouts.app')

@section('content')
<section class="content container-fluid">
    <div class="card-header d-flex">
        <h3 class="card-title">Detalle</h3>
        <div class="ms-auto flex-shrink-0">
            <div class="btn-group">
                <a class="btn btn-secondary" href="{{ route('productos.index') }}"><i class="fas fa-arrow-left"></i> volver</a>
            </div>
        </div>
    </div>
    <div class="row">

        <div class="col-lg-4 col-xlg-3 col-md-5">
            <!-- ---------------------
                    start Hanna Gover
                ---------------- -->
            <div class="card">
                <div class="card-body">
                    @if(!is_null($producto->pro_imagen))

                    <center class="mt-4"> <img src="{{ $producto->pro_imagen}}"
                            alt="{{ $producto->pro_nombre }}" class="rounded img-fluid" width="80px">
                       
                    </center>
                    @endif
                    @if($producto->pro_tipo != 3)
                    <small class="text-muted">Unidad de Medida</small>
                    <h6>{{ $producto->unid_nombre.' | '.$producto->unid_nombre_corto }}</h6>
                    @endif
                    <small class="text-muted pt-4 db">Tipo Producto</small>
                    <h6>@switch($producto->pro_tipo)
                            @case(1)
                                Base
                                @break
                            @case(2)
                                Kit
                                @break
                            @case(3)
                                Servicio
                                @break
                            @default
                                No aplica
                                @break

                        @endswitch
                    </h6> <small class="text-muted pt-4 db">SKU</small>
                    <h6>{{ $producto->pro_sku }}</h6>
                    @if($producto->pro_tipo != 3)
                    <small class="text-muted pt-4 db">Codigo de Barra</small>
                    <h6>{{ $producto->pro_codbarra }}</h6>
                    @endif
                    @if (isset($cantidad))
                        @foreach($cantidad as $c)
                        <small class="text-muted pt-4 db">Sucursal - Cantidad</small>
                        <h6>{{ $c->suc_nombre.' - '.$c->sto_cantidad }}</h6>
                        @endforeach
                    @endif

                </div>
            </div>
            <!-- ---------------------
                    end Hanna Gover
                ---------------- -->
        </div>

        <div class="col-lg-8 col-xlg-9 col-md-7">
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
                                <div class="col-md-3 col-xs-3 b-r"> <strong>Nombre</strong>
                                    <br>
                                    <p class="text-muted">{{ $producto->pro_nombre }}</p>
                                </div>
                                <div class="col-md-3 col-xs-6 b-r"> <strong>Familia</strong>
                                    <br>
                                    <p class="text-muted">{{ $producto->cat_nombre }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="card-body">
                                <h4 class="card-title">Descripción</h4>
                            </div>
                                {{ $producto->pro_descripcion }}
                        </div>
                    </div>
                    
                    <div class="tab-pane fade" id="previous-month" role="tabpanel" aria-labelledby="pills-setting-tab">
                        <div class="card-body">
                            <form enctype="multipart/form-data" class=" form-material" id="formu">
                                @csrf
                                @if(EmpresaUsiario(Auth::user()->id) == 13)
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                                <input type="text" class="form-control" name="pro_nombre" autofocus required value='<?=$producto->pro_nombre ? $producto->pro_nombre : old('pro_nombre')?>'>
                                                <label><i class="fas fa-address-book text-orange fill-white me-2"></i>
                                                    <span class="border-start ps-3">Nombre</span></label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                                <input type="text" class="form-control" name="pro_descripcion" autofocus required value='<?=$producto->pro_descripcion ? $producto->pro_descripcion : old('pro_descripcion')?>'>
                                                <label><i class="fas fa-address-book text-orange fill-white me-2"></i>
                                                    <span class="border-start ps-3">Descripción</span></label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" type="file" id="pro_imagen" name="pro_imagen" value="<?=$producto->pro_imagen ? $producto->pro_imagen : old('pro_imagen') ?>">
                                            <label for="formFile" class="form-label"><i class="fas fa-address-book text-orange fill-white me-2"></i><span class="border-start ps-3">Imagen</span></label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-floating mb-3">
                                                <input type="text" class="form-control" name="pro_codigo" required value='<?=$producto->pro_sku ? $producto->pro_sku : old('pro_codigo')?>'>
                                                <label><i class="me-2 fas fa-barcode text-orange fill-white me-2"></i>
                                                    <span class="border-start ps-3">Cod. Producto</span></label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="md-3">
                                            <label for="id_categoria">Familia:

                                            </label>
                                            <select class="form-select select2" id="id_categoria" name="id_categoria">
                                            <option value="{{ old('id_categoria')  ? @producto['id_categoria'] : ''}}">{{ old('id_categoria') ? @$producto['cat_nombre'] : '-= Familias =-' }}</option>
                                            @foreach ($categoria as $cat)
                                                <option value="{{ $cat['id'] }}">{{$cat['cat_nombre']}}</option>
                                            @endforeach
                                            </select>
                                            @error('id_categoria')
                                            <p class="form-text text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="md-3">
                                            <label for="id_sub_categoria">Sub Familia:

                                            </label>
                                            <select class="form-select template-with-flag-icons select2 " id="id_sub_categoria" name="id_sub_categoria">
                                            <option></option>
                                            </select>

                                            @error('id_sub_categoria')
                                            <p class="form-text text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <input type="hidden" name="pro_id" value="<?=$producto->id ? $producto->id : 0 ?>">
                                 
                                </div>
                                <div class="form-group text-end">
                                    <div class="col-sm-12">
                                        <button class="btn btn-success" id="btn-edit">Editar</button>
                                    </div>
                                </div>

                                @else
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <div class="c-inputs-stacked">
                                                <label>Producto/Servicio:</label>
                                                <div class="form-check">
                                                    <input type="radio" id="check_pro" name="pro_servicio" class="btn-check pro_servicio" value="1">
                                                    <label class="btn btn-outline-info rounded-pill font-medium" for="check_pro">Producto</label>
                                                    <input type="radio" id="check_ser" name="pro_servicio" class="btn-check pro_servicio" value="2" <?=$producto->pro_tipo == 3 ? 'checked' : ''?> >
                                                    <label class="btn btn-outline-info rounded-pill font-medium" for="check_ser">Servicio</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                                <input type="text" class="form-control" name="pro_nombre" autofocus required value='<?=$producto->pro_nombre ? $producto->pro_nombre : old('pro_nombre')?>'>
                                                <label><i class="fas fa-address-book text-orange fill-white me-2"></i>
                                                    <span class="border-start ps-3">Nombre</span></label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                                <input type="text" class="form-control" name="pro_descripcion" autofocus required value='<?=$producto->pro_descripcion ? $producto->pro_descripcion : old('pro_descripcion')?>'>
                                                <label><i class="fas fa-address-book text-orange fill-white me-2"></i>
                                                    <span class="border-start ps-3">Descripción</span></label>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="col-md-4">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="pro_bruto" name="pro_bruto" value="<?=$producto->pro_bruto ? $producto->pro_bruto : old('pro_bruto') ?>">
                                            <label><i class="fas fa-address-book text-orange fill-white me-2"></i><span class="border-start ps-3">Bruto</span></label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" name="pro_neto" id="pro_neto" readonly value="<?=$producto->pro_neto ? $producto->pro_neto : old('pro_neto') ?>">
                                            <label><i class="fas fa-address-book text-orange fill-white me-2"></i><span class="border-start ps-3">Neto</span></label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" name="pro_costo" value="<?=$producto->pro_costo ? $producto->pro_costo : old('pro_costo') ?>">
                                            <label><i class="fas fa-address-book text-orange fill-white me-2"></i><span class="border-start ps-3">Costo</span></label>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-floating mb-3">
                                        <div class="mb-3">
                                            <label>Exento :</label>
                                                <div class="c-inputs-stacked">
                                                    <div class="form-check">
                                                    <input type="radio" name="pro_exento" class="form-check-input" value="1">
                                                    <label class="form-check-label" for="pro_exento1">Si</label>
                                                       
                                                    </div>
                                                    <div class="form-check">
                                                    <input type="radio" name="pro_exento" class="form-check-input" value="2">
                                                    <label class="form-check-label" for="dir_tipo2">No</label>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <div class="form-floating mb-3">
                                        <div class="mb-3">
                                            <label>Pesable :</label>
                                                <div class="c-inputs-stacked">
                                                    <div class="form-check">
                                                    <input type="radio" name="pro_pesable" id="pro_pesable" class="form-check-input" value="1">
                                                    <label class="form-check-label" for="pro_pesable1">Si</label>
                                                       
                                                    </div>
                                                    <div class="form-check">
                                                    <input type="radio" name="pro_pesable" class="form-check-input" value="2">
                                                    <label class="form-check-label" for="pro_pesable">No</label>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-floating mb-3">
                                        <div class="mb-3">
                                            <label>Impuesto :</label>
                                                <div class="c-inputs-stacked">
                                                    <div class="form-check">
                                                    <input type="radio" name="pro_int_esp" id="pro_int_esp" class="form-check-input" value="1">
                                                    <label class="form-check-label" for="pro_int_esp">Si</label>
                                                       
                                                    </div>
                                                    <div class="form-check">
                                                    <input type="radio" name="pro_int_esp" class="form-check-input" value="2">
                                                    <label class="form-check-label" for="pro_int_esp">No</label>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" type="file" id="pro_imagen" name="pro_imagen" value="<?=$producto->pro_imagen ? $producto->pro_imagen : old('pro_imagen') ?>">
                                            <label for="formFile" class="form-label"><i class="fas fa-address-book text-orange fill-white me-2"></i><span class="border-start ps-3">Imagen</span></label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="md-3">
                                            <label for="wintType1">Unidad de medida :

                                            </label>
                                            <select class="form-select select2" id="wintType1"
                                                name="pro_uni_medida">
                                            <option value="{{ old('pro_uni_medida')  ? @$producto->pro_uni_medida : ''}}">{{ old('pro_uni_medida') ? @$producto->unid_nombre : '-= Unidad de medida =-' }}</option>
                                            @foreach ($unimedidas as $uni)
                                            <option value="{{ $uni['id'] }}">{{$uni['unid_nombre'].' | '.$uni['unid_nombre_corto']}}</option>
                                            @endforeach
                                            </select>
                                            @error('pro_uni_medida')
                                            <p class="form-text text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-floating mb-3">
                                        <div class="mb-3">
                                            <label>Tipo :</label>
                                                <div class="c-inputs-stacked">
                                                    <div class="form-check">
                                                    <input type="radio" name="id_tipoproducto" id="id_tipoproducto" class="form-check-input" value="1">
                                                    <label class="form-check-label" for="id_tipoproducto">Base</label>
                                                       
                                                    </div>
                                                    <div class="form-check">
                                                    <input type="radio" name="id_tipoproducto" class="form-check-input" value="2">
                                                    <label class="form-check-label" for="id_tipoproducto">Kit</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-floating mb-3">
                                                <input type="text" class="form-control" name="pro_codigo" required value='<?=$producto->pro_sku ? $producto->pro_sku : old('pro_codigo')?>'>
                                                <label><i class="me-2 fas fa-barcode text-orange fill-white me-2"></i>
                                                    <span class="border-start ps-3">Cod. Producto</span></label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="pro_cod_barra" name="pro_cod_barra" value='<?=$producto->pro_codbarra ? $producto->pro_codbarra : old('pro_cod_barra')?>'>
                                                <label><i class="me-2 fas fa-barcode text-orange fill-white me-2"></i>
                                                <span class="border-start ps-3">Cod. Barra</span>
                                                </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="md-3">
                                            <label for="id_categoria">Familia:

                                            </label>
                                            <select class="form-select select2" id="id_categoria" name="id_categoria">
                                            <option value="{{ old('id_categoria')  ? @producto['id_categoria'] : ''}}">{{ old('id_categoria') ? @$producto['cat_nombre'] : '-= Familias =-' }}</option>
                                            @foreach ($categoria as $cat)
                                                <option value="{{ $cat['id'] }}">{{$cat['cat_nombre']}}</option>
                                            @endforeach
                                            </select>
                                            @error('id_categoria')
                                            <p class="form-text text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="md-3">
                                            <label for="id_sub_categoria">Sub Familia:

                                            </label>
                                            <select class="form-select template-with-flag-icons select2 " id="id_sub_categoria" name="id_sub_categoria">
                                            <option></option>
                                            </select>

                                            @error('id_sub_categoria')
                                            <p class="form-text text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <input type="hidden" name="pro_id" value="<?=$producto->id ? $producto->id : 0 ?>">
                                 
                                </div>
                                <div class="form-group text-end">
                                    <div class="col-sm-12">
                                        <button class="btn btn-success" id="btn-edit">Editar</button>
                                    </div>
                                </div>
                                @endif

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

$("#btn-edit").click(async function (e){
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

        console.log(formData)
        console.log(formEl)

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


    });
</script>
<script>
$(function(){

    let pro_tipo = <?=$producto->pro_tipo?>;

    if(pro_tipo == 3)
    {
        $("#pro_cod_barra").parent().parent().hide();
        $("#wintType1").parent().parent().hide();
        $("#pro_exento").parent().parent().parent().hide();
        $("#pro_pesable").parent().parent().parent().parent().parent().hide();
        $("#id_tipoproducto").parent().parent().parent().parent().parent().hide();
        $("#pro_int_esp").parent().parent().parent().parent().parent().hide();
    }

    $(".pro_servicio").on('change', function(){

    var pro_servicio = $(this).val();

    console.log(pro_servicio);
    if(pro_servicio == 1)
    {
        $("#pro_cod_barra").parent().parent().show();
        $("#wintType1").parent().parent().show();
        $("#pro_exento").parent().parent().parent().show();
        $("#pro_pesable").parent().parent().parent().parent().parent().show();
        $("#pro_int_esp").parent().parent().parent().parent().parent().show();
        $("#id_tipoproducto").parent().parent().parent().parent().parent().show();


    }
    else
    {
        $("#pro_cod_barra").parent().parent().hide();
        $("#wintType1").parent().parent().hide();
        $("#pro_exento").parent().parent().parent().hide();
        $("#pro_pesable").parent().parent().parent().parent().parent().hide();
        $("#id_tipoproducto").parent().parent().parent().parent().parent().hide();
        $("#pro_int_esp").parent().parent().parent().parent().parent().hide();
    }

    });

});
</script>

<script>

$(function () {

$.ajaxSetup({
    headers: {
        'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
    }
});

$('#id_sub_categoria').select2({
    placeholder: "-=Sub Categorias=-",allowclear: true, dropdownAutoWidth: true, width: '100%',
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

});

</script>
@endsection
