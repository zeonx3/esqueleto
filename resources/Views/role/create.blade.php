
<div class="card">
    <div class="border-bottom title-part-padding">
    <span class="card-title">Crear nuevo Rol</span>
    </div>
    <div class="card-body wizard-content">
        <form method="POST" id="formu" role="form" enctype="multipart/form-data">

        @csrf
        @include('role.form')

        </form>
    </div>
</div>

