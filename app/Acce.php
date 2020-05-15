<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Acce extends Model
{
    public function permission()
    {
        return $this->belongsTo('App\Role','permission_role');
    }
    public function auth()
    {
        return $this->belongsTo('App\Role', 'auth_role');
    }
}
