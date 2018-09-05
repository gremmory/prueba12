<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dispositivos extends Model
{
    protected $table='dispositivos';
    public $incrementing  = false;
    protected $primaryKey = "tipo_equipo";

    public $timestamps=false;

    protected $fillable =[
    	'tipo_equipo',
    	'Desc_tipoequipo',
    ];

    protected $guarded =[
    	//cuando no queremo almacenar en nuestro modelo
    ];
}
