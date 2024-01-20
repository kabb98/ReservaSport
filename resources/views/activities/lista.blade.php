@extends('layouts.app')
@section('content')

<div class="container"> 

    <h1> Actividades </h1>
    @if(auth()->user()->role->name === 'admin')
    <div class="col-1 pt-1"><a class="btn btn-primary" href="{{route('activities.crear')}}">Crear Actividad</a></div>
    @endif
    <a class="btn btn-primary my-3" href="{{action('ActivityController@index', ['ordenar'=> 'fechaHora'])}}">Ordenar por fecha/hora</a>
    <a class="btn btn-primary my-3" href="{{action('ActivityController@index')}}">Ordenar por defecto</a>
    
    @if(session('message'))
      <div class="alert alert-info">
        {{session('message')}}
      </div>
    @endif
    <table class="table table-sm">
  <thead>
    <tr>
      @if(auth()->user()->isAdmin())
      <th scope="col">Id</th>
      @endif
      <th scope="col">Nombre</th>
      @if($ordenar)
      <th scope="col" class="bg-warning">Fecha</th>
      <th scope="col" class="bg-warning">Hora</th>
      @else
      <th scope="col">Fecha</th>
      <th scope="col">Hora</th>
      @endif
      <th scope="col">Instalación</th>
      <th scope="col">Monitor</th>
      

    
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    @foreach($activities as $activity)
    <tr>
      @if(auth()->user()->isAdmin())
      <th scope="row">{{$activity->id}}</th>
      @endif
      
      <td>{{$activity->nombre}}</td>
      <td>{{$activity->fecha}}</td>
      <td>{{$activity->hora}}</td>
      <td>{{$activity->facility->descripcion}}</td>
      <td>{{$activity->instructor->name}}</td>
      
      
      <td>
      
      
      @if(auth()->user()->isAdmin())
      <form action="{{ route('activities.eliminar', $activity) }}" class="d-inline" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                          </form></td>
      @else
      <form action="{{ route('activities.inscribirse', $activity) }}" class="d-inline" method="POST">
                            @csrf
                            <button class="btn btn-dark btn-sm" type="submit">Inscribirse</button>
                          </form></td>
      @endif
    </tr>

    @endforeach

    
    


  </tbody>
</table>


    {{  $activities->links() }}


</div>
@endsection