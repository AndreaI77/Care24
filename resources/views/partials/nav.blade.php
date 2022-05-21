<header>
    <nav class="navbar fixed-top navbar-expand-sm  navbar-dark bg-dark fs-5  ">
        <div class="container-fluid ">
            <div>
                <a class="navbar-brand" href="#">
                    <img src="{{asset('img/logo2Trans.png')}}" alt="logo" width="60">
                </a>
                @if(auth()->check() && auth()->user()->tipo === 'empleado')
                    <button class=" nav-item btn btn-outline-success text-warning me-sm-3 " type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                        <i class="bi bi-justify  ">Menu</i>
                    </button>
                @endif
                <button class="navbar-toggler btn btn-success text-warning ms-4" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
                    <span class="navbar-toggler-icon "></span>
                </button>

            </div>
            <div class="collapse navbar-collapse" id="menu">
                <ul class="navbar-nav">
                    @if(auth()->guest())
                        <li class= "nav-item "><a class= "nav-link  text-sm-center {{setActive('home')}}" href="{{route('home')}}">Conócenos</a></li>
                        <li class= "nav-item"><a class= "nav-link text-sm-center {{setActive('care24')}}" href={{route('care24')}}>Nuestros servicios</a></li>
                        <li class= "nav-item"><a class= "nav-link text-sm-center {{setActive('contact')}}" href="{{route('contact')}}"><i class="bi bi-envelope"></i>&nbsp;Contacto</a></li>

                    @endif
                    @if(auth()->check() && auth()->user()->tipo === 'cliente')
                        {{-- <li class="nav-item "><a class="nav-link  text-sm-center fw-bolder {{setActive('inicio')}}  " href={{route('inicio')}}>Inicio</a></li> --}}
                        <li class="nav-item "><a class="nav-link  text-sm-center fw-bolder  {{setActive('servicios')}}  " href="#">Servicios</a></li>
                        <li class="nav-item"><a class="nav-link text-sm-center fw-bolder  {{setActive('citas')}}" href="#">Citas</a></li>
                        <li class="nav-item"><a class="nav-link text-sm-center fw-bolder  {{setActive('tratamientos')}} " href="#">Tratamientos</a></li>
                    @endif
                </ul>
            </div>
            @if(auth()->guest())
                <ul class="navbar-nav ms-md-auto">
                    <li class="nav-item ">
                    <a class="nav-link text-center  btn  btn-outline-success text-warning p-1" href= "{{route('login')}}"><i class="bi bi-box-arrow-in-right"></i> Acceso usuarios</a>
                    </li>
                </ul>
            @endif
            @if(auth()->check())
                <ul class="navbar-nav  ms-md-auto  me-3 me-lg-4">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"  aria-expanded="false">@if (auth()->user()->foto !== null ) <img class= "rounded" src="{{auth()->user()->foto}}" alt="logo" width="60"/> @else <i class="bi bi-person-circle"></i>@endif</a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#!">Mi perfil</a></li>
                            {{-- <li><a class="dropdown-item" href="#!">Activity Log</a></li> --}}
                            <li><hr class="dropdown-divider" /></li>
                            <li><a class="dropdown-item" href="{{route('logout')}}">Cerrar sesión</a></li>
                        </ul>
                    </li>
                </ul>
            @endif

        </div>
    </nav>
</header>
