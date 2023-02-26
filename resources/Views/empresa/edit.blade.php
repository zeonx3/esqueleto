<div class="card">
    <div class="border-bottom title-part-padding">
        <span class="card-title mb-0">Modificar Producto</span>
    </div>
    <div class="card-body wizard-content">
        <form method="POST" action="{{ route('productos.update', $producto->id) }}"  role="form" enctype="multipart/form-data" class="validation-wizard wizard-circle mt-5" id="formu" >
            @csrf

            @include('producto.form')

        </form>
    </div>
</div>
