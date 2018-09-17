<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Establecimientos extends Model
{
    protected $table='establecimientos';

    public $incrementing  = false;
    protected $primaryKey = "cod_establecimiento";

    public $timestamps=false;

    protected $fillable =[
        'cod_establecimiento',
        'cod_depto',
        'cod_mupio',
        'ESTABLECIMIENTO',
        'cod_nivel',
        'DIRECCION',
        'TELEFONO',
        'SECTOR',
        'AREA',
        'JORNADA',
        'DIRECTOR',
        'ALUMNOS',
        'ALUMNAS',
        'TOTAL',
        'MAESTROS',
        'MULTIGRADO',
        'opf',
        //'id_fase',
        'cuenta_carta',
        'latitud',
        'longitud',
        'certificacion',
        'acta_anuencia',
        'electricidad',
        'seguridad',
        'status',
        'observaciones',
        'correo',
        'modalidad',
    ];


    protected $guarded =[
    	//cuando no queremo almacenar en nuestro modelo
    ];

    public function Ctrlsupervisiones(){
        return $this->hasMany('App\Ctrlsupervisiones', 'cod_establecimiento');
    }


    public function departamentos($id){
        if((\App\Departamentos::find($id))){
            return (\App\Departamentos::find($id))->Desc_Deptos;
        }
    }

    public function municipios($id){
        if((\App\Municipios::find($id))){
            return (\App\Municipios::find($id))->NOM_MUPIO;
        }
    }

    public function niveles($id){
        if((\App\Niveles::find($id))){
            return (\App\Niveles::find($id))->desc_nivel;
        }
    }

    public function detalle_equipo(){
        return $this->hasMany('App\Detalle_Equipos', 'cod_establecimiento');
    }
}