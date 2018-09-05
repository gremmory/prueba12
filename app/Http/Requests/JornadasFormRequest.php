<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JornadasFormRequest extends FormRequest
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
            'Desc_jornada' => 'required|unique:jornadas,Desc_jornada|max:45',
        ];
    }
}
