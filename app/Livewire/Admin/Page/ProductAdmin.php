<?php

namespace App\Livewire\Admin\Page;

use Livewire\Component;

class ProductAdmin extends Component
{
    public function render()
    {
        return view('livewire.admin.page.product-admin')->layout('layouts.admin');
    }
}
