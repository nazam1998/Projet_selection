<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mailing extends Model
{
    public function user(){
        return $this->belongsTo('App\User','user_id');
    }
    public function role(){
        return $this->belongsTo('App\Role','role_id');
    }
    public function group(){
        return $this->belongsTo('App\Group','group_id');
    }
}
