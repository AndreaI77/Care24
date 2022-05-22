<div class="offcanvas offcanvas-start bg-dark text-white " tabindex="-1" id="offcanvasExample" data-bs-scroll="true" data-bs-backdrop="true" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header ">
        <img src="{{asset('img/logo2Trans.png')}}" alt="logo" width="60">
      <h5 class="offcanvas-title" id="offcanvasExampleLabel">Menu</h5>
      <button  class="btn btn-outline-success text-warning" data-bs-dismiss="offcanvas" aria-label="Close"><i class="bi bi-x-lg fw-bolder"></i></button>
    </div>
    <div class="offcanvas-body ">

        <div>
            <a class="nav-link fs-5 text-white" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
            Empleados <i class="bi bi-chevron-down float-end"></i>
            </a>
        </div>
        <div class="collapse " id="collapseExample">
            <div class="card card-body bg-dark">
                <ul class="nav flex-column border-start border-1 border-success ">
                    <li class="nav-item ">
                        <a  class="nav-link fw-bolder fs-5 text-success  {{setActive('empleados')}} " href={{route('empleados.index')}}>Empleados</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bolder fs-5 text-success  {{setActive('empleados.create')}} " href={{route('empleados.create')}}>Nuevo empleado</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bolder fs-5 text-success  {{setActive('empleados.create')}} " href={{route('empleados.index')}}>Horarios</a>
                    </li>
                </ul>

            </div>
        </div>

        <div>
            <a class="nav-link fs-5 text-white" data-bs-toggle="collapse" href="#clientes" role="button" aria-expanded="false" aria-controls="clientes">
            Clientes <i class="bi bi-chevron-down float-end"></i>
            </a>
        </div>
        <div class="collapse " id="clientes">
            <div class="card card-body bg-dark">
                <ul class="nav flex-column border-start border-1 border-success">
                    <li class="nav-item">
                        <a class="nav-link fw-bolder fs-5 text-success" href={{route('clientes.index')}}>Clientes</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link fw-bolder fs-5 text-success" href={{route('clientes.create')}}>Nuevo cliente</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link fw-bolder fs-5 text-success" href={{route('mapa.index')}}>Mapa clientes</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link fw-bolder fs-5 text-success" href={{route('galeria.index')}}>Galería</a>
                  </li>
                </ul>
            </div>
        </div>
        <div>
            <a class="nav-link fs-5 text-white" data-bs-toggle="collapse" href="#servicios" role="button" aria-expanded="false" aria-controls="servicios">
                Servicios <i class="bi bi-chevron-down float-end"></i>
            </a>
        </div>
        <div class="collapse " id="servicios">
            <div class="card card-body bg-dark">
                <ul class="nav flex-column border-start border-1 border-success">
                    <li class="nav-item">
                        <a class="nav-link fw-bolder fs-5 text-success" href={{route('servicios.index')}}>Servicios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bolder fs-5 text-success" href={{route('servicios.create')}}>Nuevo servicio</a>
                    </li>
                  </ul>
            </div>
        </div>
        <div>
            <a class="nav-link fs-5 text-white" data-bs-toggle="collapse" href="#citas" role="button" aria-expanded="false" aria-controls="citas">
                Citas médicas <i class="bi bi-chevron-down float-end"></i>
            </a>
        </div>
        <div class="collapse " id="citas">
            <div class="card card-body bg-dark">
                <ul class="nav flex-column border-start border-1 border-success">
                    <li class="nav-item">
                        <a class="nav-link fw-bolder fs-5  text-success" href={{route('citas.index')}}>Citas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bolder fs-5 text-success" href={{route('citas.create')}}>Nueva cita</a>
                    </li>
                </ul>
            </div>
        </div>
        <div>
            <a class="nav-link fs-5 text-white" data-bs-toggle="collapse" href="#tratamientos" role="button" aria-expanded="false" aria-controls="tratamientos">
                Tratamientos<i class="bi bi-chevron-down float-end"></i>
            </a>
        </div>
        <div class="collapse " id="tratamientos">
            <div class="card card-body bg-dark">
                <ul class="nav flex-column border-start border-1 border-success">
                    <li class="nav-item">
                        <a class="nav-link fw-bolder fs-5 text-success" href={{route('tratamientos.index')}}>Tratamientos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bolder fs-5 text-success" href={{route('tratamientos.create')}}>Nuevo tratamiento</a>
                    </li>
                  </ul>
            </div>
        </div>
        <div>
            <a class="nav-link fs-5 text-white" data-bs-toggle="collapse" href="#incidencias" role="button" aria-expanded="false" aria-controls="incidencias">
                Incidencias <i class="bi bi-chevron-down float-end"></i>
            </a>
        </div>
        <div class="collapse " id="incidencias">
            <div class="card card-body bg-dark">
                <ul class="nav flex-column border-start border-1 border-success">
                    <li class="nav-item">
                        <a class="nav-link fw-bolder fs-5 text-success" href={{route('incidencias.index')}}>Incidencias</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bolder fs-5 text-success" href={{route('incidencias.create')}}>Nueva Incidencia</a>
                    </li>
                  </ul>
            </div>
        </div>
        <div>
            <a class="nav-link fs-5 text-white" data-bs-toggle="collapse" href="#informes" role="button" aria-expanded="false" aria-controls="informes">
                Informes <i class="bi bi-chevron-down float-end"></i>
            </a>
        </div>
        <div class="collapse " id="informes">
            <div class="card card-body bg-dark">
                <ul class="nav flex-column border-start border-1 border-success">
                    <li class="nav-item">
                        <a class="nav-link fw-bolder fs-5 text-success" href={{route('informes.index')}}>Informes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bolder fs-5 text-success" href={{route('informes.create')}}>Nuevo informe</a>
                    </li>
                  </ul>
            </div>
        </div>
        <a class="nav-link fw-bolder fs-5 text-success" href={{route('comentarios.index')}}>Ver comentarios</a>

    </div>
  </div>
