<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NivelesFormRequest extends FormRequest
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
            'cod_nivel' => 'required|unique:niveles,cod_nivel|min:2|max:3',
            'desc_nivel' => 'required|unique:niveles,desc_nivel|max:50',
        ];
    }
}
