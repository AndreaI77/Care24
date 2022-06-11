<header>
    <nav class="navbar fixed-top navbar-expand-sm  navbar-dark bg-dark fs-5  ">
        <div class="container-fluid ">
            <div>
                <a class="navbar-brand" href="#">
                    <img src="{{asset('img/logo2Trans.png')}}" alt="logo" width="60">
                </a>
                @if(auth()->check() && auth()->user()->tipo !== 'cliente')
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
                        <li class="nav-item "><a class="nav-link  text-sm-center fw-bolder  {{setActive('servicios')}}  " href="{{route('servicios.index')}}">Servicios</a></li>
                        <li class="nav-item"><a class="nav-link text-sm-center fw-bolder  {{setActive('citas')}}" href="{{route('citas.index')}}">Citas médicas</a></li>
                        <li class="nav-item"><a class="nav-link text-sm-center fw-bolder  {{setActive('tratamientos')}} " href="{{route('tratamientos.index')}}">Tratamientos</a></li>
                        <li class="nav-item"><a class="nav-link fw-bolder d-sm-none d-md-inline-block" href={{route('horarios.index')}}>Agenda</a></li>
                        <li class="nav-item"><a class="nav-link fw-bolder d-sm-none d-lg-inline-block" href={{route('mapa.index')}}>Mapa</a></li>
                        <li class= "nav-item dropdown d-none d-sm-inline d-lg-none">
                            <a class= "nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Más...</a>
                            <ul class="dropdown-menu">
                                <li class="dropdown-item"><a class="nav-link fw-bolder d-md-none text-success" href={{route('horarios.index')}}>Agenda</a></li>
                                <li class="dropdown-item"><a class=" nav-link fw-bolder text-success " href={{route('mapa.index')}}>Mapa</a></li>
                                <li class="dropdown-item"><a class="nav-link fw-bolder text-success " href={{route('comentarios.index')}}>Comentarios</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
                @if(auth()->guest())
                <ul class="navbar-nav ms-sm-auto">
                    <li class="nav-item ">
                    <a class="nav-link text-center  btn  btn-outline-success text-warning p-1" href= "{{route('login')}}"><i class="bi bi-box-arrow-in-right"></i> Acceso usuarios</a>
                    </li>
                </ul>
            @endif
            @if(auth()->check())

                <ul class="navbar-nav  ms-sm-auto  me-3 me-lg-4">
                    {{-- <button class="nav-item btn btn-outline-success text-warning float-end me-4 p-1" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Comentarios</button> --}}
                    @if(auth()->user()->tipo === 'cliente')
                        <li class="nav-item float-end me-4 d-sm-none d-lg-inline "><a class="nav-link fw-bolder " href={{route('comentarios.index')}}>Comentarios</a></li>
                    @else
                    <li class="nav-item float-end me-4  "><a class="nav-link fw-bolder " href={{route('comentarios.index')}}>Comentarios</a></li>
                    @endif
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"  aria-expanded="false">
                            @if (auth()->user()->foto != null && auth()->user()->foto != "" )
                                <img class= "rounded-circle" src="{{asset(auth()->user()->foto)}}" alt="" width="60"/>
                            @else <i class="bi bi-person-circle"></i>
                            @endif
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end text-success" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item text-success" href="{{route('perfil.index')}}"><i class="bi bi-person-fill"></i> Mi perfil</a></li>
                            <li><hr class="dropdown-divider" /></li>
                            <li><a class="dropdown-item text-success" href="{{route('logout')}}"><i class="bi bi-dash-circle"></i> Cerrar sesión</a></li>
                        </ul>
                    </li>
                </ul>
            @endif
            </div>


        </div>
    </nav>
</header>
