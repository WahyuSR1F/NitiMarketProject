<?php

namespace App\Factories;

class Packet
{
    /**
     * Create a new class instance.
     */
    public function engine (string $method):\App\Repository\Logic\Interface\InterfaceLogic
    {
        return match ($method) {
            'all' => new \App\Repository\Logic\Packet\getAllPacket(),
            default => throw new \Exception('Unknown LoginRequest method'),
        };
    }
}
