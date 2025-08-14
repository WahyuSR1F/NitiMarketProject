<?php

namespace App\Factories;



class Auth
{
    /**
     * Create a new class instance.
     */
    public function engine (string $method): \App\Contracts\Auth\InterfaceAuth{
        return match ($method) {
            'laravel' => new \App\Repository\Auth\Login\AuthLaravelRepository(),
            'google' => new \App\Repository\Auth\Login\AuthGoogleRepository(),
            'github' => new \App\Repository\Auth\Login\AuthGithubRepository(),
            default => throw new \Exception('Unknown login method'),
        };
    }

}
