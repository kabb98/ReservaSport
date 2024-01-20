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
            background:url('images/pexels-pixabay-274506.jpg') center center no-repeat fixed ;
            background-size: cover;
        }
        #texto-hero{
            position:absolute;
            top:35%;
            left:50%;
            transform: translate(-50%,-35%);
        }
    </style>
    <div id="seccion1" class="mt-n4">
        <div id="texto-hero">
            <div class="row justify-content-center text-white">
                <h1 class="text-center col-12">El éxito es la suma de un gran equipo</h1>
                <p class="text-center col-12">Contactanos ante cualquier duda</p>
                
            </div>
        </div>
    </div>
    <div id="seccion2" class="container my-5">
            <div class="row mb-5">
                <div class="col">
                    <h2>Estamos a tu disposición, todos los miembros del equipo de ReservaSport.</h2>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12 col-lg-6">
                    <p>En ReservaSport pordrás gestionar tus reservas y las actividades a las que acudas a tu manera.</p>
                    <p>Sin embargo, no dudes en pedir ayuda a uno de nuestros empleados ya que pueden checkear y modificar tus reservas en caso de problema.</p>
                </div>
                <div class="col-12 col-lg-6">
                    <p>Además, podremos registrar tus datos en tu perfil desde recepción para poco a poco, poder aportarte una ayuda más personalizada.</p>
                    <p>Esperamos tu consulta y desde aquí te invitamos a ser parte de la comunidad de ReservaSport.</p>
                </div>
            </div>
        </div>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-10 col-lg-4 mb-5">
                <div class="row justify-content-center ">
                    <img class="mb-3 d-block" heigth="50" width="50" src="images/sobre.png" alt="">
                </div>
                <div class="row justify-content-center">
                    <h5><a class="text-dark" href="mailto:info@reservasport.es">info@reservasport.es</a></h5>      
                </div>
            </div>
            <div class="col-10 col-lg-4 mb-5">
                <div class="row justify-content-center ">
                    <img class="mb-3 d-block" heigth="50" width="50" src="images/phone-call.png" alt="">
                </div>
                <div class="row justify-content-center">
                    <h5><a class="text-dark" href="tel:+34676767676">+34 676 767 676</a></h5>       
                </div>
            </div>
            <div class="col-10 col-lg-4 mb-5">
                <div class="row justify-content-center ">
                    <img class="mb-3 d-block" heigth="50" width="50" src="images/messenger.png" alt="">
                </div>
                <div class="row justify-content-center">
                    <h5>@reservasport</h5>       
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