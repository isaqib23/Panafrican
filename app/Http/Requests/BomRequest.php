<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BomRequest extends BaseFormRequest
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
            'name'              => 'required|string',
            'description'       => 'required|string',
            'quantity'          => 'required|integer',
            'machine_model'     => 'required|string',
            'part_number'       => 'required|string',
            'part_description'  => 'required|string',
            'commodity_code'    => 'required|string',
        ];
    }
}
