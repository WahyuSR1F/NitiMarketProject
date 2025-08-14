<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterMemberRequest extends FormRequest implements \App\Contracts\Request\InterfaceRequest
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
            'name' => 'required|string|max:100',
            'nomer' =>  [
                'required',
                'regex:/^62\d{8,13}$/',
            ],
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'password_confirmation' => 'required|same:password'
        ];
    }

    public function messages (): array{
        return [
            'name.required' => 'Nama lengkap wajib diisi.',
            'name.max' => 'Nama tidak boleh lebih dari 255 karakter.',
            'nomer.required' => 'Nomor telepon wajib diisi.',
            'nomer.regex' => 'Nomor harus diawali dengan "62" dan berupa angka yang valid.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah terdaftar.',
            'password.required' => 'Password wajib diisi.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
            'password.min' => 'Password minimal 8 karakter.',
        ];
    }
}
