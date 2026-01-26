<?php

namespace App\Livewire;
use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\Product;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Auth;

class Cart extends Component {
    public array $items = [];

    protected function cartKey(): string {
        return 'cart_user_' . Auth::id();
    }

    public function mount() {
         if (!Auth::check()) return;
        $this->items = Cache::get($this->cartKey(), []);
    }

    public function render() {
        return view('livewire.cart');
    }
}
