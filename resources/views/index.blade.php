@extends('template')
@section('title','Care24')
@section('content')
    <div class="  animate__animated animate__fadeIn">
        <section class="mt-2 card bg-opacity-50">

            <div class="card-img-overlay text-center ">

                <h1 class="card-title text-success  fw-bolder  text-center  fs-1"><strong>Care24</strong><br/>cuidados personales y servicios domésticos</h1>

            </div>
            <div class=" bg-success bg-opacity-25">
                <img src="{{ asset('img/manos.png')}}" class="card-img opacity-25 "   alt="manos"  >
            </div>

        </section>
        <section class=" position-relative d-flex flex-column flex-lg-row card-group ">

                <article class="card border-0 text-center border-0 pt-2 " >
                    <div  class=" card-footer bg-white border-0 align-self-center animate__animated animate__fadeIn">
                        <img src="{{ asset('img/anciana.png')}}" class="img-fluid rounded-circle shadow" alt="imagen anciana y cuidador" >

                    </div>
                    <div class="card-body text-md-start m-3 p-2 bg-light rounded">
                        <h1 class="text-success bg-success bg-opacity-25 p-1 text-center rounded fs-2">Sobre nosotros</h1>
                        <p class="">
                            Aunque no hay nadie como tú para cuidar de los tuyos, a veces te resulta imposible y es necesaria la ayuda de un profesional para hacerlo. Porque sabemos lo importante que es para ti y para tu familia,
                            ponemos a tu disposición a los mejores profesionales de ayuda a domicilio que, además de experiencia, tienen una enorme vocación por su trabajo.
                            Los servicios sociosanitarios y de ayuda a domicilio que ofrecemos desde Care24 son prestados por profesionales como auxiliares de clínica,
                            auxiliares de ayuda a domicilio o auxiliares de geriatría, con formación específica y amplia experiencia en el trato con personas.
                            La supervisión constante de todos nuestros servicios es nuestra mayor garantía de calidad. Estamos disponibles siempre que nos necesites, a cualquier hora del día.
                        </p>

                    </div>

                </article>

                <article class=" card border-0 text-center  ">
                    <div  class=" card-footer bg-white border-0 align-self-center  animate__animated animate__fadeIn">
                        <img src="{{ asset('img/cuidadores.png')}}" class="img-fluid  rounded-circle shadow-lg" alt="casa" >

                    </div>
                    <div class="card-body m-3 p-2 bg-light rounded">
                        <h1 class="text-success bg-success bg-opacity-25 rounded  p-1 text-center fs-2">¿Porque elegir a Care24?</h1>
                        <p class=" text-md-start">
                            Nos diferenciamos del resto de empresas por nuestro trabajo eficiente, buscando siempre la mejor solución.
                            Garantizamos la máxima calidad en cada uno de nuestros servicios.
                            Contamos con toda una serie de profesionales puestos a su servicio, que además de asesorar, le ayudarán a usted y su familia en sus necesidades diarias, cuidando de mayores y enfermos,
                            la atención domiciliaria nos lleva a valorar la relación con el paciente como objetivo fundamental de nuestra labor, basada en el respeto a la dignidad humana, la confidencialidad y la profesionalidad,
                            sin olvidar potenciar todo ello, con la calidad humana que demandan nuestros pacientes y su familiares.
                        </p>

                    </div>

                </article>
                <span style="width:70px; height:70px" class="d-none d-lg-inline bg-success bg-opacity-50 shadow rounded-circle position-absolute top-100 start-0 translate-middle"></span>
                <span style="width:50px; height:50px" class=" bg-secondary  opacity-75 shadow rounded-circle position-absolute top-100 start-50 "></span>
                <span style="width:40px; height:40px" class=" bg-success opacity-75 shadow rounded-circle position-absolute top-0 start-100   "></span>
                <span style="width:80px; height:80px" class=" bg-secondary  shadow border border-white rounded-circle position-absolute top-50  start-100 translate-middle "></span>
                <span style="width:60px; height:60px" class=" bg-success  shadow border border-white rounded-circle position-absolute bottom-0 end-0   "></span>
                <span style="width:30px; height:30px" class=" bg-success  shadow rounded-circle position-absolute bottom-50 start-0  translate-middle "></span>

        </section>

        <section class="mt-5">
            <article class="d-lg-flex  text-center ">
                <div class="order-lg-2 m-3 p-2 bg-light rounded">
                    <h1 class="text-success bg-success bg-opacity-25 rounded p-1  fs-2">¿Donde estamos?</h1>
                    <p class="text-lg-start">
                        Disponemos de oficina física, para que en todo momento, si lo necesitas, nuestro equipo te pueda ayudar personalmente.
                        La oficina está en el centro de Benidorm y ofrecemos nuestros servicios en todo el area de la Marina Baja.
                        Para evitar los deplazamientos innecesarios, disponemos de un equipo de atención a cliente funcionando 24 horas al día, los 7 días de la semana.
                        También ponemos nuestra web a disposición de nuestros clientes, para que en cada momento puedan acceder a la información de su interés, así
                        como valorar y comentar los servicios prestados.
                    </p>
                </div>
                <div class="d-flex align-self-center justify-content-center ">
                    <div id="map" style="width: 500px; height:300px" class="order-lg-1 rounded shadow" ></div>
                </div>
            </article>
        </section>

        <section class="mt-2 mb-3">

        </section>


        <section>
            <a class="invisible enlace" data-bs-toggle="offcanvas" href="#offcanvasBottom" role="button" aria-controls="offcanvasExample">
                Link with href
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
    <script src='https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.css' rel='stylesheet' />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <script src="{{asset('js/home.js')}}"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> --}}

    <script src="{{ asset('js/cookies.js') }}"></script>
@endsection
