<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marcas extends Model
{
    protected $table='marcas';

    protected $primaryKey = "Id_Marca";

    public $timestamps=false;

    protected $fillable =[
    	'Id_Marca',
    	'Desc_Marca',
    ];


    protected $guarded =[
    	//cuando no queremo almacenar en nuestro modelo
    ];
}
