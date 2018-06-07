<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Formato extends Model
{
    protected $table = 'Formatos';
    protected $fillable = ['nombre'];
    public $timestamps = false;
}
