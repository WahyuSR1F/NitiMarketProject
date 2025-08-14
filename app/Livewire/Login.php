<?php

namespace App\Livewire;

use Livewire\Component;

#[\Livewire\Attributes\Title('Login')]

class Login extends Component
{
    public string $activeComponent = 'login';


    public function showLogin()
    {
        $this->activeComponent = 'login';
    }

    public function showRegister()
    {
        $this->activeComponent = 'register';
    }

    public function render()
    {
        return view('livewire.login')->layout('layouts.app');
    }

}
