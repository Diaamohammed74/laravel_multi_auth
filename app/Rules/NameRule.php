<?php

namespace App\Rules;

use Closure;
use Illuminate\Support\Str;
use Illuminate\Contracts\Validation\ValidationRule;

class NameRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $blockedNames = ['fuck','a7a'];
    
        foreach ($blockedNames as $name) {
            if (Str::lower($value) === Str::lower($name)) {
                $fail('This Name "'.$value.'" Is Blocked');
            }
        }
    }
}