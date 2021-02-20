<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class QuoteRequest extends BaseFormRequest
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
            'quote_number'      => 'required|string',
            'value'             => 'required|integer',
            'description'       => 'required|string',
            'sent_at'           => 'required|date|date_format:Y-m-d H:i:s',
            'expiry_date'       => 'required|date|date_format:Y-m-d H:i:s',
            'type'              => ['required', Rule::in(['get', 'uc', 'consumables', 'service'])],
            'status'            => ['required', Rule::in(['sold','pending'])],
            'opportunity_id'    => 'required|integer|exists:opportunities,id',
            'account_id'        => 'required|integer|exists:accounts,id',
            'branch_id'         => 'required|integer|exists:branches,id'
        ];
    }
}
