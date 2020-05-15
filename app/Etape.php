<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Etape extends Model
{
    protected $dates = ['date'];
    public function evenement(){
        return $this->belongsTo('App\Evenement');
    }
    public function inputDate(){
        return Carbon::parse($this->date);
    }
}
