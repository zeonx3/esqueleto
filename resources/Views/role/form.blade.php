
<div class="card">
    <form class="form">
        <div class="row">
            <div class="col-md-6">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="rol_nombre" autofocus required value='<?=$rol->rol_nombre ? $rol->rol_nombre : old('rol_nombre')?>'>
                    <label>
                        <i class="fas fa-address-book text-orange fill-white me-2"></i>
                        <span class="border-start ps-3">Nombre</span>
                    </label>
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
            <p>
            @foreach ( $permisos as $p)
            
                @if($p->id == 13)
                    @if(count(EmpresasUser(Auth::user()->id)) > 1)
                    <div class="col-md-3">
                        <div class="p-3 border">
                            <h3>{{$p->per_nombre}}</h3>
                            <div class="form-check form-check-inline">
                                @foreach (modulos($p->id) as $m )
                                <input class="form-check-input success" type="checkbox" name="id_modulo[]" id="{{$m->id}}" value="{{$m->id}}" >
                                <label class="form-check-label" for="success3-check">{{$m->mod_nombre}}
                                </label>
                                <br>
                                @endforeach
                            </div>
                        </div>
                        <p>
                    </div>
                    @endif
                @else
                <div class="col-md-3">
                    <div class="p-3 border">
                        <h3>{{$p->per_nombre}}</h3>
                        <div class="form-check form-check-inline">
                            @foreach (modulos($p->id) as $m )
                            <input class="form-check-input success" type="checkbox" name="id_modulo[]" id="{{$m->id}}" value="{{$m->id}}" >
                            <label class="form-check-label" for="success3-check">{{$m->mod_nombre}}
                            </label>
                            <br>
                            @endforeach
                        </div>
                    </div>
                    <p>
                </div>
                @endif
            @endforeach

                  
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

            if (!mensaje.messageExist()) {
            } 
            else 
            {
                mensaje.setTitle = "Error!";
                mensaje.setType = 'error';
                mensaje.mostrarMessage('body');
            }
            console.log(formEl);
            const request = await fetch("{{ route('roles.store') }}", {
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
                location.replace("{{ route('roles.index') }}")
            }

        });

    });

    });
       
</script>
