<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fotos extends Model
{
    protected $table='fotos';

    protected $primaryKey = "idFotos";

    public $timestamps=false;

    protected $fillable =[
        'imagen',
        'establecimientos_cod_establecimiento',
    ];


    protected $guarded =[
    	//cuando no queremo almacenar en nuestro modelo
    ];
}
