 <!-- Step 1 -->


<section>
<div class="row">
    <div class="col-md-6">
        <div class="form-floating mb-3">
                <input type="text" class="form-control" name="suc_nombre">
                <label><i class="fas fa-location-arrow text-orange fill-white me-2"></i>Nombre</label>
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3 row">
            <label class="col-sm-3 text-end control-label col-form-label" for="suc_tipo">Tipo</label>
            <div class="col-sm-6">
                <select class="form-select" id="suc_tipo" name="suc_tipo">
                <option>-=Tipo Sucursal=-</option>
                <option value="1" >Venta</option>
                <option value="2" >Bodega</option>
                <option value="3" >Venta/Bodega</option>
                </select>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-floating mb-3">
                <input type="text" class="form-control" name="suc_calle">
                <label><i class="fas fa-location-arrow text-orange fill-white me-2"></i>Calle</label>
        </div>
    </div>
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
                <input type="text" class="form-control" name="suc_numcalle">
                <label><i class="fas fa-hashtag text-orange fill-white me-2"></i>Numero Calle</label>
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
            <div class="mb-3">
                <label>Tipo de lugar :</label>
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
                <input type="text" class="form-control" name="suc_numero">
                <label><i class="fas fa-hashtag text-orange fill-white me-2"></i>Telefono</label>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-floating mb-3">
                <input type="text" class="form-control" name="suc_contacto">
                <label><i class="fas fa-hashtag text-orange fill-white me-2"></i>Contacto</label>
        </div>
    </div>
    
    <div class="col-md-6">
        <div class="form-floating mb-3">
                <input type="text" id="usu_numoficina" class="form-control" name="suc_numoficina">
                <label><i class="fas fa-building text-orange fill-white me-2"></i>Numero Oficina\Departamento</label>
        </div>
    </div>
    @if(count(EmpresasUser(Auth::user()->id)) > 1)
    <div class="col-md-6">
        <div class="input-group">
            <label class="input-group-text" for="id_empresa"><span class="border-start ps-3">Empresas</span></label>
            <select class="form-select" id="id_empresa" name="id_empresa">
            <option value="{{ old('id_empresa')  ? @producto['id_empresa'] : ''}}">-=Empresas=-</option>
            @foreach (EmpresasUser(Auth::user()->id) as $emp)
                <option value="{{ $emp->id }}">{{$emp->emp_nombre}}</option>
            @endforeach
            </select>
        </div>
    </div>
    @else
    <?php
    ;
    $empresa = EmpresasUser(Auth::user()->id);
   ?>
    <input type="hidden" name="id_empresa" value="<?=$empresa[0]->id?>">
    @endif 
    <div class="p-3 border-top">
        <div class="text-end">
            <button type="button" id="btn-save" name="btn-save" class="btn btn-success rounded-pill px-4 waves-effect waves-light">Guardar</button>
        </div>
    </div>
</div>
</section>



