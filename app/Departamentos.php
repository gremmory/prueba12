<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamentos extends Model
{
    protected $table='departamentos';

    public $incrementing  = false;
    protected $primaryKey = "cod_Depto";

    public $timestamps=false;

    protected $fillable =[
    	'cod_Depto',
    	'Desc_Deptos',
    ];


    protected $guarded =[
    	//cuando no queremo almacenar en nuestro modelo
    ];

    public function municipios(){
        return $this->hasMany('App\Municipios', 'cod_Depto');
    }
}
