<?php

namespace App\Repository\Logic\Product;

class allProduct implements \App\Contracts\Logic\InterfaceLogic
{
    /**
     * Create a new class instance.
     */
    public function excute(array $data = null)
    {
        return \App\Models\Product::where('nama', 'like', "%{$data['search']}%")->paginate(15);
    }
}
