<x-app-layout>
    <div class="max-w-xl mx-auto px-6 py-24 text-center">

        <div class="bg-white rounded-3xl shadow p-10">
            <h1 class="text-3xl font-bold text-green-600">
                Payment successful
            </h1>
            <p class="mt-4 text-gray-600">
                Thank you for your purchase!
            </p>

            <p class="mt-6 text-sm text-gray-500">
                Order #{{ $order->id }}
            </p>

            <div class="mt-8 flex justify-center gap-4">
                <a href="{{ route('dashboard') }}"
                   class="px-6 py-3 rounded-xl bg-green-600 text-white hover:bg-green-700 transition">
                    Continue shopping
                </a>

               <a href="{{ route('orders.mine') }}" class="px-6 py-3 rounded-xl border border-green-600 text-green-600 hover:bg-green-50 transition">
                    View my orders
                </a>

            </div>
        </div>

    </div>
</x-app-layout>
