@if(EmpresaUsiario(Auth::user()->id) != 13)
 <!-- Step 1 -->
 <h6>Paso 1</h6>
 <section>
    <div class="row">
      
        <div class="col-md-6">
            <div class="mb-3">
                <div class="c-inputs-stacked">
                    <label>Producto/Servicio:</label>
                    <div class="form-check">
                        <input type="radio" id="check_pro" name="pro_servicio" class="btn-check pro_servicio" value="1">
                        <label class="btn btn-outline-info rounded-pill font-medium" for="check_pro">Producto</label>
                        <input type="radio" id="check_ser" name="pro_servicio" class="btn-check pro_servicio" value="2">
                        <label class="btn btn-outline-info rounded-pill font-medium" for="check_ser">Servicio</label>
                    </div>
                </div>
            </div>
        </div>
       
    </div>
     <div class="row">
         <div class="col-md-6">
             <div class="form-floating mb-3">
                 <input type="text" class="form-control" placeholder="Nombre" name="pro_nombre" autofocus  value='<?=$producto->pro_nombre ? $producto->pro_nombre : old('pro_nombre')?>'>
                 <label><i class="fas fa-address-book text-orange fill-white me-2"></i>Nombre</label>
             </div>
             <input type="hidden" name="pro_id" value="<?=$producto->id ? $producto->id : 0 ?>">
         </div>
        
         <div class="col-md-6">
             <div class="form-floating mb-3">
                 <div class="row py-2 estado">
                     <div class="col-md-4">
                         <label>Exento</label>
                     </div>
                     <div class="col-md-8">
                         <div class="bt-switch">
                             <input type="checkbox" data-size="large" value="1" name="pro_exento" <?=$producto->pro_exento == 1 ? 'checked' : ''?> />
                         </div>
                     </div>
                 </div>
             </div>
         </div>
        
     </div>
     <div class="row">
         <div class="col-md-6">
             <div class="form-floating mb-3">
                 <input type="text" class="form-control" placeholder="Descripción"  name="pro_descripcion" value="<?=$producto->pro_descripcion ? $producto->pro_descripcion : old('pro_descripcion') ?>">
                 <label><i class="fas fa-briefcase text-orange fill-white me-2"></i>Descripción</label>
             </div>
         </div>
       

         <div class="col-md-6">
             <div class="form-floating mb-3">
                 <div class="row py-2 estado">
                     <div class="col-md-4">
                         <label>Pesable</label>
                     </div>
                     <div class="col-md-8">
                         <div class="bt-switch">
                             <input type="checkbox" data-size="large" id="pro_pesable" name="pro_pesable" value="1"  <?=$producto->pro_pesable == 1 ? 'checked' : '' ?>/>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
       
     </div>
     
     <div class="row">
         <div class="col-md-2">
             <div class="form-floating mb-3">
                 <input type="text" class="form-control" placeholder="Bruto" id="pro_bruto" name="pro_bruto" value = "<?=$producto->pro_bruto ? $producto->pro_bruto  : old('pro_bruto')?>"> 
                 <label><i class="far fa-money-bill-alt text-orange fill-white me-2"></i>Bruto</label>
             </div>
         </div>
         <div class="col-md-2">
             <div class="form-floating mb-3">
                 <input type="text" class="form-control" placeholder="Neto" id="pro_neto" name="pro_neto" id="pro_neto" value="" readonly>
                 <label><i class="far fa-money-bill-alt text-orange fill-white me-2"></i>Neto</label>
             </div>
         </div>
         <div class="col-md-2">
             <div class="form-floating mb-3">
                 <input type="text" class="form-control" placeholder="Costo" name="pro_costo" value="<?=$producto->pro_costo ? $producto->pro_costo : old('pro_costo') ?>">
                 <label><i class="far fa-money-bill-alt text-orange fill-white me-2"></i>Costo</label>
             </div>
         </div>

         <div class="col-md-6">
             <div class="form-floating mb-3">
                 <div class="row py-2 estado">
                     <div class="col-md-4">
                         <label>Impuesto especifico</label>
                     </div>
                     <div class="col-md-8">
                         <div class="bt-switch">
                             <input type="checkbox" data-size="large" id="pro_int_esp" name="pro_int_esp" value="1" <?=$producto->pro_int_esp == 1 ? 'checked' : '' ?>/>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     
 </section>
 <!-- Step 2 -->
 <h6>Paso 2</h6>
 <section>
     <div class="row">
         <div class="col-md-6">
             <div class="mb-3">
                 <label for="formFile" class="form-label">Imagen del producto</label>
                 <input class="form-control" type="file" id="formFile" name="pro_imagen">
             </div>
         </div>
         <div class="col-md-6">
             <div class="mb-3">
                 <label>Tipo producto:</label>
                 <div class="c-inputs-stacked">
                     <div class="form-check">
                         <input type="radio" id="customRadio16" name="pro_tipo" class="form-check-input" value="1" <?=$producto->pro_tipo == 1 ? 'checked' : '' ?>>
                         <label class="form-check-label" for="customRadio16">Base</label>
                     </div>
                     <div class="form-check">
                         <input type="radio" id="customRadio17" name="pro_tipo" class="form-check-input" value="2"
                         <?=$producto->pro_tipo == 2 ? 'checked' : '' ?>>
                         <label class="form-check-label" for="customRadio17">kit</label>
                     </div>
                 </div>
             </div>
         </div>
         <div class="col-md-6">
             <div class="md-3">
                 <label for="wintType1">Unidad de medida :</label>
                 <select class="form-select" id="wintType1"
                     name="pro_uni_medida">
                   <option value="{{ old('pro_uni_medida')  ? @$producto->pro_uni_medida : ''}}">{{ old('pro_uni_medida') ? @$producto->unid_nombre : '-= Unidad de medida =-' }}</option>
                   @foreach ($unimedida as $uni)
                   <option value="{{ $uni['id'] }}">{{$uni['unid_nombre'].' | '.$uni['unid_nombre_corto']}}</option>
                   @endforeach
                 </select>
             </div>
         </div>
         <div class="col-md-6">
             <div class="form-floating mb-3">
                 <input type="text" class="form-control" placeholder="Nombre" name="pro_codigo"  value="<?=$producto->pro_sku ? $producto->pro_sku : ''?>">
                 <label><i class="me-2 mdi mdi-reorder-vertical text-orange fill-white me-2"></i>Codigo de
                     producto</label>
             </div>
         </div>
     </div>
 </section>
 <!-- Step 3 -->
 <h6>Paso 3</h6>
 <section>
    <div class="row">
        <div class="col-md-9">
             <div class="form-floating mb-3">
                 <input type="text" class="form-control" placeholder="Nombre" name="pro_cod_barra" id="pro_cod_barra" value="<?=$producto->pro_codbarra ? $producto->pro_codbarra : ''?>">
                 <label><i class="me-2 fas fa-barcode text-orange fill-white me-2"></i>Codigo de Barra</label>
             </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3 row">
                <div class="input-group mb-3 row">
                    <label class="col-sm-3 text-end control-label col-form-label" for="id_categoria">Familia</label>
                    <div class="col-sm-6">
                        <select class="form-select select2" id="id_categoria" name="id_categoria">
                        <option>-= Familias =-</option>
                        @foreach ($categoria as $cat)
                            <option value="{{ $cat->id }}">{{$cat->cat_nombre}}</option>
                        @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3 row">
                <div class="input-group">
                    <label class="col-sm-3 text-end control-label col-form-label" for="id_sub_categoria">Sub Familia</label>
                    <select class="id_sub_categoria form-select select2 " id="id_sub_categoria" name="id_sub_categoria">
                    </select>
                </div>
            </div>
        </div>
    </div>
 </section>
