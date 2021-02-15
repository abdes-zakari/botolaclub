<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Competition extends Model
{
     public $timestamps = false;


     public function compType(){

        // return $this->hasOne('App\Models\CompetitionType','id');
        return $this->belongsTo('App\Models\CompetitionType','type_id');
    }


}
