<div class="card">
    <form class="form-horizontal">
        <div class="card w-100">
            @if(count(EmpresasUser(Auth::user()->id)) > 1)
            <div class="mb-3 row">
                <label class="col-sm-3 text-end control-label col-form-label">Empresa</label>
                <div class="col-sm-6">
                    <select class="form-select select2" id="id_empresa" name="id_empresa">
                    <option>-=Empresas=-</option>
                    @foreach (EmpresasUser(Auth::user()->id) as $emp)
                        <option value="{{ $emp->id }}">{{$emp->emp_nombre}}</option>
                    @endforeach
                    </select>
                </div>
            </div>
            @else
            <?php
            
            $empresa = EmpresasUser(Auth::user()->id);
          
           ?>
            <input type="hidden" name="id_empresa" value="<?=$empresa[0]->id?>">
            @endif
            <div class="mb-3 row">
                <label class="col-sm-3 text-end control-label col-form-label" for="cat_tipo">Tipo Familia</label>
                <div class="col-sm-6">
                    <select class="form-select select2" id="cat_tipo" name="cat_tipo">
                    <option value="0"> -=Tipo Familia=-</option>
                    <option value="1">Familia</option>
                    <option value="2">Sub Familia</option>
                   
                    </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-3 text-end control-label col-form-label" for="id_categoria">Familia</label>
                <div class="col-sm-6">
                    <select class="form-select select2" id="cat_padre" name="cat_padre">
                    <option>-= Familia =-</option>
                    @foreach ($cat_padre as $cat)
                        <option value="{{ $cat->id }}">{{$cat->cat_nombre}}</option>
                    @endforeach
                    </select>
                </div>
            </div>
            
            <div class="mb-3 row">
                <label class="col-sm-3 text-end control-label col-form-label" for="sub_familia">Sub Familias</label>
                <div class="col-sm-6">
                    <select class="form-select select2" id="sub_familia" name="sub_familia">
                    <option>-= Sub Familia =-</option>
                    @foreach ($cat_sub as $c)
                        <option value="{{ $c->id }}">{{$c->cat_nombre}}</option>
                    @endforeach
                    </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="com1" class="col-sm-3 text-end control-label col-form-label">Nombre</label>
                <div class="col-sm-6">
                    <input type="text" name="cat_nombre" class="form-control" id="com1" placeholder="Nombre">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="formFile" class="col-sm-3 text-end control-label col-form-label">Imagen</label>
                <div class="col-sm-6">
                    <input class="form-control" type="file" id="cat_imagen" name="cat_imagen">
                </div>
            </div>
            <div class="mb-3 row">
                <div class="form-group row mb-3" id="dif_evaluaciondiv">
                    <label class="col-md-3 text-end" style="font-weight: bold;">Nueva Sub Familias</label>
                    <div class="col-md-3">
                        <div class="form-check">
                            <input class="form-check-input" id="subcheck" name="subcheck"  type="radio" value=1>
                            <label class="form-check-label">Si</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="subcheck" type="radio" value=2 checked>
                                <label class="form-check-label">No</label>
                        </div>
                    </div>
                </div>
            </div>

        <div class="p-3 border-top">
            <div class="text-end">
                <button type="button" id="btn-save" name="btn-save" class="btn btn-success rounded-pill px-4 waves-effect waves-light">Guardar</button>
            </div>
        </div>
    </form>
</div>

<script>
 
    $(function (){

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

            const request = await fetch("{{ route('categorias.store') }}", {
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
                location.replace("{{ route('categorias.index') }}")
            }

        });

    });

    });
       
</script>