@else
 <!-- Step 1 -->
 <h6>Paso 1</h6>
<section>
     <div class="row">
         <div class="col-md-6">
             <div class="form-floating mb-3">
                 <input type="text" class="form-control" placeholder="Nombre" name="pro_nombre" autofocus  value='<?=$producto->pro_nombre ? $producto->pro_nombre : old('pro_nombre')?>'>
                 <label><i class="fas fa-address-book text-orange fill-white me-2"></i>Nombre</label>
             </div>
             <input type="hidden" name="pro_id" value="<?=$producto->id ? $producto->id : 0 ?>">
         </div>
        
         <div class="col-md-6">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" placeholder="Descripción"  name="pro_descripcion" value="<?=$producto->pro_descripcion ? $producto->pro_descripcion : old('pro_descripcion') ?>">
                <label><i class="fas fa-briefcase text-orange fill-white me-2"></i>Descripción</label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="formFile" class="input-group-text">Imagen del producto</label>
                <input class="form-control" type="file" id="formFile" name="pro_imagen">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" placeholder="Nombre" name="pro_codigo"  value="<?=$producto->pro_sku ? $producto->pro_sku : ''?>">
                <label><i class="me-2 mdi mdi-reorder-vertical text-orange fill-white me-2"></i>Codigo de
                    producto</label>
            </div>
        </div>
       
        <div class="col-md-6">
            <div class="mb-3 ">
                <label class="input-group-text" for="id_categoria"><span class="border-start">Familia</span></label>
              
                    <select class="form-select select2" id="id_categoria" name="id_categoria">
                    <option>-= Familias =-</option>
                    @foreach ($categoria as $cat)
                        <option value="{{ $cat->id }}">{{$cat->cat_nombre}}</option>
                    @endforeach
                    </select>
         
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label class="input-group-text" for="id_sub_categoria">Sub Familia / Marca</label>
                <select class="id_sub_categoria form-select select2 " id="id_sub_categoria" name="id_sub_categoria">
                </select>
            </div>
        </div>
     </div>
 </section>
@endif
<script>
    $(function(){

        $(".pro_servicio").on('change', function(){

        var pro_servicio = $(this).val();

        console.log(pro_servicio);
        if(pro_servicio == 1)
        {
            $("#pro_cod_barra").parent().parent().show();
            $("#wintType1").parent().parent().show();
            $("#customRadio16").parent().parent().parent().show();
            $("#pro_pesable").parent().parent().parent().parent().parent().show();
            $("#pro_int_esp").parent().parent().parent().parent().parent().show();

        }
        else
        {
            $("#pro_cod_barra").parent().parent().hide();
            $("#wintType1").parent().parent().hide();
            $("#customRadio16").parent().parent().parent().hide();
            $("#pro_pesable").parent().parent().parent().parent().parent().hide();
            $("#pro_int_esp").parent().parent().parent().parent().parent().hide();
        }

        });

    })
</script>


