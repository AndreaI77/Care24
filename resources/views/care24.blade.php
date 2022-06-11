@extends('template')
@section('title','Care24')
@section('content')

    <div class=" animate__animated animate__fadeIn ">

        <section class=" row row-cols-md-2 align-items-center justify-content-center">
            <article class="  col col-12 col-md-9  col-xxl-8 text-center ">
                <div class=" w-100 rounded bg-light mt-3">

                    <h1 class="text-success bg-success bg-opacity-25 rounded fs-4 ">Asistencia en el hogar</h1>
                    <p>Disponemos de personal profesional para encargarse de todas las tareas del hogar, para que tu
                        y tu
                        familia podeis disfrutar de vuestro tiempo haciendo las actividades que más os gustan.
                        Ofrecemos un servicio flexible y con la periodicidad que mejor se ajuste a vuestras
                        necesidades.
                    </p>
                    <a data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false"
                        aria-controls="collapseExample">
                        <i
                            class="bi bi-chevron-double-down d-block fw-bolder fs-4 pulso animate__animated animate__pulse"></i>

                    </a>
                </div>
                <div class="collapse " id="collapseExample">
                    <div class="row row-cols-2 row-cols-lg-4  mt-2 animate__animated animate__backInLeft">

                        <div class="card border-0 p-2">

                            <img class="align-self-center" src="{{ asset('img/cleaning.png')}}" alt="limpieza" width="80">
                            <h3 class="card-title  text-success mt-3 fs-5">Limpieza</h3>
                            <p class="card-body bg-success bg-opacity-25 rounded p-2">Mantenimiento de un hogar limpio y saludable.
                            </p>
                        </div>

                        <div class="card border-0 p-2 ">
                            <img  class="align-self-center"  src="{{ asset('img/comida.png')}}" alt="limpieza" width="80">
                            <h3 class=" card-title text-success mt-3 fs-5">Alimentación</h3>
                            <p class=" card-body bg-success bg-opacity-25 rounded p-2">Preparación de comidas garantizando la correcta
                                nutrición.</p>
                        </div>

                        <div class="card border-0 p-2 ">
                            <img class="align-self-center" src="{{ asset('img/compras.jpg')}}" alt="limpieza" width="80">
                            <h3 class=" card-title text-success mt-3 fs-5">Compras y recados</h3>
                            <p class="card-body bg-success bg-opacity-25 rounded p-2">Nosotros nos encargamos de hacer tus compras y
                                recados.
                            </p>
                        </div>

                        <div class="card border-0 p-2 ">
                            <img class="align-self-center" src="{{ asset('img/reparacion.png')}}" alt="limpieza" width="80">
                            <h3 class="card-title text-success mt-3 fs-5">Reparaciones</h3>
                            <p class=" card-body bg-success bg-opacity-25 rounded p-2">Avísanos si necesitas hacer alguna reparación.
                                Nos ocuparemos de todo.</p>
                        </div>
                    </div>
                </div>

            </article>
            <div class="col col-7 col-md-3 col-xxl-4  mt-3 mt-xxl-0 p-1 p-xxl-3 animate__animated animate__zoomIn">
                <img src="{{ asset('img/limpiadora.jpg')}}" class="img-fluid rounded-circle shadow align-self-center"
                    alt="limpiadora">
            </div>
        </section>
        <section class="row row-cols-md-2 align-items-center justify-content-center position-relative">

            <article class="col order-md-2 col-12 col-md-9  col-xxl-8 text-center ">
                <div class="w-100 rounded bg-light mt-3">
                    <h1 class="text-success bg-success bg-opacity-25 rounded fs-4">Asistencia personal</h1>
                    <p>Nuestros profesionales de asistencia a domicilio se encargan del cuidado de personas mayores
                        ayudándolos a seguir con su vida diaria sin inconvenientes,
                        ofreciéndoles un servicio que incluye cuidados para todo tipo de patologías, control de
                        medicación, acompañamientos e higiene personal.
                        Además, los cuidadores están implicados en el proyecto de cuidar de tu familia y su pasión
                        es la atención personal y el cuidado de los demás.
                        Dependiéndo de la necesidad de la familia, ofrecemos cuidadoras por horas o internas. </p>

                    <a data-bs-toggle="collapse" href="#ap" role="button" aria-expanded="false"
                        aria-controls="venta">
                        <i
                            class="bi bi-chevron-double-down d-block fw-bolder fs-4 pulso animate__animated animate__pulse"></i>
                    </a>
                </div>
                <div class="collapse" id="ap">
                    <div class="row row-cols-2 row-cols-lg-4  mt-2 animate__animated animate__backInRight">
                        <div class="card border-0 p-2">
                            <img class="align-self-center" src="{{ asset('img/cuidadora.png')}}" alt="limpieza" width="80">
                            <h3 class="card-title text-success mt-3 fs-5">Cuidadores </h3>
                            <p class=" card-body bg-success bg-opacity-25 rounded p-2">Elegimos solamente a los mejores profesionales
                                titulados.</p>
                        </div>
                        <div class="card border-0 p-2 ">
                            <img class="align-self-center" src="{{ asset('img/bath.png')}}" alt="limpieza" width="95">
                            <h3 class="card-title text-success mt-3 fs-5">Higiene personal</h3>
                            <p class="card-body bg-success bg-opacity-25 p-2 rounded">La higiene personal comprende las habilidades
                                relacionadas con el
                                aseo, la comida, el vestido, la higiene y el aspecto personal,
                                fomentando la autonomía de la persona.
                            </p>
                        </div>
                        <div class="card border-0 p-2 ">
                            <img class="align-self-center" src="{{ asset('img/medicamento.png')}}" alt="limpieza" width="80">
                            <h3 class="card-title text-success mt-3 fs-5">Control <br/>de medicación</h3>
                            <p class=" card-body bg-success bg-opacity-25 rounded p-2">La auxiliar se responsabilizará de administrar
                                la medicación pautada
                                por el médico, siguiendo los pasos para la adecuada administración de la misma.</p>
                        </div>
                        <div class="card border-0 p-2 ">
                            <img class="align-self-center" src="{{ asset('img/medico.png')}}" alt="limpieza" width="80">
                            <h3 class="text-success mt-3 fs-5">Citas médicas</h3>
                            <p class="card-body bg-success bg-opacity-25 rounded p-2">Te compañamos a tu cita. Y si no hablas español,
                                disponemos de
                                personal multilingüe.</p>
                        </div>

                    </div>
                </div>
            </article>
            <div class="col order-md-1 col-7 col-md-3 col-xxl-4  p-0 mt-3 p-xxl-2 animate__animated animate__zoomIn">
                <img src="{{ asset('img/manos.webp')}}" class="img-fluid rounded-circle shadow align-self-center " alt="manos">
            </div>
            <span style="width:40px; height:40px" class="d-none d-md-inline bg-success bg-opacity-75 shadow rounded-circle position-absolute top-100 start-0 translate-middle"></span>
            <span style="width:50px; height:50px" class="d-none d-md-inline  bg-secondary  opacity-75 shadow rounded-circle position-absolute top-0 start-100 "></span>
            <span style="width:30px; height:30px" class="d-none d-md-inline bg-secondary bg-opacity-25  shadow border border-white rounded-circle position-absolute bottom-50 end-100 translate-middle  "></span>
        </section>
        <section class="row row-cols-md-2 align-items-center justify-content-center">
            <article class="col col-12 col-md-9 col-xxl-8 text-center">
                <div class="w-100 rounded bg-light mt-3">
                    <h1 class="text-success bg-success bg-opacity-25 rounded fs-4">Teleasistencia</h1>
                    <p>Es un recurso que permite que los usuarios, ante situaciones de emergencia, y con solo pulsar
                        un botón del dispositivo que llevan encima constantemente,
                        puedan entrar en contacto con nuestro centro atendido por personal cualificado y preparado
                        para dar respuesta adecuada a una situación de crisis de carácter social,
                        familiar y/o sanitaria.
                        <br />
                        Este servicio funciona las 24 horas del día, los 365 días del año.
                    </p>
                    <a data-bs-toggle="collapse" href="#Ta" role="button" aria-expanded="false"
                        aria-controls="trabajo">
                        <i
                            class="bi bi-chevron-double-down d-block fw-bolder fs-4 pulso animate__animated animate__pulse"></i>

                    </a>
                </div>
                <div class="collapse p-3" id="Ta">
                    <div class="row row-cols-2  mt-2 animate__animated animate__backInLeft">
                        <div class="card border-0 p-2">
                            <img class="align-self-center" src="{{ asset('img/botonTA.jpg')}}" alt="limpieza" width="90">
                            <h3 class="text-success mt-3 fs-5">Botón SOS</h3>
                            <p class=" card-body bg-success bg-opacity-25 rounded p-2">
                                En cualquier situación de peligro o inseguridad: caídas, accidentes, infartos, incendios... pueden pulsar el botón SOS
                                para emergencias que avisará de forma directa a nuestro Centro de Atención al cliente.
                            </p>
                        </div>
                        <div class="card border-0 p-2 ">
                            <img class="align-self-center" src="{{ asset('img/teleOP.png')}}" alt="limpieza" width="130">
                            <h3 class="text-success mt-3 fs-5">Teleoperador</h3>
                            <p class="card-body bg-success bg-opacity-25 p-2 rounded">
                                Nuestro profesional avisa a la familia y/o a los servicios de emergencia.
                                Gracias a la geolocalización del dispositivo, la ayuda llega con rapidez.
                            </p>
                        </div>


                    </div>
                </div>
            </article>
            <div
                class=" col-7 col-md-3 col-xxl-4  mt-3 mt-xxl-0 p-0 p-xxl-2 animate__animated animate__zoomIn ">
                <img src="{{ asset('img/teleasistencia.jpg')}}" class="img-fluid rounded-circle shadow align-self-center"
                    alt="limpiadora">
            </div>
        </section>
        <section class="row row-cols-md-2 align-items-center justify-content-center position-relative ">

            <article class="col col-12 col-md-9 col-xxl-8 text-center order-md-2">
                <div class="w-100 rounded bg-light mt-3">
                    <h1 class="text-success bg-success bg-opacity-25 rounded fs-4">Asistencia administrativa</h1>
                    <p>Para dar un servicio completo y ajustado a las expectativas y necesidades del
                        cliente,
                        nuestro equipo le puede ayudar con cualquier trámite administrativo.
                        Si necesita solicitar ayudas o renovar alguna documentación, no dude en contactarnos.</p>
                    <a data-bs-toggle="collapse" href="#admin" role="button" aria-expanded="false"
                        aria-controls="trabajo">
                        <i
                            class="bi bi-chevron-double-down d-block fw-bolder fs-4 pulso animate__animated animate__pulse"></i>
                    </a>
                </div>
                <div class="collapse p-3" id="admin">
                    <div class="row row-cols-2 card-group  mt-2 animate__animated animate__backInRight">
                        <div class="card border-0 p-2">
                            <img class="align-self-center" src="{{ asset('img/cuidadora.png')}}" alt="limpieza" width="80">
                            <h3 class="text-success mt-3 fs-5">Tareas administrativas</h3>
                            <p class=" card-body bg-success bg-opacity-25 rounded p-2">
                                Le ayudamos a poner orden en su administración, para que lo tenga todo a día.
                            </p>
                        </div>
                        <div class="card border-0 p-2 ">
                            <img class="align-self-center" src="{{ asset('img/bath.png')}}" alt="limpieza" width="95">
                            <h3 class="text-success mt-3 fs-5">Ayudas y certificados</h3>
                            <p class="card-body bg-success bg-opacity-25 p-2 rounded">
                                Colaboramos con los servicios sociales y los ayuntamientos para
                                poder tramitar cualquier ayuda con mayor brevedad posible.
                            </p>
                        </div>


                    </div>
                </div>
            </article>
            <div
                class="col-7 col-md-3 col-xxl-4  mt-3 mt-xxl-0 p-1 p-xxl-2 order-md-1 animate__animated animate__zoomIn">
                <img src="{{ asset('img/contable.webp')}}" class="img-fluid rounded-circle shadow align-self-center "
                    alt="casa">
            </div>
            <span style="width:40px; height:40px" class=" d-none d-md-inline bg-success opacity-75 shadow rounded-circle position-absolute top-0 start-100  translate-middle  "></span>
            <span style="width:70px; height:70px" class=" d-none d-md-inline bg-secondary  shadow border border-white rounded-circle position-absolute top-50  start-0 translate-middle "></span>
            <span style="width:30px; height:30px" class=" d-none d-md-inline bg-success  shadow rounded-circle position-absolute bottom-50 start-100  "></span>

        </section>
        <section>
            <a class="invisible enlace" data-bs-toggle="offcanvas" href="#offcanvasBottom" role="button" aria-controls="offcanvasExample">
                Link
            </a>
            <div class="offcanvas offcanvas-bottom text-center max-vh-20 " tabindex="-1" id="offcanvasBottom"  aria-labelledby="offcanvasBottomLabel">
                <div class="offcanvas-header ms-auto">
                    <button type="button " class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body small">
                    <h5 class="" >Política de cookies</h5>
                    <p>Esta página usa cookies para mejorar su experiencia y proporcionar funcionalidades adicionales. </p>
                    <div>
                    <a href="{{route('cookies')}}">Detalles</a>
                    <a class="ms-3 me-3" href="{{route('privacidad')}}">Política de privacidad</a>
                    <a class="btn btn-success text-warning "  data-bs-toggle="offcanvas" href="#offcanvasBottom" role="button" aria-controls="offcanvasExample">
                        Aceptar
                    </a>
                    </div>

                </div>
            </div>
        </section>
    </div>
@endsection
@section('js')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <script src="{{ asset('js/cookies.js') }}"></script>
@endsection
