<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MachineRequest extends BaseFormRequest
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
            'oem'           => 'required|string',
            'model'         => 'required|string',
            'serial'        => 'required|string',
            'unit_no'       => 'required|string',
            'type'          => ['required', Rule::in(['dozer', 'excavator', 'dump Truck'])],
            'application'   => ['required', Rule::in(['mining', 'construction'])],
            'location_id'   => 'required|integer|exists:locations,id',
            'account_id'    => 'required|integer|exists:accounts,id',
            'branch_id'     => 'required|integer|exists:branches,id',
        ];
    }
}
