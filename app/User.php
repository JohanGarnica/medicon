<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    
    protected $fillable = [
        'name', 'email', 'password', 'perfil_id' , 'estado_id','foto'
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

    public function scopeNombres($query, $nombre){
        return $query->where('name','LIKE','%'.$nombre.'%');
    }
    public function scopeEmail($query, $email){
        return $query->where('email','LIKE','%'.$email.'%');
    }
    public function scopePerfil($query, $perfil){
        return $query->where('perfil_id','LIKE',$perfil);
    }
    public function scopeEstado($query, $estado){
        return $query->where('estado_id','LIKE',$estado);
    }
}