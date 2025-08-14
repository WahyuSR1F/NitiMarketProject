<?php

namespace App\Livewire;

use Livewire\Component;

#[\Livewire\Attributes\Title('Landing')]

class Landing extends Component
{
    public function render()
    {
        return view('livewire.landing')->layout('layouts.app');
    }
}
