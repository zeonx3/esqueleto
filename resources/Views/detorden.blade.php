@extends('layouts.ordenapp')


@section('content')
  <head>
    <meta charset="utf-8">
    <title>Gracias por su compra</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <style>
    /* Gracias */

section.gracias .card{
  max-width: 500px;
  margin-left: auto;
  margin-right: auto;
}
section.gracias{
  margin-bottom: 20px;
  padding: 2em 4em;
}

.gracias .list-group-item strong {
  float: right;
}

.gracias .card-body {
  padding: 0;
}

.gracias {
  padding-top: 80px;
}

.gracias h3 {
  padding-bottom: 10px;
  font-size: 1.4em;
}
.gracias .btn-submit{
  background: #f8753f;
  color: #FFF;
  border: solid 2px #d16234;
  position: relative;
  -webkit-border-radius: 55px;
  -moz-border-radius: 55px;
  border-radius: 55px;
}
.gracias .btn-submit:hover{
  background: #d16234;
  color: #FFF;
  border: solid 2px #d16234;
}

footer p{
  margin: 0;
  padding: 0;
}

/* Gracias */
  </style>
  </head>
  <body>

    <section class="gracias">
      <div class="container-fluid">
        <div class="row justify-content-md-center">
          <div class="d-flex ms-auto">
            <a class="ml-auto" id="btn-print" href="{!! route('pdf.orden',['venta' => json_encode($venta)]) !!}"><i class="bi bi-filetype-pdf"></i></a>
          </div> 
          <div class="col-lg-6 col-xs-12">
            <h3 class="text-center">Orden #{{ $venta->ven_codigoorden }}</h3>
            <p class="text-center lead">Hemos enviado el comprobante al correo {{ $venta->ven_correo }}</p>
            <br>
            <div class="card">
              <div class="card-header">
                Detalle de Compra
              </div>
              <div class="card-body">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">Nombre: <strong>{{ $venta->ven_nombre }}</strong></li>
                  <li class="list-group-item">RUT: <strong>{{ $venta->ven_rut }}</strong></li>
                  <li class="list-group-item">Correo: <strong>{{ $venta->ven_email }}</strong></li>
                  <li class="list-group-item">Teléfono: <strong>{{ $venta->ven_telefono }}</strong></li>
                  <li class="list-group-item">Producto: <strong>{{ $producto->pro_nombre }}</strong></li>
                  <li class="list-group-item">Cantidad: <strong>{{ $ventadetalle->vend_cantidad }}</strong></li>
                  <li class="list-group-item">Total: <strong id="total"></strong></li>
                  <li class="list-group-item">Forma de Pago: <strong>{{ $metododepago->met_nombre }}</strong></li>
                  <li class="list-group-item">Estado: <strong>
                          @switch((int)$venta->ven_estado)

                            @case(1)
                              Pagado
                            @break

                            @case(2)
                              Rechazado
                            @break

                            @case(3)
                              Anulado
                            @break

                            @default
                            
                          @endswitch
                      </strong>
                  </li>
                  <li class="list-group-item">Código de Orden: <strong>{{ $venta->ven_codigoorden }}</strong></li>
                  <li class="list-group-item">Metodo de Retiro: <strong>{{ $retiroventa->mev_nombre }}</strong></li>
                  <li class="list-group-item">Contacto: <strong>{{ $retiroventa->ret_contacto }}</strong></li>
                  <li class="list-group-item">Observacion: <strong>{{ $retiroventa->ret_observacion }}</strong></li>
                </ul>
              </div>
            </div>
            <br>
            <br>
            <div class="text-center"><a href="/" class="btn btn-secondary">Volver a Inicio</a></div>
          </div>
        </div>

      </div>
    </section>
  </body>

  <script>
    function number_format_js(number, decimals, dec_point, thousands_point) 
    {
        if (number == null || !isFinite(number)) {
            throw new TypeError("number is not valid");
        }

        if (!decimals) {
            var len = number.toString().split('.').length;
            decimals = len > 1 ? len : 0;
        }

        if (!dec_point) {
            dec_point = '.';
        }

        if (!thousands_point) {
            thousands_point = ',';
        }

        number = parseFloat(number).toFixed(decimals);

        number = number.replace(".", dec_point);

        var splitNum = number.split(dec_point);
        splitNum[0] = splitNum[0].replace(/\B(?=(\d{3})+(?!\d))/g, thousands_point);
        number = splitNum.join(dec_point);

        return number;
    }

    let total = {{$venta->ven_total}};

    total = number_format_js(total,0,',','.')
    document.getElementById('total').innerHTML = "$"+" "+total;

  </script>
@endsection