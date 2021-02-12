<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ActivityRequest extends BaseFormRequest
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
            'title'             => 'required|string',
            'description'       => 'required|string',
            'type'              => ['required', Rule::in(['email', 'phone', 'visit', 'meetings', 'event', 'others'])],
            'topic'             => 'required|string',
            'target_date'       => 'date|date_format:Y-m-d H:i:s',
            'closing_date'      => 'date|date_format:Y-m-d H:i:s',
            'completed'         => 'required|integer',
            'account_id'        => 'required|integer|exists:accounts,id',
            'branch_id'         => 'required|integer|exists:branches,id'
        ];
    }
}
