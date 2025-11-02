<?php

namespace App\Http\Requests\Employee;

use App\Rules\UniqueEmails;
use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|min:3|string',
            'email' => ['required', 'string', 'email', new UniqueEmails],
            'phone' => 'required|numeric|digits:10',
            'date_of_birth' => 'required|date',
            'address' => 'required|min:3|string',
            'user_email' => ['required', 'string', 'email', new UniqueEmails],
            'password' => 'required|string|min:8',
        ];
    }
}
