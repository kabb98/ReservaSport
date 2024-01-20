@extends('layouts.app')
@section('content')
    <style>
        html,body,main,#app{
            margin:0;
            padding:0;
            height: 100%;
            width: 100%;
        }
        #seccion1{
            height: 70%;
            width: 100%;
            background:url('images/crossfit-534615_1280.jpg') center center no-repeat fixed;
            background-size: cover;
        }
        #texto-hero{
            position:absolute;
            top:35%;
            left:50%;
            transform: translate(-50%,-50%);
        }
        .card{
            border:none !important;
            border-radius: 0 !important;
        }
        .card-img-overlay{
            background-color: rgba(0,0,0,0.3);
        }
        .card-img-overlay:hover{
            background-color: rgba(0,0,0,0.5);
            transition: all .2s ease;
        }
    </style>


    <div id="seccion1" class="mt-n4">
        <div id="texto-hero">
            <div class="row justify-content-center">
                <h1 class="text-center col-12">Reserva tu instalación deseada</h1>
                <p class="text-center col-12">Entrena en nuestras instalaciones, y reserva facilmente</p>
                <a href="{{ route('register') }}" class="btn btn-dark">Comenzar</a>
            </div>
        </div>
    </div>

    <div id="seccion2" class="container">
        <div class="row justify-content-center my-5">
            
            <h2 class="col-12 col-md-6 text-center">Un lugar donde ...</h2>
            
        </div>
        <div class="row mt-3">
            <div class="col-12 col-lg-6">
                <p>Podrás disfrutar como lo has hecho toda la vida de una rutina de ejercicio saludable en el gimnasio,piscina,spa u otros que podrás reservar a través de la web acompañado de otros socios.</p>
                <p>Además tendrás la posibilidad de reservar pistas de tenis o fútbol o el deporte que prefirais tú y tus amigos, y poder hacer uso de ellas gracias a nuestras pistas de uso privado (reserva única por hora). </p>
            </div>
            <div class="col-12 col-lg-6">
                <p>Si lo que prefieres es aprender de alguien experimentado y estar guiado en todo momento, puedes optar por alguna de las actividades que ofrecemos supervisadas por monitores cualificados.</p>
                <p>Deseamos que disfrutes de nuestras instalaciones de última generación y que nos eligas como tu principal opción de ahora en adelante!</p>
            </div>
        </div>
    </div>

    <div id="seccion4">
        <div class="container">
            <div class="row my-5">
                <div class="col-12 col-md-4">
                    <a href="{{ route('register') }}">
                    <div class="card bg-dark text-white">
                        <img src="images/pexels-oliver-sjöström-1103829.jpg" class="card-img">
                        <div class="card-img-overlay" >
                            <h3 class="card-title"> <small> Reserva tus </small><br>instalaciones</h3>
                        </div>
                    </div>
                    </a>
                </div>

                <div class="col-12 col-md-4">
                    <a href="{{ route('register') }}">
                    <div class="card bg-dark text-white">
                        <img src="images/pexels-marta-wave-6454050.jpg" class="card-img">
                        <div class="card-img-overlay" >
                            <h3 class="card-title"> <small> Accede a </small><br>Actividades</h3>
                        </div>
                    </div>
                    </a>
                </div>

                <div class="col-12 col-md-4">
                    <a href="{{ route('register') }}">
                    <div class="card bg-dark text-white">
                        <img src="images/pexels-cats-coming-707582.jpg" class="card-img">
                        <div class="card-img-overlay" >
                            <h3 class="card-title"> <small> Cancelación hasta con </small><br>1 dia de antelación</h3>
                        </div>
                    </div>
                    </a>
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