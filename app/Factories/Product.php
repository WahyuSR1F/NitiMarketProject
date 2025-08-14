<?php

namespace App\Factories;

class Product
{
    /**
     * Create a new class instance.
     */
    public function engine (string $method): \App\Contracts\Logic\InterfaceLogic
    {
        return match ($method) {
            'all' => new \App\Repository\Logic\Product\allProduct(),
            'kategori' => new  \App\Repository\Logic\Product\KategoriProduct(),
            'unggulan' => new \App\Repository\Logic\Product\UnggulanProduct(),
            default => throw new \Exception('Unknown LoginRequest method'),
        };
    }
}
