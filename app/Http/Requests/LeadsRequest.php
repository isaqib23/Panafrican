<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class LeadsRequest extends BaseFormRequest
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
            'value'             => 'required|string',
            'description'       => 'required|string',
            'pipeline'          => ['required', Rule::in(['sales','after sale'])],
            'pipeline_stage'    => ['required', Rule::in(['demo', 'tender', 'negotiation', 'won', 'lost', 'initial', 'quote'])],
            'sales_type'        => ['required', Rule::in(['parts', 'service', 'equipment', 'get', 'uc'])],
            'target_date'       => 'date|date_format:Y-m-d H:i:s',
            'primary_contact'   => 'string',
            'owner_id'          => 'required|integer|exists:users,id',
            'source'            => 'required|string',
            'account_id'        => 'required|integer|exists:accounts,id',
            'branch_id'         => 'required|integer|exists:branches,id'
        ];
    }
}
