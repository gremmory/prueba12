<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DispositivosFormRequest extends FormRequest
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
            'tipo_equipo' => 'required|unique:dispositivos,tipo_equipo|max:5',
            'Desc_tipoequipo' => 'required|unique:dispositivos,Desc_tipoequipo|max:50',
        ];
    }
}
