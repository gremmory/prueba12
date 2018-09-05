<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cargos extends Model
{
    protected $table='cargos';

    protected $primaryKey = "Id_Cargo";

    public $timestamps=false;

    protected $fillable =[
    	'Descripcion_Cargo'
    ];


    protected $guarded =[
    	//cuando no queremo almacenar en nuestro modelo
    ];

}
