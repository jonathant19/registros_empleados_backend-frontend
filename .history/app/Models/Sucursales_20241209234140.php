<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sucursales extends Model
{
    protected $table = 'sucursales';
    
    protected $filliable = [
      
        'nombre',
        'estado',

    ];

    public $timestamps = false;

}
