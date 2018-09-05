<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Errores_de_pegados extends Model
{
	protected $table='esrrores_de_pegado';

    //protected $primaryKey = "id_jornada";
    public $incrementing  = false;
    public $timestamps=false;

    protected $fillable =[
	    'Campo0',
        'Campo1',
        'Campo2',
        'Campo3',
        'Campo4',
        'Campo5',
        'Campo6',
        'Campo7',
        'Campo8',
        'Campo9',
        'Campo10',
        'Campo11',
        'Campo12',
        'Campo13',
        'Campo14',
        'Campo15',
        'Campo16',
        'Campo17',
        'Campo18',
        'Campo19',
        'Campo20',
        'Campo21',
        'Campo22',
        'Campo23',
        'Campo24',
        'Campo25',
        'Campo26',
        'Campo27',
        'Campo28',
        'Campo29',
        'Campo30',
    ];


    protected $guarded =[
    	//cuando no queremo almacenar en nuestro modelo
    ];
}
