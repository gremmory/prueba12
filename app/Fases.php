<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fases extends Model
{
    //
    protected $table='fases';
    //public $incrementing  = false;
    protected $primaryKey = "Id_Fase";

    public $timestamps=false;

    protected $fillable =[
    	'Id_Fase',
        'Descripcion',
        'Fecha_Inicio',
        'Cooperador',
        'Id_Proveedor',
    ];


    protected $guarded =[
    	//cuando no queremo almacenar en nuestro modelo
    ];

    public function Proveedores($id){
        if((\App\Proveedores::find($id))){
            return (\App\Proveedores::find($id))->Nombre_Pro;
        }
        //return "";
    }
}
