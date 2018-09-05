<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profesiones extends Model
{
    protected $table='profesiones';
    public $incrementing  = false;
    protected $primaryKey = "id_prefesion";

    public $timestamps=false;

    protected $fillable =[
    	'id_prefesion',
    	'profesion',
    ];


    protected $guarded =[
    	//cuando no queremo almacenar en nuestro modelo
    ];
}
