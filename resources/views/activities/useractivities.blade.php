@extends('layouts.app')
@section('content')

<div class="container"> 

    <h1> Mis Actividades </h1>
    
    @if(session('message'))
      <div class="alert alert-info">
        {{session('message')}}
      </div>
    @endif
    <table class="table table-sm">
  <thead>
    <tr>
      
      <th scope="col">Nombre</th>
      <th scope="col">Fecha</th>
      <th scope="col">Hora</th>
      <th scope="col">Instalación</th>
      <th scope="col">Monitor</th>
      

    
     
    </tr>
  </thead>
  <tbody>
    @foreach($activities as $activity)
    <tr>
      
      
      <td>{{$activity->nombre}}</td>
      <td>{{$activity->fecha}}</td>
      <td>{{$activity->hora}}</td>
      <td>{{$activity->facility->descripcion}}</td>
      <td>{{$activity->instructor->name}}</td>
      
      
      
      
    </tr>

    @endforeach

  </tbody>
</table>


    {{  $activities->links() }}


</div>
@endsection