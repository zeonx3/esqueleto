<nav class="navbar top-navbar navbar-expand-md navbar-dark">
    <div class="navbar-header">
        <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="#"><i
                class="ti-menu ti-close"></i></a>
        <a class="navbar-brand" href="/">
            <b class="logo-icon">
                <img src="../../assets/images/logo-icon.png" alt="homepage" class="dark-logo" />
                <img src="../../assets/images/logo-light-icon.png" style="max-width: 40px;" alt="homepage"
                    class="light-logo" />
            </b>
            <span class="logo-text">
                <img src="../../assets/images/logo-light-text.png" class="light-logo" alt="homepage" />
            </span>
        </a>
        <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="#"
            data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="Toggle navigation">
            <i class="ti-more"></i></a>
    </div>
    <div class="navbar-collapse collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto">
            <li class="nav-item d-none d-md-block">
                <a class="nav-link sidebartoggler waves-effect waves-light" href="#" data-sidebartype="mini-sidebar">
                    <i class="mdi mdi-menu fs-7"></i>
                </a>
            </li>
           
        </ul>

        <ul class="navbar-nav">

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="#"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="{{ auth()->user()->usu_imagen }}" alt="user" class="rounded-circle" style="width:60px;">
                </a>
                <div class="dropdown-menu dropdown-menu-end user-dd animated flipInY">
                    <span class="with-arrow"><span class="bg-primary"></span></span>
                    <div class="d-flex no-block align-items-center p-3 bg-primary text-white mb-2">
                        <div class=""><img src="{{ auth()->user()->usu_imagen }}" alt="user" class="rounded-circle"
                                width="60"></div>
                        <div class="ms-2">
                            <h4 class="mb-0">{{ auth()->user() ? auth()->user()->usu_nombre.' '.auth()->user()->usu_appaterno : 'Invitado' }} </h4>
                            <p class=" mb-0">{{ auth()->user() ? auth()->user()->email : '' }}</p>
                        </div>
                    </div>
                    <a class="dropdown-item" href="{{ route('usuarios.show',auth()->user()->id) }}"><i data-feather="settings"
                            class="feather-sm text-info me-1 ms-1"></i>
                        Configuración de Cuenta</a>
                    <div class="dropdown-divider"></div>
                    <form action="/logout" method="POST">
                        @csrf
                    <button class="dropdown-item" type="submit">
                        <i data-feather="log-out" class="feather-sm text-info me-1 ms-1"></i>
                        Cerrar Sesión
                    </button>
                    </form>
                </div>
            </li>
        </ul>
    </div>
</nav>
