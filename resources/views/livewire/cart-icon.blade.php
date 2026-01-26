<a href="{{ route('cart') }}" class="relative text-2xl hover:scale-110 transition">
    🛒

    @if($count > 0)
        <span class="absolute -top-2 -right-2 bg-green-600 text-white text-xs font-bold w-5 h-5 flex items-center justify-center rounded-full">
            {{ $count }}
        </span>
    @endif
</a>
