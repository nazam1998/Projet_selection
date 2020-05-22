<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function permissions()
    {
        return $this->belongsToMany('App\Permission', 'permission_role', 'role_id', 'permission_id');
    }

    public function auth()
    {
        return $this->belongsToMany('App\Role', 'suivis', 'role_id', 'auth_id');
    }
    public function roles()
    {
        return $this->belongsToMany('App\Role', 'suivis', 'auth_id', 'role_id')->withPivot('ecriture');
    }
    
}
