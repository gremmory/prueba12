<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jornadas extends Model
{
	protected $table='jornadas';

    protected $primaryKey = "id_jornada";

    public $timestamps=false;

    protected $fillable =[
    	'id_jornada',
    	'Desc_jornada',
    ];


    protected $guarded =[
    	//cuando no queremo almacenar en nuestro modelo
    ];
}
