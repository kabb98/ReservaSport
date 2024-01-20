<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    //

    public function facility(){


        return $this->belongsTo(Facility::class);
    }

    public function instructor(){


        return $this->belongsTo(Instructor::class);
    }

    public function users(){
        return $this->belongsToMany(User::class);
    }

}
