<?php

namespace App\Livewire\Product;

use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

#[\Livewire\Attributes\Title('Product')]

class Product extends Component
{
    use WithPagination;
    #[Url]
    public string $search = '';

    public function updatingSearch()
    {
        // Reset ke halaman 1 saat melakukan pencarian baru
        $this->resetPage();
    }

    public function render()
    {
        $data = new \App\Http\Controllers\Product();
        $data =  $data->getAll($this->search);
        return view('livewire.product.product', ['products' =>  $data])->layout('layouts.users');
    }
}
