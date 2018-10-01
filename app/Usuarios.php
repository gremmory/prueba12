<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    protected $table='usuarios';

    protected $primaryKey = "id_usuario";

    public $timestamps=false;

    protected $fillable =[
    	'id_usuario',
    	'Apellidos',
    	'Nombres',
    	'email',
    	'password',
    	'permite_ver',
    	'permite_modif',
        'permite_agregar',
        'admin',
    ];


    protected $guarded =[
    	//cuando no queremo almacenar en nuestro modelo
    ];
}
