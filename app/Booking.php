<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    //

    public function facility(){


        return $this->belongsTo(Facility::class);
    }

    public function user(){


        return $this->belongsTo(User::class);
    }
}
