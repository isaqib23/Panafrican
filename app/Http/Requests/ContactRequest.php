<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends BaseFormRequest
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
            'first_name'            => 'required|string',
            'last_name'             => 'required|string',
            'position'              => 'required|string',
            'role_description'      => 'required|string',
            'email'                 => 'required|string',
            'phone'                 => 'required|string',
            'account_id'            => 'required|integer|exists:accounts,id',
            'branch_id'             => 'required|integer|exists:branches,id'
        ];
    }
}
