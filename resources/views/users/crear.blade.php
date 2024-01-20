@extends('layouts.app')
@section('content')

<div class="container">
<div class="row jutify-content-between">
      <div class="col"><h1> Crear un usuario </h1></div>
      <div class="col-1 pt-1"><a class="btn btn-primary" href="{{route('users.listar')}}">Volver</a></div>
    </div>
    

    @if(session('message'))
    <div class="alert alert-success">{{session('message')}} </div>
    @endif


    <form action="{{route('users.crear')}}" method="POST">
        @csrf

        <div class="form-group">
            <label > Email </label>
            {{-- Errr messages --}}
                @if ($errors->has('email'))
             <ul>
             @foreach ($errors->get('email') as $error)
            <li>{{ $error }}</li>
            @endforeach
            </ul>
             @endif
            <input type="text" class="form-control" name="email">
        </div>

        <div class="form-group">
            <label > Contraseña </label>
            {{-- Errr messages --}}
                @if ($errors->has('password'))
             <ul>
             @foreach ($errors->get('password') as $error)
            <li>{{ $error }}</li>
            @endforeach
            </ul>
             @endif
            <input type="text" class="form-control" name="password">
        </div>

        <div class="form-group">
            <label> Name </label>
            {{-- Errr messages --}}
                @if ($errors->has('name'))
             <ul>
             @foreach ($errors->get('name') as $error)
            <li>{{ $error }}</li>
            @endforeach
            </ul>
             @endif
            <input type="text" class="form-control" name="name" >
        </div>

        <div class="form-group">
            <label> Telefono </label>
            {{-- Errr messages --}}
                @if ($errors->has('telefono'))
             <ul>
             @foreach ($errors->get('telefono') as $error)
            <li>{{ $error }}</li>
            @endforeach
            </ul>
             @endif
            <input type="text" class="form-control" name="telefono" >
        </div>

        <div class="form-group">
            <label> Direccion </label>
            {{-- Errr messages --}}
                @if ($errors->has('direccion'))
             <ul>
             @foreach ($errors->get('direccion') as $error)
            <li>{{ $error }}</li>
            @endforeach
            </ul>
             @endif
            <input type="text" class="form-control" name="direccion" >
        </div>

        <div class="form-group">
            <label> Fecha de Nacimiento </label>
            {{-- Errr messages --}}
                @if ($errors->has('fechaNacimiento'))
             <ul>
             @foreach ($errors->get('fechaNacimiento') as $error)
            <li>{{ $error }}</li>
            @endforeach
            </ul>
             @endif
            <input type="date" class="form-control" name="fechaNacimiento" >
        </div>


        <button type="submit" class="btn btn-primary">Guardar</button>

    </form>
</div>
@endsection