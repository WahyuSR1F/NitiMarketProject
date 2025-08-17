<?php

namespace App\Livewire;

use Livewire\Component;

class Promo extends Component
{
    public function render()
    {
        return view('livewire.promo')->layout('layouts.users');
    }
}
