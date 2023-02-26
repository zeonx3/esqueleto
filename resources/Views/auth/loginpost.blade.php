<div class="card-body">
    <h2>Bienvenido</h2>

    <form class="form-horizontal mt-4 pt-4 needs-validation" novalidate method="POST" action="{{ route('loginn') }}">
        @csrf
        <div class="form-floating mb-3">
            <input type="text" id="emp_rut" class="form-control form-input-bg" name="emp_rut" value="{{ old('emp_rut') }}" autofocus>
            <label for="emp_rut">RUT Empresa</label>
                <div class="invalid-feedback">El rut debe ser ingresado sin puntos y con guión.</div>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control form-input-bg" name="usu_username" id="usu_username" placeholder="Usuario" value="{{ old('usu_username') }}" required>
            <label for="usu_username">Usuario</label>
        </div>
        
        <div class="form-floating mb-3">
            <input type="password" class="form-control form-input-bg" id="text-password" name="password" placeholder="*****" required>
            <label for="text-password">Contraseña</label>
        </div>
        
        <div class="d-flex align-items-center mb-3">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="remember" id="r-me1">
              <label class="form-check-label" for="r-me1">
                Recordar sesión
              </label>
            </div>
        </div>
        <div class="d-flex align-items-stretch button-group mt-4 pt-2">
            <button id="btn-login" type="submit" class="btn btn-info btn-lg px-4">Ingresar</button>
        </div>
        @error('emp_rut'){{ $message }} @enderror
        @error('usu_username'){{ $message }} @enderror
        @error('password'){{  $message  }} @enderror
    </form>
</div>

<script>

    $('#emp_rut').blur(function () {
        if (!Fn.validaRut(this.value)) {
            $('#emp_rut').attr('class', 'form-control is-invalid');
            $('#emp_rut').val('');
        } else {
            $('#emp_rut').attr('class', 'form-control is-valid');
        }
    });
    var Fn = {
        // Valida el rut con su cadena completa "XXXXXXXX-X"
        validaRut: function (rutCompleto) {
            if (!/^[0-9]+[-|‐]{1}[0-9kK]{1}$/.test(rutCompleto))
                return false;
            var tmp = rutCompleto.split('-');
            var digv = tmp[1];
            var rut = tmp[0];
            if (digv == 'K') digv = 'k';
            return (Fn.dv(rut) == digv);
        },
        dv: function (T) {
            var M = 0,
                S = 1;
            for (; T; T = Math.floor(T / 10))
                S = (S + T % 10 * (9 - M++ % 6)) % 11;
            return S ? S - 1 : 'k';
        }
    }

</script>