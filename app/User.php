<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nom','prenom', 'email', 'password', 'genre', 'statut', 'commune', 'ordinateur', 'adresse', 'telephone', 'objectif', 'photo', 'abo', 'formulaire_id', 'group_id', 'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function role(){
        return $this->belongsTo('App\Role');
    }
    public function evenement(){
        return $this->belongsTo('App\Evenement');
    }
    public function group(){
        return $this->belongsToMany('App\Group', 'group_user', 'user_id', 'group_id');
    }
    public function notes(){
        return $this->hasMany('App\Note');
    }

    
    public function matieres(){
        return $this->belongsToMany('App\Matiere')->withPivot('valide');
    }


    public function interets(){
        return $this->belongsToMany('App\Interet');
    }
}
