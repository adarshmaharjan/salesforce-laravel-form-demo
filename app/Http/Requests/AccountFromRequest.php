<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccountFromRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return  [
            'account-name' => ['required', "max:255"],
            'annual-revenue' => ['numeric'],
            "employees" => ['numeric',],
            "phone" => ['nullable'],
            "fax" => ['nullable'],
            'ticker-symbol' => ['nullable'],
            'sic-code' => ['numeric', 'nullable',],
            "account-site" => ['nullable'],
            "website" => ['nullable']
        ];
    }
}
