<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class LocationRequest extends BaseFormRequest
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
            'address'   => 'required|string',
            'city'      => 'required|string',
            'type'      => ['required', Rule::in(['machine','account_branch','account_site','account_office','panaf_branch','supplier'])],
            'latitude'  => 'required',
            'longitude' => 'required',
            'region_id' => 'required|integer',
            'country_id'=> 'required|integer',
            'area_id'   => 'required|integer',
        ];
    }
}
