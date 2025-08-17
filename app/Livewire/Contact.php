<?php

namespace App\Livewire;

use Livewire\Component;

#[\Livewire\Attributes\Title('Contact')]

class Contact extends Component
{
    public function render()
    {
        return view('livewire.contact')->layout('layouts.users');
    }
}
