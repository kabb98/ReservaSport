@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @if(auth()->user()->isAdmin())
            <div class="col-12 col-md-6 p-2">
                <a href="{{route('users.listar')}}" class="btn btn-dark btn-block" >Usuarios</a>
            </div>
            <div class="col-12 col-md-6 p-2">
                <a href="{{route('instructors.listar')}}" class="btn btn-dark btn-block" >Monitores</a>
            </div>
            @endif
            <div class="col-12 col-md-6 p-2">
                <a href="{{route('facilities.listar')}}" class="btn btn-dark btn-block" >@if(! auth()->user()->isAdmin()){{'Ver'}}@endif Instalaciones</a>
            </div>
            <div class="col-12 col-md-6 p-2">
                <a href="{{route('activities.listar')}}" class="btn btn-dark btn-block" >@if(! auth()->user()->isAdmin()){{'Ver'}}@endif Actividades</a>
            </div>
            <div class="col-12 col-md-6 p-2">
                <a href="{{route('bookings.listar')}}" class="btn btn-dark btn-block" >@if(! auth()->user()->isAdmin()){{'Mis'}}@endif Reservas</a>
            </div>
            @if(! auth()->user()->isAdmin())
            <div class="col-12 col-md-6 p-2">
                <a href="{{route('activities.user')}}" class="btn btn-dark btn-block" >Mis Actividades</a>
            </div>
            @endif
        </div>
    </div>
@endsection