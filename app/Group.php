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
    public function users(){
        return $this->belongsToMany('App\User', 'group_user', 'group_id', 'user_id');
    }
}
