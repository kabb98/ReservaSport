@extends('layouts.app')
@section('content')

<div class="container"> 

<div class="row jutify-content-between">
      <div class="col"><h1> Modifica una instalación </h1></div>
      <div class="col-1 pt-1"><a class="btn btn-primary" href="{{route('facilities.listar')}}">Volver</a></div>
    </div>

@if(session('message'))
<div class="alert alert-success">{{session('message')}}</div>
@endif

<form  action="{{route('facilities.actualizar',$facilityAModificar->id)}}" method="POST">
@method('PUT')
@csrf
  <div class="form-group">
    <label >Descripción</label>
    {{-- Errr messages --}}
                @if ($errors->has('descripcion'))
             <ul>
             @foreach ($errors->get('descripcion') as $error)
            <li>{{ $error }}</li>
            @endforeach
            </ul>
             @endif
    <input type="text" class="form-control" name="descripcion" value="{{$facilityAModificar->descripcion}}">
    
  </div>
  
  <div class="form-group">
    <label >Aforo</label>
    {{-- Errr messages --}}
                @if ($errors->has('aforo'))
             <ul>
             @foreach ($errors->get('aforo') as $error)
            <li>{{ $error }}</li>
            @endforeach
            </ul>
             @endif
    <input type="number" class="form-control" name="aforo" value="{{$facilityAModificar->aforo}}">
    
  </div>



  <button type="submit" class="btn btn-primary">Guardar</button>
</form>

</div>
@endsection