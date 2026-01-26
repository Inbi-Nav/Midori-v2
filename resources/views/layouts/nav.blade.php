<nav class="fixed top-0 inset-x-0 z-50 bg-white/80 backdrop-blur-lg border-b border-pink-100 shadow-sm">
    <div class="max-w-7xl mx-auto px-6 h-20 flex items-center justify-between">

        <div class="flex items-center gap-3">
            <div class="w-12 h-12 bg-gradient-to-br from-green-400 to-green-600 rounded-full flex items-center justify-center shadow">
                <span class="text-white text-xl">緑</span>
            </div>
            <span class="zen-font text-2xl font-bold bg-gradient-to-r from-green-600 to-green-800 bg-clip-text text-transparent">
                Midori
            </span>
        </div>

        <form method="GET" action="{{ route('dashboard') }}" class="hidden md:flex">
            <input
                type="text"
                name="search"
                placeholder="Search products…"
                class="w-80 px-4 py-2 rounded-full border border-pink-200 focus:outline-none search-glow text-sm">
        </form>

        <div class="flex items-center gap-5">
            @livewire('cart-icon')

            <div x-data="{ open: false }" class="relative">
                <button @click="open = !open">
                    <img
                        src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=16a34a&color=fff"
                        class="w-10 h-10 rounded-full shadow">
                </button>

               <div
                    x-show="open"
                    @click.outside="open = false"
                    x-transition
                    class="absolute right-0 mt-3 w-48 bg-white rounded-xl shadow-lg overflow-hidden text-sm">

                    <a href="{{ route('profile.edit') }}"
                       class="block px-4 py-2 hover:bg-gray-100">
                        👤 Profile
                    </a>

                    <a href="{{ route('orders.mine') }}"
                       class="block px-4 py-2 hover:bg-gray-100">
                        📦 My orders
                    </a>

                    @if(auth()->user()->isAdmin())
                        <a href="{{ route('admin.orders.index') }}"
                           class="block px-4 py-2 hover:bg-gray-100 text-green-700 font-medium">
                            🛠 Admin panel
                        </a>
                    @endif

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button
                            class="w-full text-left px-4 py-2 hover:bg-gray-100">
                            🚪 Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</nav>
