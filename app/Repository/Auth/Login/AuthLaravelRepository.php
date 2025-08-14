<?php

namespace App\Repository\Auth\Login;

use Illuminate\Support\Facades\Auth;



class AuthLaravelRepository implements \App\Contracts\Auth\InterfaceAuth
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function login(array $credentials): bool  
    {
       
        if ((Auth::attempt([
            'email' => $credentials['email'],
            'password' => $credentials['password'],
        ]))) {
            session()->regenerate();
            return true;
        }
          // Jika gagal
        throw \Illuminate\Validation\ValidationException::withMessages([
            'email' => ['Email atau password salah.'],
        ]);

    }

}
