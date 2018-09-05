<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detalle_Equipos extends Model
{
    protected $table='detalle_equipo';

    //public $incrementing  = false;
    protected $primaryKey = "id_detalle";

    public $timestamps=false;

    protected $fillable =[
    	'id_detalle',
        'cod_establecimiento',
        'cod_equipo',
        'tipo_equipo',
        'desc_equipo',
        'id_marca',
        'series',
        'cantidad',
        'Observaciones',
        'Fases_Id_Fase',
        'tipo',
    ];

    public function establecimientos($id){
        if((\App\Establecimientos::find($id))){
            return (\App\Establecimientos::find($id))->ESTABLECIMIENTO;
        }
    }

    public function dispositivos($id){
        if((\App\Dispositivos::find($id))){
            return (\App\Dispositivos::find($id))->Desc_tipoequipo;
        }
    }

    public function fases($id){
        if((\App\Fases::find($id))){
            return (\App\Fases::find($id))->Nombre;
        }
    }
    public function marcas($id){
        if((\App\Marcas::find($id))){
            return (\App\Marcas::find($id))->Desc_Marca;
        }
    }
}
