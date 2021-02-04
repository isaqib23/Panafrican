<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BranchRequest extends BaseFormRequest
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
            'name'          => 'required|string',
            'account_id'    => 'required|integer|exists:accounts,id',
            'type'          => 'required|string',
            'location_id'   => 'required|integer|exists:locations,id',
            'website'       => 'required|string',
            'par'           => 'required|integer',
            'region_id'     => 'required|integer',
            'country_id'    => 'required|integer',
            'area_id'       => 'required|integer',
        ];
    }
}
