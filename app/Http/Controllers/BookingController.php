<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App;
use Carbon\Carbon;
use App\ServiceLayer\BookingsServices;

class BookingController extends Controller
{
    public function index(Request $request)
    {
        $ordenar=false;
        if(Auth::user()->isAdmin()){
            if($request->has('ordenar')){
                $bookings = App\Booking::orderBy('fecha')->orderBy('hora')->paginate();
                $ordenar=true;
            }else{
                $bookings = App\Booking::paginate(5);
            }    
        }else{
            if($request->has('ordenar')){
                $bookings = Auth::user()->bookings()->orderBy('fecha')->orderBy('hora')->paginate(5);    
                $ordenar=true;
            }else{
                $bookings = Auth::user()->bookings()->orderBy('fecha','desc')->orderBy('hora','desc')->paginate(5);
                
            }
        }

        return view('bookings.lista',compact('bookings','ordenar'));
    }

    public function delete ($id)
    {
        $bookingAEliminar = App\Booking::findOrFail($id);
        $bookingAEliminar->delete();

        return back();
    }



    public function create () {
    
        return view('bookings.crear');

    }




    
    public function save ( Request $req )
    {
        
        $count = App\Booking::where('facility_id',$req->facility)
        ->where('fecha',$req->fecha2)
        ->where('hora',$req->hora)->count();

        $countActividad = App\Activity::where('facility_id',$req->facility)
        ->where('fecha',$req->fecha2)
        ->where('hora',$req->hora)->count();


        $facilityAComprobar = App\Facility::findOrFail($req->facility);
        $aforoAComparar = $facilityAComprobar->aforo;
        
        if($count < $aforoAComparar && $countActividad < 1){
            $bookingACrear = new App\Booking();
            $bookingACrear->fecha = $req->fecha2;
            $bookingACrear->hora = $req->hora;
            $bookingACrear->user_id = auth()->user()->id;
            $bookingACrear->facility_id = $req->facility;
            $bookingACrear->save();

            return back()->with('message', 'La reserva se ha 
            realizado correctamente a las '. $bookingACrear->hora .' del '
            . $bookingACrear->fecha . 
            ' para la instalación: ' 
            . $facilityAComprobar->descripcion . '!!!');
        }
        else{
            return back()->with('message', 
            'Aforo completo a las '. $req->hora .' del '
              . $req->fecha2 . 
              ' para la instalación: ' 
              . $facilityAComprobar->descripcion . ' !!!');
        }
        /*
        $bookingACrear = new App\Booking();
        /*
        $req->validate([
            'hora' => 'required|date_format:H:i'
        ]);

        $bookingACrear->fecha = $req->fecha2;
        $bookingACrear->hora = $req->hora;
        $bookingACrear->user_id = auth()->user()->id;
        $bookingACrear->facility_id = $req->facility;
        $bookingACrear->save();

        return back()->with('message', 'La reserva se ha realizado correctamente!!!');
        */
    }

    

    public function edit ($id)
    {
        $bookingAModificar = App\Booking::findOrFail($id);

        return view('bookings.modificar', compact('bookingAModificar'));
    }



    public function update ($id, Request $req)
    {
        $req->validate([
            'fecha' => 'required|date_after:yesterday',
            'hora' => 'required|date_format:H:i'
        ]);
        
        $count = DB::table('facilities')
        ->where('facility_id',$req->facility_id)
        ->where('fecha',$req->fecha)
        ->where('hora',$req->hora)->count();

        $facilityAComprobar = App\Facility::findOrFail($req->facility_id);
        $aforoAComparar = $facilityAComprobar->aforo;

        if($count<$aforoAComparar){
            $bookingAModificar = App\Booking::findOrFail($id);
            $bookingAModificar->fecha = $req->fecha;
            $bookingAModificar->hora = $req->hora;
            $bookingAModificar->user_id = $req->user_id;
            $bookingAModificar->facility_id = $req->facility_id;
            $bookingAModificar->save();

            return back()->with('message', 'Actividad modificada correctamente!');
        }
        else{
            return back()->with('message', 
            'Aforo completo a las '. $req->hora .' del '
              . $req->fecha . 
              'para la instalación:' 
              . $facilityAComprobar->descripcion . ' !!!');


        }


    }

    //Funcion Buscar por Fecha -> Solo si coincide
    public function search (Request $req)
    {
        if(empty($req->fecha))
            return redirect(route('bookings.listar'));
        else
            $bookings = App\Booking::whereDate('created_at', '=', $req->fecha);
        
        return view('bookings.lista', compact('bookings'));
    }
    

    public function cancel($id){
        $booking = App\Booking::findOrFail($id);
        if(Auth::user()->id===$booking->user->id){
            if ($booking->fecha > Carbon::now()) {
                $booking->delete();
                return back();
            }else{
                return back()->with('message', 'No puedes cancelar reservas el mismo día');   
            }
        }else{
            return back()->with('message', 'No puedes cancelar reservas de otro usuario');
        }
    }

    public function multiple(Request $request){
        if ($request->hora2 === $request->hora22){
            return back()->with('message','no se puede reservar para la misma hora 2 veces');
        }
        $serviceLayer = new BookingsServices();
        if($serviceLayer->processOrder($request)){
            return back()->with('message','reservas creadas correctamente');
        }else{
            return back()->with('message','reservas no se han podido crear');
        }
    }

}