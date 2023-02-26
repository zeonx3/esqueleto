
{{-- @if($errors->any())
    <ul>
        @foreach ( $errors->all() as $error )
            <li> {{ $error}} </li>
        @endforeach
    </ul>
@endif --}}


<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            {{ Form::label('Nombre de Bodega / Sucursal') }}
            {{ Form::text('bod_nombre', $bodega->bod_nombre, ['class' => 'form-control' . ($errors->has('bod_nombre') ? ' is-invalid' : ''), 'placeholder' => 'Bod Nombre']) }}
            {!! $errors->first('bod_nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            <label for="bod_retiro" class="form-label">Tipo Retiro</label>
            <select class="form-control js-example-basic-single " id="bod_retiro" name="bod_retiro">
                <option value="{{ old('bod_retiro') ? @$bodega->bod_retiro : ''}}">{{ old('bod_retiro') ? @$bodega->bod_nombre : '-=Tipo Retiro=-'}}</option>
                <option value="{{ 1 }}">Retiro en tienda </option> 
                <option value="{{ 2 }}">Solo Envio </option> 
                <option value="{{ 3 }}">Retiro en tienda y Envio </option> 
            </select>
            @error('bod_retiro')
            <p class=" form-text text-danger">{{ $message }}</p>
            @enderror
               
        </div>
        <div class="form-group">
            <label for="id_empresa" class="form-label">Empresas</label>
            <select class="form-control js-example-basic-single " id="id_empresa" name="id_empresa" >
                <option value="{{ old('id_empresa') ? @$bodega->id_empresa : '' }}">{{ old('id_empresa') ? @$bodega->emp_nombre : '-= Empresas =-' }}</option>
            @foreach ($empresa as $emp)
                <option  value="{{ $emp['id'] }}">{{ $emp['emp_nombre'] }}</option>
            @endforeach
            </select>
            @error('id_empresa')
            <p class=" form-text text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="id_pais" class="form-label">Pais</label>
            <select class="form-control js-example-basic-single " id="id_pais" name="id_pais">
                <option value="{{ old('id_pais') ? @$bodega->id_pais : '' }}">{{ old('id_pais') ? @$bodega->pai_nombre : '-= Paises =-' }}</option>
            @foreach ($pais as $pai)
                <option  value="{{ $pai['id'] }}">{{ $pai['pai_nombre'] }}</option>
            @endforeach
            </select>
            @error('id_pais')
            <p class=" form-text text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="id_region" class="form-label">Region</label>
            <select class="form-control" id="id_region" name="id_region">
            </select>
            @error('id_region')
            <p class=" form-text text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="id_comuna" class="form-label">Comuna</label>
            <select class="form-control" id="id_comuna" name="id_comuna">
              
            </select>
            @error('id_comuna')
            <p class=" form-text text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            {{ Form::label('Calle') }}
            {{ Form::text('bod_calle', $bodega->bod_nombre, ['class' => 'form-control' . ($errors->has('bod_calle') ? ' is-invalid' : ''), 'placeholder' => 'Bod Calle']) }}
            {!! $errors->first('bod_calle', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Numero Calle') }}
            {{ Form::text('bod_num_calle', $bodega->bod_nombre, ['class' => 'form-control' . ($errors->has('bod_num_calle') ? ' is-invalid' : ''), 'placeholder' => 'N° Calle']) }}
            {!! $errors->first('bod_num_calle', '<div class="invalid-feedback">:message</div>') !!}
        </div>   
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</div>

<script type="text/JavaScript" scr="select2.js">

$(function() {

    $.ajaxSetup({
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            }
        });

    $('.js-example-basic-single').select2();

    $("#id_region").select2({
				placeholder: "-=Regiones=-",
                    allowClear:!0,
                    ajax:{
                        url:'{{ route("ajax") }}',
                        type: "POST",
                        dataType:"json",
                        delay:250,
                        data: function(e){
                            return{
                                q : e.term,
                                id_pais : $("#id_pais option:selected").val(),
                                page : e.page || 1
                            }
                        },
                        processResults: function(data, params){
                            params.page = params.page || 1;
                            return {
                                results: data.items,
                                pagination: {
                                    more: (params.page * 50) < data.total_count
                                }
                            };
                        },
                        success : function(data) {
                            console.log(data);
                        },
                        cache:!0
                    },
                    escapeMarkup: function(markup) {
                        return markup;
                    }
			});

            $("#id_comuna").select2({
				placeholder: "-=Comunas=-",
                    allowClear:!0,
                    ajax:{
                        url:'{{ route("comunas") }}',
                        type: "POST",
                        dataType:"json",
                        delay:250,
                        data: function(e){
                            return{
                                q : e.term,
                                id_region : $("#id_region option:selected").val(),
                                page : e.page || 1
                            }
                        },
                        processResults: function(data, params){
                            params.page = params.page || 1;
                            return {
                                results: data.items,
                                pagination: {
                                    more: (params.page * 50) < data.total_count
                                }
                            };
                        },
                        success : function(data) {
                            console.log(data);
                        },
                        cache:!0
                    },
                    escapeMarkup: function(markup) {
                        return markup;
                    }
			});

    $(".id_pais").change(() => {
            $("#id_region").val(0).change();
            $("#id_comuna").val(0).change();
        });

});
</script>