<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public function responsable(){
        return $this->belongsTo('App\User','responsable_id');
    }
    public function coach(){
        return $this->belongsTo('App\User','coach_id');
    }
}
