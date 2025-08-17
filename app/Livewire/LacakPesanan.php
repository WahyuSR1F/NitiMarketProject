<?php

namespace App\Livewire;

use Livewire\Component;

class LacakPesanan extends Component
{
    public function render()
    {
        return view('livewire.lacak-pesanan')->layout('layouts.users');
    }
}
