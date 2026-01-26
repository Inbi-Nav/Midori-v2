<div class="relative bg-white rounded-3xl shadow-lg p-5 card-hover">

    <img
        src="{{ asset($product->image_url) }}"
        class="w-full h-48 object-cover rounded-2xl">

    <h3 class="mt-4 font-semibold text-gray-800">
        {{ $product->name }}
    </h3>
     <img
        src="{{ asset($product->image_url) }}"
        alt="{{ $product->name }}"
        class="w-full h-48 object-cover rounded-2xl"/>

    <div class="flex justify-between items-center mt-2">
        <span class="text-green-600 font-bold text-lg">
            €{{ number_format($product->price, 2) }}
        </span>

        @if($product->stock > 0)
            <button wire:click="addToCart" class="text-xl hover:scale-110 transition">
            🛒
            </button>
        @else
            <span class="text-gray-400 text-xl">🛒</span>
        @endif
    </div>
</div>
