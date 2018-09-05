<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Retiro_Equipos extends Model
{
    protected $table='retiro_equipos';

    public $incrementing  = false;
    protected $primaryKey = "cod_establecimiento,Fecha_Retiro,tipo_equipo";

    public $timestamps=false;

    protected $fillable =[
        'cod_establecimiento',
        'Fecha_Retiro',
        'tipo_equipo',
        'Descrip_Retiro',
        'No_Serie',
        'NomRetiro',
        'Nomentrega',
        'Fecha_Entrega',
    ];
}
