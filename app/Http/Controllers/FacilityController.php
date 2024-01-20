<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use Carbon\Carbon;


class FacilityController extends Controller
{
    //

 
    public function index (Request $req) {
        $ordenar=false;
        if(empty($req->palabra)&&empty($req->aforo)){ 
            if($req->ordenar != ""){
                $facilities = App\Facility::orderBy('aforo')->paginate();
                $ordenar=true;
            }else{
                $facilities = App\Facility::paginate(5);
            }
        }else if (empty($req->aforo)){ 
            if($req->ordenar != ""){
                $facilities = App\Facility::where('descripcion', 'like', '%' . $req->palabra . '%')->orderBy('aforo')->paginate();
                $ordenar=true;
            }else{
                $facilities = App\Facility::where('descripcion', 'like', '%' . $req->palabra . '%')->paginate();
            }
        }else if(empty($req->palabra)){ 
            if($req->ordenar != ""){
                $facilities = App\Facility::where('aforo',$req->aforo)->orderBy('aforo')->paginate();
                $ordenar=true;
            }else{
                $facilities = App\Facility::where('aforo',$req->aforo)->paginate();
            } 
        }else{   
            if($req->ordenar != ""){
                $facilities = App\Facility::where('descripcion', 'like', '%' . $req->palabra . '%')->where('aforo',$req->aforo)->orderBy('aforo')->paginate();
                $ordenar=true;
            }else{
                $facilities = App\Facility::where('descripcion', 'like', '%' . $req->palabra . '%')->where('aforo',$req->aforo)->paginate();
            }
            
        }

        return view('facilities.lista',compact('facilities','ordenar'));

    }

    

    public function delete ($id) {

        $facilityAEliminar = App\Facility::findOrFail($id);

        $facilityAEliminar->delete();

        return back();

    }

    public function create () {
        
        return view('facilities.crear');


    }

    public function save ( Request $req ) {

        $req->validate([
            'descripcion' => 'required|min:10|max:255',
            'aforo' => 'required|integer'
        ]);

        $facilityACrear = new App\Facility();
        $facilityACrear->descripcion=$req->descripcion;
        $facilityACrear->aforo=$req->aforo;
        $facilityACrear->save();
        return back()->with('message','Instalación '.$facilityACrear->descripcion.' creada correctamente');
    }

    public function edit ($id) {

        $facilityAModificar = App\Facility::findOrFail($id);

        return view('facilities.modificar',compact('facilityAModificar'));

    }


    public function update ($id, Request $req) 
    {

        $req->validate([
            'descripcion' => 'required|min:10|max:255',
            'aforo' => 'required|integer'
        ]);
        
        $facilityAModificar = App\Facility::findOrFail($id);

        $facilityAModificar->descripcion=$req->descripcion;
        $facilityAModificar->aforo=$req->aforo;
        $facilityAModificar->save();
        return back()->with('message','Instalación '.$facilityAModificar->descripcion.' actualizada correctamente');

    }

    public function searchBookings ($id, Request $req){
        $activities = App\Activity::where('facility_id',$id)->whereDate('fecha','=',Carbon::parse($req->fecha))->get();
        $bookings = App\Booking::where('facility_id',$id)->whereDate('fecha','=',Carbon::parse($req->fecha))->get();
        $facility = App\Facility::findOrFail($id);
        $disponibles = array(
            "9:00:00",
            "10:00:00",
            "11:00:00",
            "12:00:00",
            "13:00:00",
            "14:00:00",
            "15:00:00",
            "16:00:00",
            "17:00:00",
            "18:00:00",
            "19:00:00",
            "20:00:00",
            "21:00:00"
        );
        $aforos = array(
            $facility->aforo,
            $facility->aforo,
            $facility->aforo,
            $facility->aforo,
            $facility->aforo,
            $facility->aforo,
            $facility->aforo,
            $facility->aforo,
            $facility->aforo,
            $facility->aforo,
            $facility->aforo,
            $facility->aforo,
            $facility->aforo
        );

        foreach($bookings as $booking){
            $i = array_search($booking->hora, $disponibles);
            $aforos[$i]--;
        }

        foreach($activities as $activity){
            $i = array_search($activity->hora, $disponibles);
            $aforos[$i]=0;
        }
        
        for($i=0;$i<count($aforos);$i++){
            if($aforos[$i]<=0){
                unset($disponibles[$i]);
            }
        }

        $date = $req->fecha;
        return back()->with(compact('disponibles'))->with(compact('date'));

    }

}
