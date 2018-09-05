<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Switchboard_ItemsFormRequest extends FormRequest
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
            'SwitchboardID' => 'required|unique_with:switchboard_items,SwitchboardID,ItemNumber|numeric',
            'ItemNumber' => 'required|unique_with:switchboard_items,SwitchboardID,ItemNumber|numeric',
            'ItemText' => 'required|max:350',
            'Command' => 'numeric',
            'Argument' => 'required|max:350',
            ];
    }
}
