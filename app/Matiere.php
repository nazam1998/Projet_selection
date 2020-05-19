<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matiere extends Model
{
    public function users(){
        return $this->belongsToMany('App\User')->withPivot('valide');
    }
}
