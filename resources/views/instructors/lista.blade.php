@extends('layouts.app')
@section('content')

<div class="container"> 

    <div class="row jutify-content-between">
      <div class="col"><h1> Monitores </h1></div>
      <div class="col-1 pt-1"><a class="btn btn-primary" href="{{route('instructors.nuevo')}}">Crear</a></div>
      
    </div>

    <a class="btn btn-primary my-3" href="{{action('InstructorController@index', ['ordenar'=> 'name'])}}">Ordenar por nombre</a>
      <a class="btn btn-primary my-3" href="{{action('InstructorController@index')}}">Ordenar por defecto</a>
      

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
            <th scope="col">Telefono</th>
            <th scope="col">Dirección</th>
            <th scope="col">Fecha de Nacimiento</th>
            <th scope="col">Handle</th>
            </tr>
        </thead>

        <tbody>
            @foreach($instructors as $instructor)
                <tr>
                    <th scope="row">{{$instructor->id}}</th>
                    <td>{{$instructor->email}}</td>
                    <td>{{$instructor->name}}</td>
                    <td>{{$instructor->telefono}}</td>
                    <td>{{$instructor->direccion}}</td>
                    <td>{{$instructor->fechaNacimiento}}</td>


                    <td>
                    <a class="btn btn-sm btn-primary" href="{{ route('instructors.editar',$instructor->id)}}"> Editar </a>

                    <form action="{{ route('intructors.eliminar', $instructor) }}" class="d-inline" method="POST">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                    </form></td>
                </tr>

            @endforeach
        </tbody>
    </table>
    
    {{  $instructors->links() }}
</div>
@endsection