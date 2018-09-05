<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DepartamentosFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
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
            'cod_Depto' => 'required|unique:departamentos,cod_Depto|min:2',
            'Desc_Deptos' => 'required|unique:departamentos,Desc_Deptos|max:100',
        ];
    }
}
