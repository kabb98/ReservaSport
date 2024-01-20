<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App;
use Carbon\Carbon;

//NO MOD; BUSCAR; CREAR
class ActivityController extends Controller
{
    public function index(Request $request)
    {
        $ordenar = false;
        if(Auth::user()->isAdmin()){
            if($request->has('ordenar')){
                $activities = App\Activity::orderBy('fecha')->orderBy('hora')->paginate();
                $ordenar = true;
            }else{
                $activities = App\Activity::paginate(5);
            }
        }else{
            if($request->has('ordenar')){
                $activities = App\Activity::whereDate('fecha','>',Carbon::now())->orderBy('fecha')->orderBy('hora')->paginate();
                $ordenar = true;
            }else{
                $activities = App\Activity::whereDate('fecha','>',Carbon::now())->paginate(5);
            }
        }
        return view('activities.lista',compact('activities','ordenar'));
    }
    
    public function delete ($id)
    {
        $activityAEliminar = App\Activity::findOrFail($id);
        $activityAEliminar->delete();

        return back();
    }

    public function inscribe($id){
        $activity = App\Activity::findOrFail($id);
        $user = auth()->user();
        
        if(count($activity->users)>=$activity->facility->aforo){
            return back()->with('message','el aforo ya es completo para esta actividad');
        }else{
            $inscrito = false;
            foreach($activity->users as $user2){
                if($user2->id===$user->id){
                    $inscrito=true;
                }
            }
            if($inscrito){
                return back()->with('message','ya se ha inscrito a esta actividad');
            }else{
                $user->activities()->attach($activity->id);
                return back()->with('message','inscrito correctamente');
            }
        }
    }

    public function create () {

        $facilities = App\Facility::all();
        $instructors = App\Instructor::all();
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
    
        return view('activities.crear',compact('facilities','instructors','disponibles'));

    }
    
    public function save ( Request $req )
    {
        $req->validate([
            'fecha' => 'required|after:yesterday',
            'name' => 'required|min:2|max:255'
        ]);

        $count = App\Activity::where('facility_id',$req->facility)
        ->where('fecha',$req->fecha)
        ->where('hora',$req->hora)->count();

        //que no haya actividad ya
        if($count<1){
            $activityACrear = new App\Activity();

            $activityACrear->fecha = $req->fecha;
            $activityACrear->hora = $req->hora;
            $activityACrear->nombre = $req->name;
            $activityACrear->facility_id = $req->facility;
            $activityACrear->instructor_id = $req->instructor;

            $activityACrear->save();
            $facilityAComprobar = App\Facility::findOrFail($req->facility);
            return back()->with('message', 'Actividad '.  $activityACrear->nombre .' a las '. $activityACrear->hora .' del '
            . $activityACrear->fecha . 
            ' para la instalación: ' 
            . $facilityAComprobar->descripcion .' creada correctamente!!!');
        }
        else{

            return back()->with('message', 
            'Existe ya una actividad creada en esta hora y fecha !!!');
        }
    }

    
    
    public function edit ($id)
    {
        $activityAModificar = App\Activity::findOrFail($id);

        return view('activities.modificar', compact('activityAModificar'));
    }
    
    public function update ($id, Request $req)
    {
        $userAModificar = App\Activity::findOrFail($id);

        $userAModificar->fecha = $req->fecha;
        $userAModificar->hora = $req->hora;
        $userAModificar->nombre = $req->nombre;
        $userAModificar->facility_id = $req->facility_id;
        $userAModificar->instructor_id = $req->instructor_id;

        $userAModificar->save();

        return back()->with('message', 'Actividad modificada '. $activityACrear->nombre . ' correctamente!');
    }

    public function getUserActivities(){
        $activities = auth()->user()->activities()->paginate(5);
        return view('activities.useractivities',compact('activities'));
    }
    /*

    //Funcion Buscar por Fecha -> Solo si coincide
    public function search (Request $req)
    {
        if(empty($req->fecha))
            return redirect(route('activities.listar'));
        else
            $activities = App\Activity::whereDate('created_at', '=', $req->fecha);
        
        return view('activities.lista', compact('activities'));
    }
    */
}
