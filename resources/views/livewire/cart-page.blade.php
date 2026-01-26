<div class="max-w-5xl mx-auto pt-32 px-6">
    @forelse ($items as $item)
        <div class="flex items-center gap-6 bg-white rounded-xl shadow p-4 mb-4">

            <img src="{{ asset($item['image']) }}" class="w-24 h-24 object-cover rounded-lg">

            <div class="flex-1">
                <h2 class="font-semibold text-lg">{{ $item['name'] }}</h2>

                <p class="text-sm text-gray-500">
                    €{{ number_format($item['price'], 2) }} / unit
                </p>

                <p class="text-green-600 font-bold mt-1">
                    €{{ number_format($item['price'] * $item['quantity'], 2) }}
                </p>
            </div>
            <div class="flex items-center gap-3">
                <button wire:click="decrement({{ $item['id'] }})" 
                @if($item['quantity'] <= 1) disabled class="px-3 py-1 bg-gray-100 text-gray-400 cursor-not-allowed rounded"
                    @else class="px-3 py-1 bg-gray-200 rounded hover:bg-gray-300"
                    @endif>
                    −
                </button>
                <span class="font-semibold w-6 text-center">
                    {{ $item['quantity'] }}
                </span>
                <button wire:click="increment({{ $item['id'] }})" class="px-3 py-1 bg-gray-200 rounded hover:bg-gray-300">
                    +
                </button>
            </div>

            <button  wire:click="remove({{ $item['id'] }})"  class="text-red-500 text-xl">
                🗑
            </button>
        </div>
    @empty
        <p class="text-gray-500">Your cart is empty.</p>
    @endforelse

    @if(count($items))
        <div class="mt-10 flex justify-end gap-4 items-center">
    
            <div class="bg-white rounded-xl shadow px-6 py-4">
                <p class="text-gray-500 text-sm">Total</p>
                <p class="text-2xl font-bold text-green-600">
                    €{{ number_format($total, 2) }}
                </p>
            </div>
    
            <a
                href="{{ route('checkout') }}"
                class="bg-green-600 text-white px-6 py-4 rounded-xl font-semibold hover:bg-green-700 transition"
            >
                Proceed to checkout
            </a>
    
        </div>
    @endif

</div>
