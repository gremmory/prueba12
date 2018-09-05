<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Niveles extends Model
{
	protected $table='niveles';
    public $incrementing  = false;
    protected $primaryKey = "cod_nivel";

    public $timestamps=false;

    protected $fillable =[
    	'cod_nivel',
    	'desc_nivel',
    ];


    protected $guarded =[
    	//cuando no queremo almacenar en nuestro modelo
    ];
}
