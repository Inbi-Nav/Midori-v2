<?php

namespace App\Livewire;
use Livewire\Component;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class CartPage extends Component {
    public array $items = [];
    public float $total = 0;

    protected function cartKey(): string {
        return 'cart_user_' . Auth::id();
    }

    public function mount() {
        if (!Auth::check()) return;
        $this->items = Cache::get($this->cartKey(), []);
        $this->calculateTotal();
    }

    public function increment($productId) {
        $product = Product::findOrFail($productId);

        if ($this->items[$productId]['quantity'] < $product->stock) {
            $this->items[$productId]['quantity']++;
            $this->sync();
        }
    }

    public function decrement($productId) {
        if ($this->items[$productId]['quantity'] > 1) {
            $this->items[$productId]['quantity']--;
        } else {
            unset($this->items[$productId]);
        }

        $this->sync();
    }

    public function remove($productId) {
        unset($this->items[$productId]);
        $this->sync();
    }

    protected function sync() {
        Cache::forever($this->cartKey(), $this->items);
        $this->calculateTotal();
        $this->dispatch('cart-updated');
    }

    protected function calculateTotal() {
        $this->total = collect($this->items)->sum(
            fn ($item) => $item['price'] * $item['quantity']
        );
    }

    public function render() {
        return view('livewire.cart-page');
    }
}
