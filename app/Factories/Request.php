<?php

namespace App\Factories;


class Request
{
    /**
     * Create a new class instance.
     */
    public function engine (string $method):\App\Contracts\Request\InterfaceRequest 
    {
        return match ($method) {
            'laravel' => new \App\Http\Requests\LoginLaravelRequest(),
            'register_laravel' => new \App\Http\Requests\RegisterMemberRequest(),
            default => throw new \Exception('Unknown LoginRequest method'),
        };
    }
}
