<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Detalle_EquiposFormRequest extends FormRequest
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
            //
            'cod_establecimiento' => 'required|unique_with:detalle_equipo,cod_establecimiento,cod_equipo,tipo_equipo|max:20',
            'cod_equipo' => 'required|unique_with:detalle_equipo,cod_establecimiento,cod_equipo,tipo_equipo|max:20',
            'tipo_equipo' => 'required|unique_with:detalle_equipo,cod_establecimiento,cod_equipo,tipo_equipo|max:5',
            'desc_equipo' => 'max:100',
            'id_marca' => '',
            'series' => '',
            'cantidad' => 'numeric',
            'Observaciones' => '',
            'Fases_Id_Fase' => 'required|numeric',
            'tipo' => 'max:60',
        ];
    }
}
