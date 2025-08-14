<?php

namespace App\Livewire;

use Livewire\Component;

#[\Livewire\Attributes\Title('About')]

class About extends Component
{

    public function render()
    {
        return view('livewire.about')->layout('layouts.app');
    }
}
