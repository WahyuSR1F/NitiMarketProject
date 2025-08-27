<?php

namespace App\Livewire\Admin\Page;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;

class KasirDigital extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';

    public $search = '';
    public $cart = [];
    public $promo = 0; // ini yang akan berubah otomatis saat pilih promo

    public $subtotal = 0;
    public $discount = 0;
    public $total = 0;

    public function mount()
    {
         $this->products = Product::paginate(12); // load awal
        $this->cart = session()->get('cart', []);
        $this->recalc(); // <--- trigger awal
    }

    public function searchProducts($value)
    {
        $this->search = $value;
        $this->resetPage();
        $this->products = Product::where('nama', 'like', "%{$value}%")
            ->paginate(12)
            ->onEachSide(1);
    }

    public function setPromo($value)
    {
        $this->promo = (int) $value;
        $this->recalc();
    }


    public function addToCart($id, $price = null)
    {
        $product = Product::find($id);
        if (!$product) return;

        $finalPrice = $price ?? $product->harga ?? 0;

        if (isset($this->cart[$id])) {
            $this->cart[$id]['qty']++;
        } else {
            $this->cart[$id] = [
                'id'    => $product->id,
                'name'  => $product->nama,
                'price' => $finalPrice,
                'qty'   => 1,
            ];
        }

        session()->put('cart', $this->cart);
        $this->recalc(); // <--- trigger perhitungan langsung
    }

    public function removeFromCart($id)
    {
        unset($this->cart[$id]);
        session()->put('cart', $this->cart);
        $this->recalc(); // <--- trigger
    }

    public function changeQty($id, $delta)
    {
        if (!isset($this->cart[$id])) return;
    
        $this->cart[$id]['qty'] += $delta;
    
        if ($this->cart[$id]['qty'] <= 0) {
            $this->removeFromCart($id);
            return;
        }
    
        session()->put('cart', $this->cart);
        $this->recalc(); // <--- trigger
    }

    // ====== Computed Properties ======
    public function getSubtotalProperty()
    {
        return collect($this->cart)->sum(fn($item) => ($item['price'] ?? 0) * ($item['qty'] ?? 0));
    }

    public function getDiscountProperty()
    {
        return $this->subtotal * ((int) $this->promo / 100);
    }

    public function getTotalProperty()
    {
        return $this->subtotal - $this->discount;
    }

    public function render()
    {
        $products = Product::where('nama', 'like', "%{$this->search}%")
            ->paginate(12)
            ->onEachSide(1);

       

            return view('livewire.admin.page.kasir-digital', [
                'products' => $products,
            ])->layout('layouts.admin');
    }

    protected function recalc(): void
    {
        $this->subtotal = collect($this->cart)->sum(fn($i) => ($i['price'] ?? 0) * ($i['qty'] ?? 0));
        $this->discount = $this->subtotal * ($this->promo / 100);
        $this->total = $this->subtotal - $this->discount;
    }
}
