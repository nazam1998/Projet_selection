<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evenement extends Model
{
    protected $dates = ['date'];

    public function interets()
    {
        return $this->belongsToMany('App\Interet');
    }
    public function etapes()
    {
        return $this->hasMany('App\Etape','evenement_id');
    }
    public function formulaire()
    {
        return $this->belongsTo('App\Formulaire','formulaire_id');
    }
    
}
