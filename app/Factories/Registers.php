<?php

namespace App\Factories;


class Registers
{
    /**
     * Create a new class instance.
     */
    public function engine (string $method):\App\Contracts\Auth\InterfaceRegister{
        return match ($method) {
          'member' => new \App\Repository\Auth\Registered\Users\RegisterUserLaravel(),
          'admin' => new \App\Repository\Auth\Registered\Admin\RegisterAdminLaravel(),
          default => throw new \Exception('Unknown login method'),
        };
    }
}
