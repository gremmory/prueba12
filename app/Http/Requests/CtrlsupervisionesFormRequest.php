<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CtrlsupervisionesFormRequest extends FormRequest
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
            'cod_establecimiento' => 'required|unique_with:ctrlsupervision,cod_establecimiento,numsupervision|max:12',
            'numsupervision' => 'required|numeric',
            'nomsupervisor' => 'required|max:50',
            'fecha_inicio' => 'date_format:Y-m-d',
            'fecha_fin' => 'date_format:Y-m-d',
            'actividades' => '',
            'observaciones' => '',
            'recomendaciones' => '',
        ];
    }
}
