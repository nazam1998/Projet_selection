<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Etape extends Model
{
    public function evenement(){
        return $this->belongsTo('App\Evenement');
    }
}
