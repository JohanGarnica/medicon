<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    protected $table = 'medicos';
    protected $fillable = ['telefono','tarjeta_prof','user_id','servicio_id'];

    //Relacion con User
     public function user(){
    	return $this->hasOne('App\user','id','user_id');
    }

    //relacion con servicio
	public function servicios()
    {
        return $this->hasOne('App\Servicio', 'id', 'servicio_id');
    }    

}