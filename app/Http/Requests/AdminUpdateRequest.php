<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminUpdateRequest extends FormRequest
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
            'name'=>'required',
            'photo'=>'sometimes|nullable|file|image|mimes:png,jpg',
            'email'=>'required',
            'password'=>'sometimes|nullable',
            'role'=>'required',
        ];
    }
    public function attributes(): array
{
    return [
        'email' => 'Email address',
        'name' => 'Name',
        'password' => 'Password',
        'role' => 'Role',
    ];
}
}
