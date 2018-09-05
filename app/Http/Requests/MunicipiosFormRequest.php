<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MunicipiosFormRequest extends FormRequest
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
            'COD_DEPTO' => 'required|min:2',
            'COD_MUPIO' => 'required|unique:municipios,COD_MUPIO|min:2|max:5',
            'NOM_MUPIO' => 'required|unique_with:municipios,COD_MUPIO,NOM_MUPIO|max:50',
        ];
    }
}
