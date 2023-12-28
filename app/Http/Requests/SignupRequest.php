<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignupRequest extends FormRequest
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
            'full_name' => 'required|string|min:3',
            'email' => 'required|email|string|min:6|unique:accounts',
            'phone_number' => 'required|string|digits_between:10,12',
            'password' => 'required|string|min:8|confirmed|password',
            'address' => 'string',
            'bio'=> 'string|min:6',
            'profile_picture' => [
                'required',
                'mimetypes' => ['image/jpeg', 'image/png', 'image/gif'],
                'max' => 2048,
                'dimensions:min_width=100,min_height=100',
                'dimensions:max_width=800,max_height=800',
            ],
        ];
    }
}
