@extends('layouts.app')
@section('content')

<div class="container"> 

<div class="row jutify-content-between">
      <div class="col"><h1> Crea una actividad </h1></div>
      <div class="col-1 pt-1"><a class="btn btn-primary" href="{{route('activities.listar')}}">Volver</a></div>
    </div>

@if(session('message'))
<div class="alert alert-success">{{session('message')}}</div>
@endif

<form  action="{{route('activities.guardar')}}" method="POST">
@csrf

  <div class="form-group">
    <label >Nombre</label>
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
    <label >Fecha</label>
    {{-- Errr messages --}}
    @if ($errors->has('fecha'))
      <ul>
        @foreach ($errors->get('name') as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    @endif
    <input type="date" min="{{date('Y-m-d')}}" class="form-control" name="fecha" >
    
  </div>
  
  <div class="form-group">
    <label >Hora</label>
     <select class="custom-select" name="hora" id="hora" required>
        @foreach($disponibles as $hora)
        <option value="{{$hora}}">{{$hora}}</option>
        @endforeach
     </select>
    
  </div>

  <div class="form-group">
    <label >Instalación</label>
      <select class="custom-select" name="facility" id="facility" required>

        @foreach($facilities as $facility)
        <option value="{{$facility->id}}">{{$facility->descripcion}}</option>
        @endforeach

      </select>
    
  </div>

  <div class="form-group">
    <label >Instructor</label>
  
    <select class="custom-select" name="instructor" id="instructor" required>
      @foreach($instructors as $instructor)
      <option value="{{$instructor->id}}">{{$instructor->name}}</option>
      @endforeach
    </select>
    
  </div>



  <button type="submit" class="btn btn-primary">Guardar</button>
</form>

{{--@if (count($errors) > 0)
  <br><label>Error al introducir los datos</label></br>
@endif
--}}


</div>
@endsection