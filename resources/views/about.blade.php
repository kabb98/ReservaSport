    @extends('layouts.app')
    @section('content')
    <style>
        html,body,main,#app{
            margin:0;
            padding:0;
            height: 100%;
            width: 100%;
        }
        .card-body{
            border:none;
            margin:10px 5px 5px 5px;
        }
        #seccion1{
            height: 50%;
            width: 100%;
            background:url('images/pexels-shvets-production-8028616.jpg') center center no-repeat fixed ;
            background-size: cover;
        }
        #texto-hero{
            position:absolute;
            top:25%;
            left:50%;
            transform: translate(-50%,-25%);
        }
    </style>
    <div id="seccion1" class="mt-n4">
        <div id="texto-hero">
            <div class="row justify-content-center">
                <h1 class="text-center col-12">Reservar nunca fue tan fácil</h1>
                <p class="text-center col-12">Disfruta ya de tu instalación deportiva favorita</p>
                <a href="{{ route('register') }}" class="btn btn-dark">Comenzar</a>
            </div>
        </div>
    </div>

    <div class="container my-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 mb-5">
                        <h3 class="text-center">FAQ's</h3>
                    </div>
                    <div class="col-12 col-lg-8">
                        <a data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1" class="card shadow p-3 answer mb-4">
                            <h4 class="text-center text-dark">¿Qué servicios ofrecemos?</h4>
                        </a>
                        <div class="collapse multi-collapse" id="multiCollapseExample1">
                            <div class="card card-body">
                                Ofrecemos servicio de reserva de instalaciones tanto de uso compartido como privado y reserva de actividades.
                            </div>
                        </div>
                        <a data-toggle="collapse" href="#multiCollapseExample2" role="button" aria-expanded="false" aria-controls="multiCollapseExample2" class="card shadow p-3 answer mb-4">
                            <h4 class="text-center text-dark">¿Es necesario algún plan premium para reservar?</h4>
                        </a>
                        <div class="collapse multi-collapse" id="multiCollapseExample2">
                            <div class="card card-body">
                                Rotundamente no. Las reservas están disponibles para todos los socios, estos aparecen en "Mi panel" de la web.
                            </div>
                        </div>
                        <a data-toggle="collapse" href="#multiCollapseExample3" role="button" aria-expanded="false" aria-controls="multiCollapseExample3" class="card shadow p-3 answer mb-4">
                            <h4 class="text-center text-dark">¿Puedo reservar varias horas en un mismo día?</h4>
                        </a>
                        <div class="collapse multi-collapse" id="multiCollapseExample3">
                            <div class="card card-body">
                                Sí, todas las que se deseen, de hecho disponemos de la opción de reservar 2 horas a la vez, por si se quisiera reservas 2 horas seguidas del tirón por ejemplo.
                            </div>
                        </div>
                        <a data-toggle="collapse" href="#multiCollapseExample4" role="button" aria-expanded="false" aria-controls="multiCollapseExample4" class="card shadow p-3 answer mb-4">
                            <h4 class="text-center text-dark">¿Puedo gestionar mis reservas?</h4>
                        </a>
                        <div class="collapse multi-collapse" id="multiCollapseExample4">
                            <div class="card card-body">
                                Podrás gestionar tus reservas en el apartado reservas de la web por si quisieras cancelar reservas o checkear horas y fechas.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <section class="">
        <!-- Footer -->
        <footer class="text-center text-dark bg-light">
            <!-- Grid container -->
            <div class="container p-4 pb-0">
            <!-- Section: CTA -->
            <section class="">
                <p class="d-flex justify-content-center align-items-center">
                <span class="mr-3">Regístrate Gratis</span>
                <a href="{{ route('register') }}" type="button" class="btn btn-outline-dark btn-rounded">
                    ¡Unirme!
                </a>
                </p>
            </section>
            <!-- Section: CTA -->
            </div>
            <!-- Grid container -->

            <!-- Copyright -->
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.05);">
            © 2023 Copyright:
            <a class="text-dark" href="/">ReservaSport</a>
            </div>
            <!-- Copyright -->
        </footer>
        <!-- Footer -->
    </section>
    @endsection  