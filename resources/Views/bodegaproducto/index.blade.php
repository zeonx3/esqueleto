@extends('layouts.app')

@section('template_title')
Producto
@endsection

@section('content')

<!-- -------------------------------------------------------------- -->
<!-- Bread crumb and right sidebar toggle -->
<!-- -------------------------------------------------------------- -->
<div class="page-breadcrumb">
    <div class="row">
        <div class="card card-custom gutter-b" id="kt_blockui_card"></div>
        <div class="col-5 align-self-center">
            <h4 class="page-title">Mantenedor de Productos</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="dashboard.html">Inicio</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Productos</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex no-block justify-content-end align-items-center">

                @if ($producto->id)

                <a class="btn btn-secondary" href="{{ route('productos.index') }}"><i class="fas fa-arrow-left"></i> volver</a>
                    
                @else
                <a type="button" href="#" class="btn waves-effect waves-light btn-rounded btn-outline-secondary">
                    <i data-feather="download" class="feather-sm fill-white me-1"></i> Descargar CSV
                </a>
                @endif

            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <!-- -------------------------------------------------------------- -->
    <!-- Product Sales -->
    <!-- -------------------------------------------------------------- -->
    <div class="row">
        <div class="col-sm-12">
            <!-- ---------------------
            start Product Sales
        ---------------- -->
            @if(is_null($producto->id))

                @include('producto.create')


            @else

                @include('producto.edit')

            @endif

            <!-- ---------------------
            end Product Sales
        ---------------- -->
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12 d-flex align-items-stretch">
            <!-- ---------------------
            start Products of the Month
        ---------------- -->
            <div class="card w-100">
                <div class="card-body">
                    <!-- title -->
                    <div class="d-md-flex align-items-center">
                        <div>
                            <h4 class="card-title agregalh">Listado de Productos</h4>
                        </div>
                        <div class="ms-auto d-flex align-items-center">
                            <div class="dl"></div>
                        </div>
                    </div>
                    <!-- title -->

                    <div class="table-responsive">
                        <table id="myTable" class="table tabla-clientes table-striped table-bordered table-light">
                            <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>imagen</th>
                                    <th>Nombre</th>
                                    <th>Familia</th>
                                    <th>Estado</th>
                                    <th class="sorte-false"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($productos as $producto )
                                    <tr>
                                        <?php 

                                    switch ($producto->pro_estado) {
                                        case 1:
                                            
                                            $estado = "badge bg-success";

                                            break;

                                        case 0:

                                            $estado = "badge bg-danger";

                                            break;
                                        
                                        default:
                                            
                                            break;
                                    }

                                    ?>
                                        <td>{{ ++$i }}</td>
                                        <td>
                                            @if($producto->pro_imagen)

                                                <img src="/storage/{{ $producto->pro_imagen }}"
                                                    alt="{{ $producto->pro_nombre }}" class="rounded img-fluid"
                                                    width="50px">

                                            @endif
                                        </td>
                                        <td>{{ $producto->pro_nombre }}</td>
                                        <td>{{ $producto->cat_nombre }}</td>
                                        <td>
                                            <span class="<?=$estado?>">
                                                {{ $producto->pro_estado == 1 ? 'Activo' : 'Desactivado' }}
                                            </span></td>
                                        <td>
                                            @if ($producto->pro_estado == 1)
                                            <form
                                                action="{{ route('productos.destroy',$producto->id) }}"
                                                method="POST">
                                                <a class="btn btn-sm btn-primary"
                                                    href="{{ route('productos.show',$producto->id) }}">
                                                    <i class="fa fa-fw fa-eye" title="Detalle"></i></a>
                                                <a class="btn btn-sm btn-success"
                                                    href="{{ route('productos.edit',$producto->id) }}">
                                                    <i
                                                    class="fa fa-fw fa-edit" title="Editar"></i>
                                                </a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"><i
                                                        class="fa fa-fw fa-trash" title="Eliminar"></i></button>
                                            </form>
                                            @else
                                                <a class="btn btn-sm btn-primary"
                                                    href="{{ route('productos.show',$producto->id) }}">
                                                    <i class="fa fa-fw fa-eye" title="Detalle"></i></a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>


            <script>
                var form = $(".validation-wizard").show();

                $(".validation-wizard").steps({
                    headerTag: "h6",
                    bodyTag: "section",
                    transitionEffect: "fade",
                    titleTemplate: '<span class="step">#index#</span> #title#',
                    button: "a",
                    labels: {
                        finish: "Guardar"
                    },
                    onStepChanging: function (event, currentIndex, newIndex) {
                        return currentIndex > newIndex || !(3 === newIndex && Number($("#age-2").val()) <
                            18) && (currentIndex < newIndex && (form.find(".body:eq(" + newIndex +
                                ") label.error").remove(), form.find(".body:eq(" + newIndex +
                                ") .error").removeClass("error")), form.validate().settings.ignore =
                            ":disabled,:hidden", form.valid())



                    },
                    onFinishing: function (event, currentIndex) {
                        return form.validate().settings.ignore = ":disabled", form.valid()




                    },
                    onFinished: async function (event, currentIndex) {


                        /* KTApp.blockPage({
                    overlayColor: '#000000',
                    type: 'loader',
                    state: 'primary',
                    message: 'Cargando...'
                });
 */
                        var mensaje = new messageSwal();

                        var formEl = document.forms.formu;
                        var formData = new FormData(formEl);
                        var csrf = $("input[name='csrf']").val();

                        console.log(formData)
                        console.log(formEl)

                        if (!mensaje.messageExist()) {

                        } else {
                            mensaje.setTitle = "Error!";
                            mensaje.setType = 'error';
                            mensaje.mostrarMessage('body');
                        }

                        const request = await fetch("{{ route('productos.store') }}", {
                            method: 'POST',
                            body: formData
                        });

                        const response = await request.json();

                        mensaje.setMessage = response.Message;
                        mensaje.setTitle = response.State == 200 ? "Completado!" : "Error!";
                        mensaje.setType = response.State == 200 ? "success" : "error";

                        mensaje.mostrarMessage('body', function () {
                        location.reload();

                        });

                    }
                });


                $(".validation-wizard").validate({
                    ignore: "input[type=hidden]",
                    errorClass: "text-danger",
                    successClass: "text-success",
                    highlight: function (element, errorClass) {
                        $(element).removeClass(errorClass)
                    },
                    unhighlight: function (element, errorClass) {
                        $(element).removeClass(errorClass)
                    },
                    errorPlacement: function (error, element) {
                        error.insertAfter(element)
                    },
                    rules: {
                        email: {
                            email: !0
                        }
                    }
                })

            </script>
            <script>
                $(".bt-switch input[type='checkbox'], .bt-switch input[type='radio']").bootstrapSwitch();
                var radioswitch = function () {
                    var bt = function () {
                        $(".radio-switch").on("switch-change", function () {


                                $(".radio-switch").bootstrapSwitch("toggleRadioState")
                            }),
                            $(".radio-switch").on("switch-change", function () {


                                $(".radio-switch").bootstrapSwitch("toggleRadioStateAllowUncheck")
                            }),
                            $(".radio-switch").on("switch-change", function () {


                                $(".radio-switch").bootstrapSwitch("toggleRadioStateAllowUncheck", !1)
                            })
                    };
                    return {
                        init: function () {
                            bt()
                        }
                    }
                }();

                $(document).ready(function () {
                    radioswitch.init()

                    /*  $('#myTable').DataTable({
                         "language": {
                             "lengthMenu": "Muestra _MENU_ registros por página",
                             "zeroRecords": "No se encuentran registros",
                             "info": "Mostrando página _PAGE_ de _PAGES_",
                             "infoEmpty": "No hay registros disponibles",
                             "infoFiltered": "(Filtrado de un total de _MAX_ registros)",
                             "search": "Buscar:",
                             "paginate": {
                                 "next":       "Siguiente",
                                 "previous":   "Anterior"
                             },
                         }
                     }); */
                });

                $(function () {

                    


                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $('#id_sub_categoria').select2({
                        placeholder: "-=Sub Categorias=-",
                        allowClear: !0,
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
