 <!-- Step 1 -->
 <h6>Paso 1</h6>
 <section>
     <div class="row">
         <div class="col-md-6">
            <div class="form-floating mb-3">
                <input type="text" id="emp_rut" class="form-control" name="emp_rut" value="<?=$empresa->emp_rut ? $empresa->emp_rut : old('emp_rut') ?>">
                <label><i class="fas fa-address-book text-orange fill-white me-2"></i>RUT Empresa</label>
                    <div class="invalid-feedback">El rut debe ser ingresado sin puntos y con guión.</div>
            </div>
         </div>
         <div class="col-md-6">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="emp_nombre" autofocus  value='<?=$empresa->emp_nombre ? $empresa->emp_nombre : old('emp_nombre')?>'>
                <label><i class="fas fa-address-book text-orange fill-white me-2"></i>Razón social</label>
            </div>
         </div>
     </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="emp_giro"  value='<?=$empresa->emp_giro ? $empresa->emp_giro : old('emp_nombre')?>'>
                <label><i class="fas fa-address-book text-orange fill-white me-2"></i>Giro</label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-floating mb-3">
                <input type="mail" class="form-control"  name="emp_mail" value='<?=$empresa->emp_mail ? $empresa->emp_mail : old('emp_mail')?>'>
                <label><i class="far fa-envelope text-orange fill-white me-2"></i>Correo Electronido</label>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-floating mb-3">
                <input type="text" class="form-control"  name="emp_telefono" id="emp_telefono" value='<?=$empresa->emp_telefono ? $empresa->emp_telefono : old('emp_telefono')?>'>
                <label><i class="fas fa-phone text-orange fill-white me-2"></i>Telefono</label>
                <div class="invalid-feedback">El teléfono ingresado debe tener el formato +56978953712.</div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="emp_contacto"  value='<?=$empresa->emp_contacto ? $empresa->emp_contacto : old('emp_contacto')?>'>
                <label><i class="fas fa-address-book text-orange fill-white me-2"></i>Contacto</label>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-floating mb-3">
                <input class="form-control" type="file" name="emp_logo" id="formFile" >
                <label for="formFile" class="form-label"><i class="fas fa-address-book text-orange fill-white me-2"></i>Logo Empresa</label>
            </div>
        </div>
    </div>
    
 </section>
 <!-- Step 2 -->
 <h6>Paso 2</h6>
 <section>
     <div class="row">
        <div class="col-md-6">
            <div class="mb-3 row">
                <label class="col-sm-3 text-end control-label col-form-label" for="id_pais">Pais</label>
                <div class="col-sm-6">
                    <select class="form-select select2" id="id_pais" name="id_pais">
                    <option value="{{ old('id_pais')  ? @empresa['id_pais'] : ''}}">{{ old('id_pais') ? @$empresa['pai_nombre'] : '-= Pais =-' }}</option>
                    @foreach ($pais as $cat)
                        <option value="{{ $cat->id }}">{{$cat->pai_nombre}}</option>
                    @endforeach
                    </select>
                </div>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="mb-3 row">
                <label class="col-sm-3 text-end control-label col-form-label" for="cli_tipo">Tipo</label>
                <div class="col-sm-6">
                    <select class="form-select select2" id="emp_tipo" name="emp_tipo">
                            <option value="0"> -=Tipo Empresa=-</option>
                            <option value="1">Cliente</option>
                            <option value="2">Prospecto</option>
                    </select>
                </div>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="mb-3 row">
                <label class="col-sm-3 text-end control-label col-form-label" for="id_region">Region</label>
                <div class="col-sm-6">
                    <select class="form-select" id="id_region" name="id_region">
                    </select>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="emp_calle" value='<?=$empresa->dir_calle ? $empresa->dir_calle : old('emp_calle')?>'>
                    <label><i class="fas fa-location-arrow text-orange fill-white me-2"></i>Calle</label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3 row">
                <label class="col-sm-3 text-end control-label col-form-label" for="id_comuna">Comuna</label>
                <div class="col-sm-6">
                    <select class="form-select" id="id_comuna" name="id_comuna">
                    </select>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="emp_numcalle" value='<?=$empresa->dir_numero ? $empresa->dir_numero : old('emp_numcalle')?>'>
                    <label><i class="fas fa-hashtag text-orange fill-white me-2"></i>Numero Calle</label>
            </div>
        </div>
 </section>


