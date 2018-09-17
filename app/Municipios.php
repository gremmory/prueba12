<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Departamentos;
//use App\Establecimientos;
class Municipios extends Model
{
    protected $table='municipios';

    public $incrementing = false;
    protected $primaryKey = "COD_MUPIO";

    public $timestamps=false;

    protected $fillable =[
    	'COD_DEPTO',
    	'COD_MUPIO',
    	'NOM_MUPIO',
    ];


    protected $guarded =[
    	//cuando no queremo almacenar en nuestro modelo
    ];

    public function departamentos($id){
        //return $this->belongsTo('App\Departamentos', 'COD_DEPTO');
        return (\App\Departamentos::find($id))->Desc_Deptos;
    }

    public static function municipios($id){
        return municipios::where('COD_DEPTO', '=', $id)->get()->toArray();
    }

    public function establecimientos(){
        return $this->hasMany('App\Establecimientos', 'cod_mupio');
    }

}
