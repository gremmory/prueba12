<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instructores extends Model
{
protected $table='instructores';

    protected $primaryKey = "id_instructor";

    public $timestamps=false;

    protected $fillable =[
		'cod_instructor',
		'primer_apellido',
		'segundo_apellido',
		'apellido_casada',
		'primer_nombre',
		'segundo_nombre',
		'direccion',
		'telefono_casa',
		'telefono_celular',
		'orden_cedula',
		'num_cedula',
		'cod_mupio',
		'cod_Depto',
		'e_mail',
		'fecha_nac',
		'fecha_contrato',
		'sueldo_inicial',
		'fecha_ingreso',
		'id_profesion',
		'estudia_actualmente',
		'carrera_que_estudia',
		'ultimo_grado_aprobado',
		'cod_establecimiento',
		'nombre_director',
		'id_jornada',
		'hora_entrada',
		'hora_salida',
		'cantidad_alumnos',
		'fecha_actualizacion',
		'foto',
		'comentarios',
		'estado',
    ];


    protected $guarded =[
    	//cuando no queremo almacenar en nuestro modelo
    ];
/*
    public function Ctrlsupervisiones(){
        return $this->hasMany('App\Ctrlsupervisiones', 'cod_establecimiento');
    }
*/

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
    public function profesiones($id){
        if((\App\Profesiones::find($id))){
            return (\App\Profesiones::find($id))->profesion;
        }
    }
    public function jornadas($id){
        if((\App\Jornadas::find($id))){
            return (\App\Jornadas::find($id))->Desc_jornada;
        }
    }
    public function establecimientos($id){
        if((\App\Establecimientos::find($id))) {
            return (\App\Establecimientos::find($id))->ESTABLECIMIENTO;
        }
    }
}
