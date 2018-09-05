<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InstructoresFormRequest extends FormRequest
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
            'cod_instructor' => 'required|unique:instructores,cod_instructor',
            'primer_apellido' => 'required',
            'segundo_apellido' => '',
            'apellido_casada' => '',
            'primer_nombre' => 'required',
            'segundo_nombre' => '',
            'direccion' => '',
            'telefono_casa' => '',
            'telefono_celular' => '',
            'orden_cedula' => '',
            'num_cedula' => '',
            'cod_mupio' => 'required',
            'cod_Depto' => 'required',
            'e_mail' => '',
            'fecha_nac' => '',
            'fecha_contrato' => '',
            'sueldo_inicial' => '',
            'fecha_ingreso' => '',
            'id_profesion' => '',
            'estudia_actualmente' => 'boolean',
            'carrera_que_estudia' => '',
            'ultimo_grado_aprobado' => '',
            'cod_establecimiento' => 'required|max:20',
            'nombre_director' => '',
            'id_jornada' => '',
            'hora_entrada' => '',
            'hora_salida' => '',
            'cantidad_alumnos' => '',
            'fecha_actualizacion' => '',
            'foto' => '',
            'comentarios' => '',
            'estado' => '',
        ];
    }
}
