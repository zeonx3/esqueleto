<div class="card">
    <div class="card-header d-flex">
        <h4 class="card-title">Crear nuevo producto</h4>
        <div class="ms-auto flex-shrink-0">
            <div class="btn-group">
                <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#importmodal"><i class=" fas fa-file-excel"></i>  Importar Productos</a>
            </div>
        </div>
    </div>
    <div class="card-body wizard-content">
        <form enctype="multipart/form-data" class="validation-wizard wizard-circle mt-5" id="formu">

            @csrf

            @include('producto.form')
           
    

        </form>
    </div>
</div>
