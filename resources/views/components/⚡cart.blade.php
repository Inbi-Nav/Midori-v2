<div class="bg-white rounded-2xl shadow-xl p-4 w-80 max-h-[70vh] overflow-y-auto">

    <p class="text-xs text-gray-400 mb-2">
        Debug: {{ $debug }}
    </p>

    <h2 class="font-bold text-lg mb-4">🛒 Your cart</h2>

    @forelse($items as $item)
        <div class="flex justify-between items-center mb-3">
            <div>
                <p class="font-medium">{{ $item['name'] }}</p>
                <p class="text-sm text-gray-500">
                    {{ $item['quantity'] }} × €{{ number_format($item['price'], 2) }}
                </p>
            </div>

            <button
                wire:click="remove({{ $item['id'] }})"
                class="text-red-500 hover:text-red-700">
                ✕
            </button>
        </div>
    @empty
        <p class="text-sm text-gray-500">Your cart is empty</p>
    @endforelse
</div>
