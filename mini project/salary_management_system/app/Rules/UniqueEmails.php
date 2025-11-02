<?php

namespace App\Rules;

use App\Models\Employee;
use App\Models\User;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class UniqueEmails implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if(Employee::where('email', $value)->exists() || User::where('email', $value)->exists())
        {
            $fail('The email is already in use.');
        }
    }
}
