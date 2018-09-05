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
    	'CorreoE',
    	'Nomusuario',
    	'contrasena',
    	'permite_ver',
    	'permite_modif',
    	'permite_agregar',
    ];


    protected $guarded =[
    	//cuando no queremo almacenar en nuestro modelo
    ];
}
