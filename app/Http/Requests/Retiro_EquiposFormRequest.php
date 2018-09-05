<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Retiro_EquiposFormRequest extends FormRequest
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
            'cod_establecimiento' => 'required|unique_with:retiro_equipos,cod_establecimiento,Fecha_Retiro,tipo_equipo|max:12',
            'Fecha_Retiro' => 'required|unique_with:retiro_equipos,cod_establecimiento,Fecha_Retiro,tipo_equipo|date_format:Y-m-d',
            'tipo_equipo' => 'required|unique_with:retiro_equipos,cod_establecimiento,Fecha_Retiro,tipo_equipo|max:5',
            'Descrip_Retiro' => 'required',
            'No_Serie' => 'required|max:30',
            'NomRetiro' => 'required|max:100',
            'Nomentrega' => 'required|max:10',
            'Fecha_Entrega' => 'date_format:Y-m-d',
        ];
    }
}
