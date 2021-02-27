<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SaleTargetRequest extends BaseFormRequest
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
            'sale_type'         => ['required', Rule::in(['equipment','parts','service','training','get','hose','fuel','lubricants','others'])],
            'account_id'        => 'required|integer|exists:accounts,id',
            'branch_id'         => 'required|integer|exists:branches,id',
            'budget'            => 'required|string',
            'actual'            => 'required|string',
            'month'             => 'required|date|date_format:Y-m-d H:i:s',
        ];
    }
}
