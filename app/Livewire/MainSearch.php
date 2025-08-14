<?php

namespace App\Livewire;

use Livewire\Attributes\Url;
use Livewire\Component;

class MainSearch extends Component
{
    #[Url(history: true)]
    public string $search = '';

    public function searchEngine () {
        $search = $this->search;
        // Dispatch event JS, bukan redirect
        $this->dispatch('navigateToProduct', search: $search);
    } 
    public function render()
    {
        return view('livewire.main-search');
    }
}
