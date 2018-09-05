<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class annos extends Model
{
    protected $table='annos';

    protected $primaryKey = "id_anno";

    public $timestamps=false;

    protected $fillable =[
    	'anno',
    ];


    protected $guarded =[
    	//cuando no queremo almacenar en nuestro modelo
    ];
}
