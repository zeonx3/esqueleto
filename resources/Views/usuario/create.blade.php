<div class="card">
    <div class="border-bottom title-part-padding">
        <h4 class="card-title mb-0">Crear nuevo Usuario</h4>
    </div>
    <div class="card-body wizard-content">
        <form enctype="multipart/form-data" class="validation-wizard wizard-circle mt-5" id="formu">

            @csrf

            @include('usuario.form')

        </form>
    </div>
</div>