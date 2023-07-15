<?php

namespace App\Http\Requests;

use Rules\Password;
use App\Models\User;

use App\Rules\NameRule;
use Illuminate\Validation\Rules;
use Illuminate\Foundation\Http\FormRequest;

class userRegister extends FormRequest
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
            'name' => ['required', 'string', 'max:255',new NameRule],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required',Rules\Password::defaults()],
        ];
    }
    public function attributes(): array
    {
        return [
            'name' => 'User Name',
            'password' =>'Password',
        ];
    }
}
