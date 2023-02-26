 <!-- Step 1 -->

 <h6>Paso 1</h6>
 <section>
     <div class="row">
         <div class="col-md-6">
             <div class="form-floating mb-3">
                 <input type="text" class="form-control" placeholder="Nombre" name="pro_nombre" autofocus required value='<?=$producto->pro_nombre ? $producto->pro_nombre : old('pro_nombre')?>'>
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
                 <input type="text" class="form-control" placeholder="Descripción" required name="pro_descripcion" value="<?=$producto->pro_descripcion ? $producto->pro_descripcion : old('pro_descripcion') ?>">
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
                             <input type="checkbox" data-size="large" name="pro_pesable" value="1"  <?=$producto->pro_pesable == 1 ? 'checked' : '' ?>/>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <div class="row">
         <div class="col-md-2">
             <div class="form-floating mb-3">
                 <input type="text" class="form-control" placeholder="Bruto" name="pro_bruto" value = "<?=$producto->pro_bruto ? $producto->pro_bruto  : old('pro_bruto')?>"> 
                 <label><i class="far fa-money-bill-alt text-orange fill-white me-2"></i>Bruto</label>
             </div>
         </div>
         <div class="col-md-2">
             <div class="form-floating mb-3">
                 <input type="text" class="form-control" placeholder="Neto" name="pro_neto" value="<?=$producto->pro_neto ? $producto->pro_neto : old('pro_neto') ?>">
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
                             <input type="checkbox" data-size="large" name="pro_int_esp" value="1" <?=$producto->pro_int_esp == 1 ? 'checked' : '' ?>/>
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
                   <option>{{ old('pro_uni_medida') ? @$producto->unid_nombre : '-= Unidad de medida =-' }}</option>
                   @foreach ($unimedida as $uni)
                   <option value="{{ $uni['id'] }}">{{$uni['unid_nombre'].' | '.$uni['unid_nombre_corto']}}</option>
                   @endforeach
                 </select>
                 @error('pro_uni_medida')
                 <p class="form-text text-danger">{{ $message }}</p>
                 @enderror
             </div>
         </div>
         <div class="col-md-6">
             <div class="form-floating mb-3">
                 <input type="text" class="form-control" placeholder="Nombre" name="pro_codigo" required value="<?=$producto->pro_sku ? $producto->pro_sku : ''?>">
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
         <div class="col-md-12">
             <div class="form-floating mb-3">
                 <input type="text" class="form-control" placeholder="Nombre" name="pro_cod_barra" required value="<?=$producto->pro_codbarra ? $producto->pro_codbarra : ''?>">
                 <label><i class="me-2 mdi mdi-reorder-vertical text-orange fill-white me-2"></i>Codigo de Barra</label>
             </div>
             
                <div class="input-group mb-3">
                <label class="input-group-text" for="id_categoria">Categoria</label>
                <select class="form-select select2" id="id_categoria" name="id_categoria">
                <option value="{{ old('id_categoria')  ? @producto['id_categoria'] : ''}}">{{ old('id_categoria') ? @$producto['cat_nombre'] : '-= Categorias =-' }}</option>
                @foreach ($categoria as $cat)
                    <option value="{{ $cat['id'] }}">{{$cat['cat_nombre']}}</option>
                @endforeach
                </select>
                </div>
                <div class="input-group mb-3">
                    <label class="input-group-text" for="id_sub_categoria">Sub Categoria</label>
                    <select class="form-select select2 " id="id_sub_categoria" name="id_sub_categoria">
                    </select>
                </div>
            
         </div>
     </div>
 </section>


