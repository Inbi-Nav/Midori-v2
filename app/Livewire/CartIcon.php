<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class CartIcon extends Component
{
    public int $count = 0;

    protected function cartKey(): string
    {
        return 'cart_user_' . Auth::id();
    }

    protected $listeners = [
        'cart-updated' => 'updateCount',
        'add-to-cart' => 'add', // 👈 ahora escucha aquí
    ];

    public function mount()
    {
        $this->updateCount();
    }

    public function add(int $productId)
    {
        if (!Auth::check()) return;

        $cart = Cache::get($this->cartKey(), []);
        $product = Product::findOrFail($productId);

        if ($product->stock <= 0) return;

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity']++;
        } else {
            $cart[$productId] = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'image' => $product->image_url,
                'quantity' => 1,
            ];
        }

        Cache::forever($this->cartKey(), $cart);

        $this->updateCount();
    }

    public function updateCount()
    {
        if (!Auth::check()) {
            $this->count = 0;
            return;
        }

        $cart = Cache::get($this->cartKey(), []);
        $this->count = collect($cart)->sum('quantity');
    }

    public function render()
    {
        return view('livewire.cart-icon');
    }
}
