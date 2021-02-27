<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DocumentRequest extends BaseFormRequest
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
            'description'       => 'required|string',
            'type'              => ['required', Rule::in(['activity', 'contact', 'account', 'opportunity', 'lead'])],
            'link'              => 'required|string',
            'account_id'        => 'required|integer|exists:accounts,id',
            'branch_id'         => 'required|integer|exists:branches,id',
        ];
    }
}
