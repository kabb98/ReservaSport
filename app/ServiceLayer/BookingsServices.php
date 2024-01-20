<?php
namespace App\ServiceLayer;

use Illuminate\Support\Facades\DB;
use App\Booking;
use App\Facility;
use Illuminate\Http\Request;
use Carbon\Carbon;

class BookingsServices {
public static function processOrder(Request $request) {
    $rollback = false;
    DB::beginTransaction();
    
    $facility = Facility::findOrFail($request->facility2);
    $user = auth()->user();
    $fecha = $request->fecha22;
    $hora1 = $request->hora2;
    $hora2 = $request->hora22;

    

    $bookingsTurno1 = 
    Booking::where('facility_id',$facility->id)
    ->whereDate('fecha','=',Carbon::parse($fecha))
    ->where('hora',$hora1)->get();

    $bookingsTurno2 = 
    Booking::where('facility_id',$facility->id)
    ->whereDate('fecha','=',Carbon::parse($fecha))
    ->where('hora',$hora2)->get();
    

        if($facility->aforo > count($bookingsTurno1))
        {
            $booking1 = new Booking();
            

            $booking1->fecha=$fecha;
            $booking1->hora=$hora1;
            $booking1->user()->associate($user);
            $booking1->facility()->associate($facility);
            $booking1->save();

            if( $facility->aforo > count($bookingsTurno2)){
                
                $booking2 = new Booking();

                $booking2->fecha=$fecha;
                $booking2->hora=$hora2;
                $booking2->user()->associate($user);
                $booking2->facility()->associate($facility);
                $booking2->save();

                
            }
            else {

                $rollback = true;


            }

           
        } else 
        {
            $rollback = true;
            //break;
        }
    

    if ($rollback) {
        DB::rollBack();
        return false;
    }
    
    DB::commit();
    return true;
}
}
