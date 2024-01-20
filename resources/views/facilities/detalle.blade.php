@extends('layouts.app')
@section('content')

<div class="container">


<div class="row justify-content-center">
    <div class="col-12 col-lg-8">
        <div class="card">
            <div class="card-body">
                <h2>{{$facility->descripcion}}</h2>
                <p> Aforo: 
                    {{$facility->aforo}}
                </p>
                @if(session('message'))
                <div class="alert alert-info">
                    {{session('message')}}
                </div>
                @endif
                <form action="{{route('filtrarPorHora',$facility->id)}}" method="POST" >
                @csrf
                <div class="form-row">
                    <div class="col">
                        <input type="date" class="form-control" name="fecha" min="{{date('Y-m-d')}}" value="{{session()->get('date')? session('date') : date('Y-m-d')}}" {{session()->get('disponibles')?'disabled':''}} required>
                    </div>
                    <div class="col">
                    @if(session('disponibles'))
                        <a href="{{route('facilities.detalle',$facility->id)}}" class="btn btn-primary">buscar para otra fecha</a>
                    @else
                        <button type="submit" class="btn btn-primary">Buscar</button>
                    @endif
                    </div>
                </div>
                </form>
                
                    
                @if(session('disponibles')) 
                    <hr>
                    <form class="mt-3" action="{{route('bookings.reservar')}}" method="POST" id="form1">
                    @csrf
                    <input type="number" name="facility" id="facility" value="{{$facility->id}}" hidden>
                    <input type="date" name="fecha2" id="fecha2" value="{{session('date')}}" hidden>
                    
                    <div class="form-row">
                        <div class="col">
                            <select class="custom-select" name="hora" id="hora" required>
                            
                            @foreach(session()->get('disponibles') as $hora)
                                <option value="{{$hora}}">{{$hora}}</option>
                            @endforeach
                            
                            </select>
                        </div>
                        <div class="col">
                            <button type="submit" class="btn btn-primary" id="btn-reservar1">Reservar</button>
                        </div>
                    </div>
                    </form>
                    
                    <button class="btn btn-primary" id="btn-cambiarForm" onClick="cambiarForm()">Reservar más de un turno</button>

                    <form class="mt-3" action="{{route('bookings.multiple')}}" method="POST" id="form2" style="visibility:hidden;">
                    @csrf
                    <input type="number" name="facility2" id="facility2" value="{{$facility->id}}" hidden>
                    <input type="date" name="fecha22" id="fecha22" value="{{session('date')}}" hidden>
                    
                    <div class="form-row">
                        <div class="col-12">
                            <select class="custom-select" name="hora2" id="hora2" required>
                            
                            @foreach(session()->get('disponibles') as $hora)
                                <option value="{{$hora}}">{{$hora}}</option>
                            @endforeach
                            
                            </select>
                            
                        </div>
                        <div class="col-12">
                            <select class="custom-select" name="hora22" id="hora22" required>
                            
                            @foreach(session()->get('disponibles') as $hora)
                                <option value="{{$hora}}">{{$hora}}</option>
                            @endforeach
                            
                            </select>
                        </div>
                        <div class="col">
                            <button type="submit" class="btn btn-primary" id="btn-reservar2">Reservar</button>
                        </div>
                    </div>
                    </form>
                @endif
                
            </div>
        </div>

    </div>

</div>
                
</div>

<script>
function cambiarForm() {
var form1 = document.getElementById('form1');
var form2 = document.getElementById('form2');

form1.style.visibility="hidden";
form2.style.visibility="visible";
document.getElementById('hora2').value = document.getElementById('hora').value;

document.getElementById('btn-cambiarForm').style.visibility="hidden";

}
</script>

@endsection