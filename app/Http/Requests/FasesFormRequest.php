<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FasesFormRequest extends FormRequest
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

            'Descripcion' => 'required|max:100',
            'Fecha_Inicio' => 'date_format:Y-m-d',
            'Cooperador' => 'required|max:50',
            'Id_Proveedor' => '',
            'Nombre' => 'required|max:100',
        ];
    }
}
