<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Errores_de_pegadosFormRequest extends FormRequest
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
            'Campo0' => '',
            'Campo1' => '',
            'Campo2' => '',
            'Campo3' => '',
            'Campo4' => '',
            'Campo5' => '',
            'Campo6' => '',
            'Campo7' => '',
            'Campo8' => '',
            'Campo9' => '',
            'Campo10' => '',
            'Campo11' => '',
            'Campo12' => '',
            'Campo13' => '',
            'Campo14' => '',
            'Campo15' => '',
            'Campo16' => '',
            'Campo17' => '',
            'Campo18' => '',
            'Campo19' => '',
            'Campo20' => '',
            'Campo21' => '',
            'Campo22' => '',
            'Campo23' => '',
            'Campo24' => '',
            'Campo25' => '',
            'Campo26' => '',
            'Campo27' => '',
            'Campo28' => '',
            'Campo29' => '',
            'Campo30' => '',
        ];
    }
}
