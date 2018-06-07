<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    
    protected $fillable = [
        'name', 'email', 'password', 'perfil_id' , 'estado_id'
    ];

   
    protected $hidden = [
        'password', 'remember_token',
    ];

    //Relación con Perfiles
    public function perfil(){
    	return $this->hasOne('App\Perfil','id','perfil_id');
    }

    //Relación con Estados
    public function estado(){
    	return $this->hasOne('App\Estado','id','estado_id');
    }

    //relacion con Medicos
    public function medico(){
        return $this->belongsTo('App\Medico');
    }
}