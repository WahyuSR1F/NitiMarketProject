<?php

namespace App\Livewire\Admin;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class NavbarAdmin extends Component
{

    public function logout (){
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();
        return redirect()->route('login');
    }
    public function render()
    {
        return view('livewire.admin.navbar-admin');
    }
}
