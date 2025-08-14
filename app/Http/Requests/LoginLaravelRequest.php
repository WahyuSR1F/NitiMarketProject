<?php

namespace App\Http\Requests;

use App\Contracts\Request\InterfaceRequest;
use Illuminate\Foundation\Http\FormRequest;

class LoginLaravelRequest extends FormRequest implements InterfaceRequest
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
        return [
            'email' => ['required', 'string', 'email:rfc,dns', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'max:100', 'regex:/^[\S]{8,}$/'],
        ];
    }

    public function messages():array
    {
        return [
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.max' => 'Email terlalu panjang.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 8 karakter.',
            'password.regex' => 'Password tidak boleh mengandung spasi.',
            'password.max' => 'Password terlalu panjang.',
        ];
    }
}
