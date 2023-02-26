@extends('layouts.app')


@section('content')

<section class="content container-fluid">
    <div class="card-header d-flex">
        <h3 class="card-title">Detalle</h3>
        <div class="ms-auto flex-shrink-0">
            <div class="btn-group">
                <a class="btn btn-secondary" onclick="back()"><i class="fas fa-arrow-left"></i> volver</a>
            </div>
        </div>
    </div>
    <div>
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
                                <div class="col-md-3 col-xs-3 b-r"> <strong>Nombre del rol</strong>
                                    <br>
                                    <p class="text-muted">{{ $rol->rol_nombre }}</p>
                                </div>
                                <div class="col-md-3 col-xs-6 b-r"> <strong>Empresa</strong>
                                    <br>
                                    <p class="text-muted">{{ $rol->emp_nombre }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="card-body">
                                <h4 class="card-title">Permisos</h4>
                            </div>
                            <div class="table-respondive" >
                                <table id="MyTable" class="table customize-table mb-0 v-middle">
                                    <thead class="table-light" >
                                        <tr>
                                            <th class="border-bottom border-top" >Permiso</th>
                                            <th class="border-bottom border-top" >Vistas</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($permisos as $p )
                                        
                                        <tr>
                                            <td>{{$p->per_nombre}}</td>
                                            <td>
                                                <ul>
                                            <?php foreach($rolmodulos as $r)
                                            {
                                                if($r->id_permiso == $p->id)
                                                {
                                                ?>
                                                    <li><?=$r->mod_nombre?></li>
                                            <?php
                                                }
                                            }?>
                                                </ul>
                                            </td>


                                        </tr> 
                                        @endforeach

                                    </tbody>
                                        
                                </table>
                            </div>
                        </div>
                    </div>
        

                    <div class="tab-pane fade" id="previous-month" role="tabpanel" aria-labelledby="pills-setting-tab">
                        <div class="card-body">
                            <form enctype="multipart/form-data" class=" form-material" id="formu">
                                @csrf
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
                                                <input class="form-check-input success" type="checkbox" name="id_modulo[]" id="{{$m->id}}" value="{{$m->id}}" <?=rolmodulos($m->id,$rol->id) ? 'checked': ''?>>
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
                                    <input type="hidden" name="id_rol" value="{{$rol->id}}">
                                </div>
                                <div class="form-group text-end">
                                    <div class="col-sm-12">
                                        <button class="btn btn-success" id="btn-edit">Editar</button>
                                    </div>
                                </div>
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
          
    function back()
    {
        history.back();
    }
</script>
<script>

    $(function(){

        $("#MyTable").DataTable({
        response: true,
        autowidth: false,
        "language": {
            "lengthMenu": "Paginas "+
            '<select class="custom-select custom-select-sm form-control form-control-sm"><option value="10" >10</option><option value="25" >25</option><option value="50" >50</option><option value="100" >100</option><option value="-1" >Todos</option></select>'+ "registros por pagina",
            "zeroRecords": "Sin registros",
            "info": "Pagina _PAGE_ de _PAGES_",
            "infoEmpty": "No registros disponibles",
            "infoFiltered": "(filtrado de  _MAX_ registros totales)",
            "search": "Buscar:",
            "paginate": {
                "next": "Siguiente",
                "previous": "Anterior"
            }
        }
    });
    })

</script>
@endsection
