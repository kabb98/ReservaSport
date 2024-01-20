@extends('layouts.app')
@section('content')

<div class="container"> 

    
    <div class="row jutify-content-between">
      <div class="col"><h1> Usuarios </h1></div>
      <div class="col-1 pt-1"><a class="btn btn-primary" href="{{route('users.nuevo')}}">Crear</a></div>
    </div>

    <form class="mb-5" action="{{route('users.listar')}}" method="GET" >
    @csrf
        <div class="row">
            <div class="col-6">
              <input type="text" class="form-control" placeholder="Buscar por Nombre" name="name">
            </div>
            <div class="col-2">
              <input type="text" class="form-control" placeholder="Email" name="email">
            </div>
            <div class="col-2">
              <select class="custom-select" placeholder="Ordenar por:" name="ordenar">
                <option selected value="">Ordenar por:(defecto)</option>
                <option value="name">Nombre</option>
              </select>
            </div>
            <div class="col-2">
            <button class="btn btn-primary " type="submit">Buscar</button>
            </div>

        </div>
    </form>
    
    <table class="table table-sm">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Email</th>
      @if($ordenar)
      <th scope="col" class="bg-warning">Nombre</th>
      @else
      <th scope="col">Nombre</th>
      @endif
      <th scope="col">Fecha De Nacimiento</th>
      <th scope="col">Teléfono</th>
      <th scope="col">Dirección</th>
      <th scope="col">Rol</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    @foreach($users as $user)
    <tr>
      <th scope="row">{{$user->id}}</th>
      <td>{{$user->email}}</td>
      <td>{{$user->name}}</td>
      <td>{{$user->fechaNacimiento}}</td>
      <td>{{$user->telefono}}</td>
      <td>{{$user->direccion}}</td>
      <td>{{$user->role->name}}</td>
      <td>
      
      <a class="btn btn-sm btn-primary" href="{{ route('users.editar',$user->id)}}"> Editar </a>

      <form action="{{ route('users.eliminar', $user) }}" class="d-inline" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                          </form></td>
    </tr>

    @endforeach

    
    


  </tbody>
</table>


    {{  $users->links() }}


</div>
@endsection