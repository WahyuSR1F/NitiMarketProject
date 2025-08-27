<?php

namespace App\Repository\Auth\Registered\Users;

use App\Models\Role;
use Illuminate\Support\Str;

class RegisterUserLaravel implements \App\Contracts\Auth\InterfaceRegister
{
    /**
     * Create a new class instance.
     */

    public function register (array $data)
    {
        $user = \App\Models\User::create([
            'id' => \Illuminate\Support\Str::uuid(),
            'name' =>  $data['name'],
            'email' => $data['email'],
            'nomer' => '+'.$data['nomer'],
            'password' => \Illuminate\Support\Facades\Hash::make($data['password']),
            'role_id' => Role::where('role', 'member')->first()->id,
        ]);
        return $user;
    }
}
