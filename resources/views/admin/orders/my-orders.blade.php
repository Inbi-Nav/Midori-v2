<x-app-layout>
    <div class="max-w-4xl mx-auto px-6 py-24">
        <h1 class="text-3xl font-bold text-center text-green-600 mb-12">
            My Orders
        </h1>
        @forelse($orders as $order)
            <div class="bg-white rounded-3xl shadow p-8 mb-6">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-lg font-semibold">
                            Order #{{ $order->id }}
                        </p>
                        <p class="text-sm text-gray-500">
                            €{{ number_format($order->total_amount, 2) }}
                        </p>
                    </div>
                    <span class="px-4 py-2 rounded-full text-sm font-semibold
                        @if($order->status === 'paid') bg-yellow-100 text-yellow-700
                        @elseif($order->status === 'pending') bg-blue-100 text-blue-700
                        @elseif($order->status === 'shipped') bg-purple-100 text-purple-700
                        @elseif($order->status === 'delivered') bg-green-100 text-green-700
                        @elseif($order->status === 'cancelled') bg-red-100 text-red-700
                        @endif">
                        {{ ($order->status) }}
                    </span>
                </div>

                <div class="mt-6 flex items-center justify-between text-sm text-gray-400">
                    <div class="flex-1 text-center {{ in_array($order->status, ['pending','shipped','delivered']) ? 'text-green-600 font-semibold' : '' }}">
                        Pending
                    </div>
                    <div class="flex-1 text-center {{ in_array($order->status, ['shipped','delivered']) ? 'text-green-600 font-semibold' : '' }}">
                        Shipped
                    </div>
                    <div class="flex-1 text-center {{ $order->status === 'delivered' ? 'text-green-600 font-semibold' : '' }}">
                        Delivered
                    </div>
                </div>

                <div class="mt-4 h-2 bg-gray-200 rounded-full overflow-hidden">
                    <div
                        class="h-full bg-green-600 transition-all"
                        style="
                        width:
                            @if($order->status === 'paid') 10%
                            @elseif($order->status === 'pending') 40%
                            @elseif($order->status === 'shipped') 70%
                            @elseif($order->status === 'delivered') 100%
                            @else 100%
                            @endif
                        ">
                    </div>
                </div>

                @if(in_array($order->status, ['paid', 'pending']))
                    <form method="POST" action="{{ route('orders.cancel', $order) }}" class="mt-6 text-right">
                        @csrf
                        @method('PATCH')
                        <button
                            class="text-sm text-red-600 hover:underline"
                            onclick="return confirm('Are you sure you want to cancel this order?')">
                            Cancel order
                        </button>
                    </form>
                @endif
            </div>
        @empty
            <div class="bg-white rounded-3xl shadow p-12 text-center text-gray-500">
                You have no orders yet.
            </div>
        @endforelse
        <div class="mt-12 text-center">
            <a href="{{ route('dashboard') }}"
               class="inline-block px-8 py-3 rounded-xl bg-green-600 text-white hover:bg-green-700 transition">
                Continue shopping
            </a>
        </div>
    </div>
</x-app-layout>
