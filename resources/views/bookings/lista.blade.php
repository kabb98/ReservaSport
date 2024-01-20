
@extends('layouts.app')
@section('content')


<div class="container"> 

    <h1> @if(! auth()->user()->isAdmin()) {{'Mis'}} @endif Reservas </h1>

    <a class="btn btn-primary my-3" href="{{action('BookingController@index', ['ordenar'=> 'fechaHora'])}}">Ordenar por fecha/hora</a>
    <a class="btn btn-primary my-3" href="{{action('BookingController@index')}}">Ordenar por defecto</a>


    <table class="table sortable">
  <thead>
    <tr>
      @if(auth()->user()->isAdmin())
        <th scope="col" >Id </th>
      @endif
      @if($ordenar)
      <th scope="col" class="bg-warning">Fecha</th>
      <th scope="col" class="bg-warning">Hora</th>
      @else
      <th scope="col">Fecha</th>
      <th scope="col">Hora</th>
      @endif
      <th scope="col">Instalación</th>
      @if(auth()->user()->isAdmin())
        <th scope="col">Usuario</th>
      @endif

    
      <th scope="col"></th>
    </tr>
  </thead>

  @if(session('message'))
    <div class="alert alert-danger">{{session('message')}}</div> 
  @endif
  
  <tbody>

    @foreach($bookings as $booking)
      
    
    <tr>
      @if(auth()->user()->isAdmin())
        <th scope="row">{{$booking->id}}</th>
      @endif
      <td>{{$booking->fecha}}</td>
      <td>{{$booking->hora}}</td>
      <td>{{$booking->facility->descripcion}}</td>
      
      @if(auth()->user()->isAdmin())
        <td>{{$booking->user->email}}</td>
      @endif
      <td>
      
      @if(auth()->user()->isAdmin())
      <form action="{{ route('bookings.eliminar', $booking) }}" class="d-inline" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                          </form></td>
      @else
        @if($booking->fecha > \Carbon\Carbon::now()->days())
        <form action="{{ route('bookings.cancelar', $booking) }}" class="d-inline" method="POST">
                              @method('DELETE')
                              @csrf
                              <button class="btn btn-danger btn-sm" type="submit">Cancelar</button>
                            </form></td>
        @endif
      @endif
    </tr>

    
    @endforeach

  </tbody>
  

  
</table>


    {{  $bookings->links() }}
    


</div>
@endsection