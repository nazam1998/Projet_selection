<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $dates = ['date'];
    
    public function user(){
        return $this->belongsTo('App\User');
    }
}
