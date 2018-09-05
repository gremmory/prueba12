<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProveedoresFormRequest extends FormRequest
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
            'Nombre_Pro' => 'required|max:50',
            'Direccion_Prov' => 'required|max:100',
            'Tel_Prov' => 'required|max:12',
            'Nomcontacto1' => 'max:50',
            'Nomcontacto2' => 'max:50',
            'e_mail' => 'email|max:35',
        ];
    }
}
