<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evenement extends Model
{
    public function interets()
    {
        return $this->belongsToMany('App\Interet');
    }
    public function etapes()
    {
        return $this->hasMany('App\Etape');
    }
}
