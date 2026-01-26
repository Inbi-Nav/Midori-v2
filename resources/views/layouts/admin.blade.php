<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin · Midori</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="min-h-screen bg-gradient-to-br from-gray-950 via-gray-900 to-gray-800 text-gray-200">

<div class="flex min-h-screen">

    <aside class="w-64 bg-gray-900/90 backdrop-blur border-r border-green-900/30">
        <div class="p-6 border-b border-green-900/30">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-gradient-to-br from-green-500 to-emerald-600 rounded-full flex items-center justify-center shadow">
                    <span class="text-white text-lg">緑</span>
                </div>
                <div>
                    <p class="font-semibold text-green-400">Midori</p>
                    <p class="text-xs text-gray-400">Admin Panel</p>
                </div>
            </div>
        </div>

        <nav class="p-4 space-y-2 text-sm">
            <a href="{{ route('admin.orders.index') }}"
               class="block px-4 py-2 rounded-lg hover:bg-green-900/30 transition">
                📦 Orders
            </a>

            <a href="{{ route('admin.users.index') }}"
               class="block px-4 py-2 rounded-lg hover:bg-green-900/30 transition">
                👤 Users
            </a>
        </nav>
    </aside>

    <div class="flex-1 flex flex-col">

        <header class="h-16 bg-gray-900/80 backdrop-blur border-b border-green-900/30 px-6 flex items-center justify-between">
            <h1 class="text-sm tracking-wide text-gray-400 uppercase">
                Administration
            </h1>

            <div x-data="{ open:false }" class="relative">
                <button @click="open = !open" class="flex items-center gap-3">
                    <img
                        src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=16a34a&color=fff"
                        class="w-9 h-9 rounded-full ring-2 ring-green-600/50">

                    <span class="text-sm text-gray-300">
                        {{ auth()->user()->name }}
                    </span>
                </button>

                <div
                    x-show="open"
                    @click.outside="open = false"
                    x-transition
                    class="absolute right-0 mt-3 w-44 bg-gray-800 rounded-xl shadow-lg overflow-hidden text-sm">

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="w-full text-left px-4 py-2 hover:bg-gray-700 text-red-400">
                            🚪 Logout
                        </button>
                    </form>
                </div>
            </div>
        </header>

        <main class="flex-1 p-8">
            @yield('content')
        </main>

    </div>
</div>

</body>
</html>
