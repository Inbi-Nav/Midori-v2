@extends('layouts.admin')

@section('content')
<h1 class="zen-font text-2xl font-bold mb-8 text-green-400">
    Orders
</h1>
@foreach($orders as $order)
    <div class="
        rounded-xl p-5 mb-4 border
        @if($order->status === 'cancelled') bg-red-900/30 border-red-700
        @elseif($order->status === 'delivered') bg-green-900/30 border-green-700
        @else bg-gray-900 border-gray-800
        @endif
    ">

        <div class="flex justify-between items-center mb-4">
            <div>
                <p class="text-sm text-gray-400">
                    Order #{{ $order->id }}
                </p>
                <p class="font-medium">
                    {{ $order->user->name }}
                </p>
            </div>

            <span class="text-sm font-semibold uppercase
                @if($order->status === 'cancelled') text-red-400
                @elseif($order->status === 'delivered') text-green-400
                @else text-yellow-400
                @endif
            ">
                {{ $order->status }}
            </span>
        </div>

        @if(!in_array($order->status, ['cancelled', 'delivered']))
            <form method="POST"
                  action="{{ route('admin.orders.status', $order) }}"
                  class="flex gap-3">
                @csrf
                @method('PATCH')

                <select name="status"
                        class="bg-gray-800 border border-gray-700 rounded px-3 py-1 text-sm">
                    @foreach(\App\Models\Order::STATUSES as $status)
                        <option value="{{ $status }}" @selected($order->status === $status)>
                            {{ ucfirst($status) }}
                        </option>
                    @endforeach
                </select>

                <button class="bg-green-600 hover:bg-green-700 px-4 py-1.5 rounded text-sm">
                    Save
                </button>
            </form>
        @else
            <p class="text-sm text-gray-400 italic">
                This order is closed and cannot be modified.
            </p>
        @endif
    </div>
@endforeach

@endsection
