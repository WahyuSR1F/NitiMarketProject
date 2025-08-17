<?php

namespace App\Factories;

class Lacak
{
    /**
     * Create a new class instance.
     */
    public function engine (string $method): \App\Repository\Logic\Interface\InterfaceLogic
    {
        return match ($method) {
            'lacak' =>  new \App\Repository\Logic\Lacak\CodePemesanan(),
            default => throw new \Exception('Unknown LoginRequest method'),
        };
    }
}
