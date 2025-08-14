<?php

namespace App\Repository\Logic\Product;

class KategoriProduct implements \App\Contracts\Logic\InterfaceLogic
{
    /**
     * Create a new class instance.
     */
    public function excute(array $data = null)
    {
        return \App\Models\Product::all();
    }
}
