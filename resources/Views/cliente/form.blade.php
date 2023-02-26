 <!-- Step 1 -->

 <h6>Paso 1</h6>
 <section>
     <div class="row">
         <div class="col-md-6">
            <div class="form-floating mb-3">
                <input type="text"  id="cli_rut" class="form-control" name="cli_rut" value="<?=$cliente->cli_rut ? $cliente->cli_rut : old('cli_rut') ?>">
                <label><i class="fas fa-address-book text-orange fill-white me-2"></i>RUT Cliente</label>
                    <div class="invalid-feedback">El rut debe ser ingresado sin puntos y con guión.</div>
            </div>
         </div>
         <div class="col-md-6">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="cli_nombre" autofocus  value='<?=$cliente->cli_nombre ? $cliente->cli_nombre : old('cli_nombre')?>'>
                <label><i class="fas fa-address-book text-orange fill-white me-2"></i>Razón social</label>
            </div>
         </div>
     </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="cli_giro" autofocus  value='<?=$cliente->cli_nombre ? $cliente->cli_nombre : old('cli_nombre')?>'>
                <label><i class="fas fa-address-book text-orange fill-white me-2"></i>Giro</label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="cli_nomfanta" autofocus  value='<?=$cliente->cli_nomfanta ? $cliente->cli_nomfanta : old('cli_nomfanta')?>'>
                <label><i class="fas fa-address-book text-orange fill-white me-2"></i>Nombre Fantasía</label>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-floating mb-3">
                <input type="text" class="form-control"  name="cli_telefono" id="cli_telefono" value='<?=$cliente->cli_telefono ? $cliente->cli_telefono : old('cli_telefono')?>'>
                <label><i class="fas fa-phone text-orange fill-white me-2"></i>Telefono</label>
                <div class="invalid-feedback">El teléfono ingresado debe tener el formato +56978953712.</div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-floating mb-3">
                <input type="mail" class="form-control"   name="cli_mail" value='<?=$cliente->cli_mail ? $cliente->cli_mail : old('cli_mail')?>'>
                <label><i class="far fa-envelope text-orange fill-white me-2"></i>Correo Electronido</label>
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
                    <option value="{{ old('id_pais')  ? @cliente['id_pais'] : ''}}">{{ old('id_pais') ? @$cliente['cat_nombre'] : '-= Pais =-' }}</option>
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
                    <select class="form-select select2" id="cli_tipo" name="cli_tipo">
                            <option value="0"> -=Tipo Cliente=-</option>
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
                    <select class="form-select select2" id="id_region" name="id_region">
                    </select>
                </div>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="cli_calle" value='<?=$cliente->dir_calle ? $cliente->dir_calle : old('cli_calle')?>'>
                    <label><i class="fas fa-location-arrow text-orange fill-white me-2"></i>Calle</label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3 row">
                <label class="col-sm-3 text-end control-label col-form-label" for="id_comuna">Comuna</label>
                <div class="col-sm-6">
                    <select class="form-select select2" id="id_comuna" name="id_comuna">
                    </select>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="cli_numcalle" value='<?=$cliente->dir_numero ? $cliente->dir_numero : old('cli_numcalle')?>'>
                    <label><i class="fas fa-hashtag text-orange fill-white me-2"></i>Numero Calle</label>
            </div>
        </div>
        
     </div>

    <script>
        $(function () {
                
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $("#id_region").select2({
                    placeholder: "-=Regiones=-",
                    allowClear: true,
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

                $("#id_comuna").select2({
                    placeholder: "-=Comunas=-",
                    allowClear: true,
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

                $(".id_pais").change(() => {
                    $("#id_region").val(0).change();
                    $("#id_comuna").val(0).change();
                });


            });
    </script>
        
        
 </section>


