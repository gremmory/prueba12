<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuariosFormRequest extends FormRequest
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
            'Apellidos' => 'required|string|max:100', 
            'Nombres' => 'required|string|max:100', 
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|min:6|confirmed', 
            'permite_ver' => 'boolean', 
            'permite_modif' => 'boolean', 
            'permite_agregar' => 'boolean', 
            'admin' => 'boolean',
        ];
        /*
        return [
            'Apellidos' => 'required|max:50',
            'Nombres' => 'required|max:50',
            'CorreoE' => 'required|email|max:50',
            'Nomusuario' => 'required|unique:usuarios,Nomusuario|max:20',
            'contrasena' => 'required|max:20',
            'permite_ver' => 'required|boolean',
            'permite_modif' => 'required|boolean',
            'permite_agregar' => 'required|boolean',
        ];
        */
    }
}
