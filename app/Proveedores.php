<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedores extends Model
{
    protected $table='proveedores';

    protected $primaryKey = "id_Proveedor";

    public $timestamps=false;

    protected $fillable =[
    	'id_Proveedor',
    	'Nombre_Pro',
    	'Direccion_Prov',
    	'Tel_Prov',
    	'Nomcontacto1',
    	'Nomcontacto2',
    	'e_mail',
    ];


    protected $guarded =[
    	//cuando no queremo almacenar en nuestro modelo
    ];

    public function fases(){
        return $this->hasMany('App\Fases', 'id_Proveedor');
    }
}
