<x-app-layout>
    <div class="max-w-4xl mx-auto px-6 py-20">

        <h1 class="text-3xl font-bold mb-8 text-green-700">
            Checkout
        </h1>

        <div class="bg-white rounded-2xl shadow p-6 space-y-4">

            @foreach($cart as $item)
                <div class="flex justify-between items-center border-b pb-2">
                    <div>
                        <p class="font-medium">{{ $item['name'] }}</p>
                        <p class="text-sm text-gray-500">
                            {{ $item['quantity'] }} × €{{ number_format($item['price'], 2) }}
                        </p>
                    </div>

                    <span class="font-semibold">
                        €{{ number_format($item['price'] * $item['quantity'], 2) }}
                    </span>
                </div>
            @endforeach

            <div class="flex justify-between items-center pt-4 text-xl font-bold">
                <span>Total</span>
                <span class="text-green-600">
                    €{{ number_format($total, 2) }}
                </span>
            </div>
        </div>

        <form method="POST" action="{{ route('checkout.pay') }}" class="mt-8 text-right">
            @csrf
            <button class="bg-green-600 hover:bg-green-700 text-white px-8 py-3 rounded-xl text-lg font-semibold transition">
                Pay now
            </button>
        </form>
    </div>
</x-app-layout>
    