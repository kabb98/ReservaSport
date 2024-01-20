@extends('layouts.app')
@section('content')

<div class="container"> 

    <div class="row jutify-content-between">
      <div class="col"><h1> Instalaciones </h1></div>
      @if(auth()->user()->role->name === 'admin')
        <div class="col-1 pt-1"><a class="btn btn-primary" href="{{route('facilities.nuevo')}}">Crear</a></div>
      @endif
    </div>

    <form class="mb-5" action="{{route('facilities.listar')}}" method="GET" >
    @csrf
        <div class="row">
            <div class="col-6">
                <input type="text" class="form-control" placeholder="Buscar por palabra" name="palabra">
            </div>
            <div class="col-2">
                <input type="number" class="form-control" placeholder="Aforo" name="aforo">
            </div>
            <div class="col-2">
                <select class="custom-select" placeholder="Ordenar por:" name="ordenar">
                  <option selected="true" disabled="disabled">Ordenar por</option>
                  <option value="">Ninguno</option>
                  <option value="aforo">Aforo</option>
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
      @if(auth()->user()->role->name === 'admin')
        <th scope="col">Id</th>
      @endif
      <th scope="col">Descripción</th>
      @if($ordenar)
      <th scope="col" class="bg-warning">Aforo</th>
      @else
      <th scope="col">Aforo</th>
      @endif
      @if(auth()->user()->role->name === 'admin')
        <th scope="col">Handle</th>
      @endif
    </tr>
  </thead>
  <tbody>
    @foreach($facilities as $facility)
    
    <tr>
      @if(auth()->user()->role->name === 'admin')
        <th scope="row">{{$facility->id}}</th>
      @endif
      <td>
      <a href="{{route('facilities.detalle',$facility->id)}}">
      {{$facility->descripcion}}
      </a>
      </td>
      <td>{{$facility->aforo}}</td>
      @if(auth()->user()->role->name === 'admin')
      <td>
      
      <a class="btn btn-sm btn-primary" href="{{ route('facilities.editar',$facility->id)}}"> Editar </a>

      <form action="{{ route('facilities.eliminar', $facility) }}" class="d-inline" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                          </form>
      </td>
      @endif
    </tr>
    
    @endforeach

    
    


  </tbody>
</table>


    {{  $facilities->links() }}


</div>
@endsection