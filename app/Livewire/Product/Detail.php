<?php

namespace App\Livewire\Product;

use Livewire\Component;

class Detail extends Component
{

    public \App\Models\User $user;
    public function render()
    {
        return view('livewire.product.detail')->layout('layouts.app')->title($this->user->name);
    }
}
