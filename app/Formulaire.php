<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Formulaire extends Model
{
    public function interets(){
        return $this->belongsToMany('App\Interet','formulaire_interet','formulaire_id','interet_id');
    }

    public function evenements(){
        return $this->hasMany('App\Evenement');
    }
}
