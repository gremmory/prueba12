<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ctrlsupervisiones extends Model
{
    protected $table='ctrlsupervision';

    protected $primaryKey = "id_control";

    public $timestamps=false;

    protected $fillable =[
    	'id_control',
    	'cod_establecimiento',
        'numsupervision',
        'nomsupervisor',
        'fecha_inicio',
        'fecha_fin',
        'actividades',
        'observaciones',
        'recomendaciones',
    ];


    protected $guarded =[
    	//cuando no queremo almacenar en nuestro modelo
    ];
    public function establecimientos($id){
        if((\App\Establecimientos::find($id))){
            return (\App\Establecimientos::find($id))->ESTABLECIMIENTO;
        }
    }
}
