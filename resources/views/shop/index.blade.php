<!DOCTYPE html>
<html lang="en">
<head>
    @livewireStyles
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Midori</title>
    <link rel="icon" type="image/svg+xml" href="{{ asset('midori.svg') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="gradient-bg min-h-screen relative overflow-x-hidden">

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
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search products…" class="w-80 px-4 py-2 rounded-full border border-pink-200 focus:outline-none search-glow text-sm">
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

                        <a href="{{ route('profile.edit') }}" class="block px-4 py-2 hover:bg-gray-100">👤 Profile</a>
                        <a href="{{ route('orders.mine') }}" class="block px-4 py-2 hover:bg-gray-100">📦 My orders</a>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="w-full text-left px-4 py-2 hover:bg-gray-100">
                                🚪 Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <main class="pt-32 pb-20 max-w-7xl mx-auto px-6 relative z-10">

        <section class="bg-white border-b border-gray-200 sticky top-20 z-40">
            <div class="max-w-7xl mx-auto px-6">
                <div class="flex items-center gap-8 overflow-x-auto py-4 no-scrollbar">

                    <a href="{{ route('dashboard') }}" class="text-green-600 font-semibold border-b-2 border-green-600 pb-1">
                        All
                    </a>

                    @foreach ($categories as $category)
                        <a href="{{ route('dashboard', ['category' => $category->id]) }}"
                            class="whitespace-nowrap text-sm font-medium text-gray-700 hover:text-green-600">
                            {{ $category->name }}</a>
                    @endforeach
                </div>
            </div>
        </section>

        <div x-data="{open:false}" class="flex justify-end mt-5 relative">
        <button
            @click="open = !open"
            class="flex items-center gap-2 bg-white px-4 py-2 rounded-full shadow hover:bg-gray-100 transition">
            🎛️
            <span class="text-sm font-medium">Filters</span>
            @if(request()->hasAny(['color','material','price']))
                <span class="ml-1 text-xs bg-green-600 text-white px-2 py-0.5 rounded-full">
                    ON
                </span>
            @endif
        </button>

        <div x-show="open" @click.outside="open = false" x-transition class="absolute right-0 mt-3 w-72 bg-white rounded-2xl shadow-xl p-4 z-50">
            <form method="GET" action="{{ route('dashboard') }}" class="space-y-4">

                <input type="hidden" name="search" value="{{ request('search') }}">
                <input type="hidden" name="category" value="{{ request('category') }}">

                <div>
                    <label class="text-sm font-medium">Color</label>
                    <select name="color" class="w-full mt-1 border rounded-lg px-3 py-2 text-sm">
                        <option value="">All</option>
                        <option value="green" {{ request('color')=='green'?'selected':'' }}>Green</option>
                        <option value="white" {{ request('color')=='white'?'selected':'' }}>White</option>
                        <option value="black" {{ request('color')=='black'?'selected':'' }}>Black</option>
                    </select>
                </div>

                <div>
                    <label class="text-sm font-medium">Material</label>
                    <select name="material" class="w-full mt-1 border rounded-lg px-3 py-2 text-sm">
                        <option value="">All</option>
                        <option value="ceramic" {{ request('material')=='ceramic'?'selected':'' }}>Ceramic</option>
                        <option value="wood" {{ request('material')=='wood'?'selected':'' }}>Wood</option>
                        <option value="metal" {{ request('material')=='metal'?'selected':'' }}>Metal</option>
                    </select>
                </div>
                <div>
                    <label class="text-sm font-medium">Price</label>
                    <select name="price" class="w-full mt-1 border rounded-lg px-3 py-2 text-sm">
                        <option value="">All</option>
                        <option value="low" {{ request('price')=='low'?'selected':'' }}>Under €20</option>
                        <option value="mid" {{ request('price')=='mid'?'selected':'' }}>€20 – €50</option>
                        <option value="high" {{ request('price')=='high'?'selected':'' }}>Over €50</option>
                    </select>
                </div>

                <div class="flex justify-between pt-2">
                    <a href="{{ route('dashboard') }}" class="text-sm text-gray-500 underline">
                        Reset
                    </a>

                    <button class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition">
                        Apply
                    </button>
                </div>
            </form>
        </div>
    </div>

        <section>
            <div class="grid grid-cols-1 sm:grid-cols-2 mt-12 md:grid-cols-3 lg:grid-cols-4 gap-8">
            @foreach ($products as $product)
            <div x-data="{ open:false }">
                <div class="relative bg-white rounded-3xl shadow-lg p-5 card-hover
                    {{ $product->stock == 0 ? 'opacity-50 grayscale' : '' }}">

                    @if($product->stock == 0)
                        <span class="absolute top-3 left-3 bg-gray-800 text-white text-xs px-3 py-1 rounded-full z-10">
                            Out of stock
                        </span>
                    @elseif($product->stock <= 10)
                        <span class="absolute top-3 left-3 bg-yellow-500 text-white text-xs px-3 py-1 rounded-full z-10">
                            Almost sold out
                        </span>
                    @endif

                    <img
                        src="{{ asset($product->image_url) }}"
                        class="w-full h-48 object-cover rounded-2xl cursor-pointer"
                        @click="{{ $product->stock > 0 ? 'open = true' : '' }}">

                    <h3 class="mt-4 font-semibold text-gray-800">
                        {{ $product->name }}
                    </h3>

                    <div class="flex justify-between items-center mt-2">
                        <span class="text-green-600 font-bold text-lg">
                            €{{ number_format($product->price, 2) }}
                        </span>

                        @if($product->stock > 0)
                            <button x-on:click="Livewire.dispatch('add-to-cart', { productId: {{ $product->id }} })" class="bg-green-600 text-white px-6 py-2 rounded-full hover:bg-green-700">
                                🛒
                            </button>

                        @else
                            <span class="text-gray-400 text-xl cursor-not-allowed">🛒</span>
                        @endif
                    </div>
                </div>

                <div x-show="open" x-transition class=" m-5 fixed inset-0 z-50 flex items-center justify-center bg-black/60" @click.self="open = false">

                    <div class="bg-white rounded-3xl max-w-lg w-md p-10 mt-10 relative">

                        <button class="absolute top-1 right-2 text-xl p-2 text-gray-500 hover:text-white bg-white hover:bg-red-600  rounded-2xl "  @click="open = false">
                            ✕
                        </button>

                        <img src="{{ asset($product->image_url) }}" class="w-full h-64 object-cover rounded-2xl">

                        <h2 class="mt-4 text-2xl font-bold">
                            {{ $product->name }}
                        </h2>

                        <p class="mt-2 text-gray-600 text-sm">
                            {{ $product->description }}
                        </p>

                        <div class="mt-4 text-sm text-gray-700 space-y-1">
                            <p><strong>Material:</strong> {{ $product->material }}</p>
                            <p><strong>Color:</strong> {{ $product->color }}</p>
                            <p><strong>Category:</strong> {{ $product->category->name }}</p>
                            <p class="{{ $product->stock > 0 ? 'text-green-600' : 'text-red-500' }}">
                                {{ $product->stock > 0 ? 'In stock' : 'Out of stock' }}
                            </p>
                        </div>

                        <div class="mt-6 flex justify-between items-center">
                            <span class="text-green-600 text-2xl font-bold">
                                €{{ number_format($product->price, 2) }}
                            </span>

                            @if($product->stock > 10)
                               <button x-on:click="Livewire.dispatch('add-to-cart', { productId: {{ $product->id }} })" class="bg-green-600 text-white px-6 py-2 rounded-full hover:bg-green-700">
                                🛒 Add to cart
                            </button>

                            @elseif($product->stock > 0)
                                <button class="bg-yellow-500 text-white px-6 py-2 rounded-full hover:bg-yellow-600 transition">
                                    🛒 Only {{ $product->stock }} left
                                </button>
                            @else
                                <button class="bg-gray-400 text-white px-6 py-2 rounded-full cursor-not-allowed"  disabled>
                                    Out of stock
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            </div>
        </section>
    </main> 
    </div>
    @livewireScripts
</body>
</html>

