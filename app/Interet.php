<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Interet extends Model
{
    public function formulaires()
    {
        return $this->belongsToMany('App\Formulaire', 'formulaire_interet', 'interet_id', 'formulaire_id');
    }
}
