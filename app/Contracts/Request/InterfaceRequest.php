<?php

namespace App\Contracts\Request;

interface InterfaceRequest
{
    /**
     * Create a new class instance.
     */
    public function authorize ():bool;
    public function rules(): array;
    public function messages(): array;
}
