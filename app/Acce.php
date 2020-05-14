<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Acce extends Model
{
    public function permission()
    {
        return $this->belongsToMany('App\Role', 'acces', 'permission_role', 'auth_role');
    }
    public function auth()
    {
        return $this->belongsToMany('App\Role', 'acces', 'auth_role', 'permission_role');
    }
}
