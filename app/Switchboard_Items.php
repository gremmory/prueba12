<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Switchboard_Items extends Model
{
    //
	protected $table='switchboard_items';

    //protected $primaryKey = "SwitchboardID,ItemNumber";
    protected $primaryKey = "id_Switchboard_Items";

    public $timestamps=false;

    protected $fillable =[
        'id_Switchboard_Items',
    	'SwitchboardID',
    	'ItemNumber',
    	'ItemText',
    	'Command',
    	'Argument',
    ];


    protected $guarded =[
    	//cuando no queremo almacenar en nuestro modelo
    ];
}
