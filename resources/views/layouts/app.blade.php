<!DOCTYPE html>
<html lang="en">
<head>
    @livewireStyles
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Midori' }}</title>
    <link rel="icon" type="image/svg+xml" href="{{ asset('midori.svg') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="gradient-bg min-h-screen relative overflow-x-hidden">

    <nav class="fixed top-0 inset-x-0 z-50 bg-white/80 backdrop-blur-lg border-b border-pink-100 shadow-sm">
        <div class="max-w-7xl mx-auto px-6 h-20 flex items-center justify-between">

            <div class="flex items-center gap-3">
                <div class="w-12 h-12 bg-gradient-to-br from-green-400 to-green-600 rounded-full flex items-center justify-center shadow">
                    <span class="text-white text-xl">緑</span>
                </div>
                <a href="{{ route('dashboard') }}"  class="zen-font text-2xl font-bold bg-gradient-to-r from-green-600 to-green-800 bg-clip-text text-transparent">
                    Midori
                </a>
            </div>

            <div class="flex items-center gap-5">
                @livewire('cart-icon')
                <div x-data="{ open: false }" class="relative">
                    <button @click="open = !open" aria-label="User menu">
                        <img
                            src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=16a34a&color=fff"
                            class="w-10 h-10 rounded-full shadow">
                    </button>

                    <div x-show="open"  @click.outside="open = false" x-transition class="absolute right-0 mt-3 w-48 bg-white rounded-xl shadow-lg overflow-hidden text-sm">
                        <a href="{{ route('profile.edit') }}" class="block px-4 py-2 hover:bg-gray-100">👤 Profile</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="w-full text-left px-4 py-2 hover:bg-gray-100">🚪 Logout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <main class="pt-32 pb-20 max-w-7xl mx-auto px-6 relative z-10">
        {{ $slot }}
    </main>
    @livewireScripts
</body>
</html>
