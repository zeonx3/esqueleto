 <!-- Step 1 -->

 <h6>Paso 1</h6>
 <section>
     <div class="row">
         <div class="col-md-6">
             <div class="form-floating mb-3">
                 <input type="text" class="form-control" name="usu_nombre" autofocus>
                 <label><i class="fas fa-address-book text-orange fill-white me-2"></i>Nombre</label>
             </div>
             <input type="hidden" name="usu_id" value="<?=$usuario->id ? $usuario->id : 0 ?>">
         </div>
         <div class="col-md-6">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="usu_appaterno" >
                <label><i class="fas fa-address-book text-orange fill-white me-2"></i>Apellido Paterno</label>
            </div>
        </div>
     </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="usu_segnombre">
                <label><i class="fas fa-address-book text-orange fill-white me-2"></i>Segundo Nombre</label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="usu_apmaterno">
                    <label><i class="fas fa-address-book text-orange fill-white me-2"></i>Apellido Materno</label>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-floating mb-3">
                <input type="text" id="usu_rut" class="form-control" name="usu_rut">
                <label><i class="fas fa-address-book text-orange fill-white me-2"></i>RUT</label>
                    <div class="invalid-feedback">El rut debe ser ingresado sin puntos y con guión.</div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-floating mb-3">
                <input class="form-control" type="file" id="formFile" name="usu_imagen"">
                <label for="formFile" class="form-label">Imagen del usuario</label>
            </div>
        </div>
    </div>
 </section>

 <!-- Step 2 -->
 <h6>Paso 2</h6>
 <section>
     
        <div class="row">
            @if(count(EmpresasUser(Auth::user()->id))>1)
            <div class="col-md-6">
                <div class="mb-3 row">
                    <label class="col-sm-3 text-end control-label col-form-label" for="id_pais">Empresa</label>
                    <div class="col-sm-6">
                        <select class="form-select select2" id="id_empresa" name="id_empresa">
                        <option>-= Empresas =-</option>
                        @foreach (EmpresasUser(Auth::user()->id) as $emp)
                            <option value="{{ $emp->id }}">{{$emp->emp_nombre}}</option>
                        @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3 row">
                    <label class="col-sm-6 text-end control-label col-form-label" for="id_rol">Roles</label>
                    <div class="col-sm-6">
                        <select class="form-select select2" id="id_rol" name="id_rol">
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control"   name="username">
                    <label><i class="far address-book text-orange fill-white me-2"></i>Username</label>
                </div>
            </div>
            @else
            
            <?php
            ;
            $empresa = EmpresasUser(Auth::user()->id);
           ?>
            <input type="hidden" name="id_empresa" value="<?=$empresa[0]->id?>">
            <div class="col-md-6">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control"   name="username">
                    <label><i class="far address-book text-orange fill-white me-2"></i>Username</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3 row">
                    <label class="col-sm-2 text-end control-label col-form-label" for="id_rol">Roles</label>
                    <div class="col-sm-10">
                        <select class="form-select select2" id="id_role" name="id_rol">
                        <option>-= Roles =-</option>
                        @foreach ($roles as $emp)
                            <option value="{{ $emp->id }}">{{$emp->rol_nombre}}</option>
                        @endforeach
                        </select>
                    </div>
                </div>
            </div>
            @endif
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-floating mb-3">
                    <input type="mail" class="form-control"   name="email">
                    <label><i class="far fa-envelope text-orange fill-white me-2"></i>Correo Electronido</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating mb-3">
                        <input type="text" class="form-control"  name="usu_telefono" id="usu_telefono">
                        <label><i class="fas fa-phone text-orange fill-white me-2"></i>Telefono</label>
                        <div class="invalid-feedback">El teléfono ingresado debe tener el formato +56978953712.</div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-floating mb-3">
                    <input type="password" id="password" class="form-control" name="password">
                    <label><i class="fa fa-key text-orange fill-white me-2"></i>Contraseña</label>
                    <div class="invalid-feedback">la contraseña debe contener minimo 6 caracteres una mayuscula, minuscula, numero y simbolo.</div>

                </div>
            </div>

            <div class="col-md-6">
                <div class="form-floating mb-3">
                    <input type="password" id="passwordre" class="form-control" name="passwordre">
                    <label><i class="fa fa-key text-orange fill-white me-2"></i>Confirmas Contraseña</label>
                </div>
            </div>
        </div>
 </section>
 <!-- Step 3 -->
 <h6>Paso 3</h6>
 <section>
     <div class="row">
        <div class="col-md-6">
            <div class="mb-3 row">
                <label class="col-sm-3 text-end control-label col-form-label" for="id_pais">Pais</label>
                <div class="col-sm-6">
                    <select class="form-select" id="id_pais" name="id_pais">
                    <option >-= Pais =-</option>
                    @foreach ($pais as $cat)
                        <option value="{{ $cat->id }}">{{$cat->pai_nombre}}</option>
                    @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="usu_calle">
                    <label><i class="fas fa-location-arrow text-orange fill-white me-2"></i>Calle</label>
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
                    <input type="text" class="form-control" name="usu_numcalle">
                    <label><i class="fas fa-hashtag text-orange fill-white me-2"></i>Numero Calle</label>
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
        <div class="col-md-6">
            <div class="form-floating mb-3">
                    <input type="text" id="usu_numoficina" class="form-control" name="usu_numoficina">
                    <label><i class="fas fa-building text-orange fill-white me-2"></i>Numero Oficina\Departamento</label>
            </div>
        </div>
     </div>
 </section>


