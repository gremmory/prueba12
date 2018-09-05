<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EstablecimientosFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool 
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'cod_establecimiento' => 'required|unique:establecimientos,cod_establecimiento|max:20',
            'cod_depto' => 'required|min:1',
            'cod_mupio' => 'required|min:1|max:5',
            'ESTABLECIMIENTO' => 'required|max:100',
            'cod_nivel' => 'required|min:2|max:3',
            'DIRECCION' => 'required|max:300',
            'TELEFONO' => 'numeric',
            'SECTOR' => 'required|max:20',
            'AREA' => 'required|max:20',
            'JORNADA' => 'required|max:20',
            'DIRECTOR' => 'required|max:65',
            'ALUMNOS' => 'numeric',
            'ALUMNAS' => 'numeric',
            'TOTAL' => 'numeric',
            'MAESTROS' => 'numeric',
            'MULTIGRADO' => 'boolean',
            'opf' => 'boolean',//'max:35',
            //'id_fase' => 'numeric',
            'cuenta_carta' => 'boolean',
            'latitud' => 'max:30',
            'longitud' => 'max:30',
            'certificacion' => 'boolean',
            'acta_anuencia' => 'boolean',
            'electricidad' => 'boolean',
            'seguridad' => 'boolean',
            'status' => 'required|min:2|max:15',
            'observaciones' => 'max:350',
            'correo' => 'email|max:50',
            'modalidad' => 'max:45',
        ];
    }
}
