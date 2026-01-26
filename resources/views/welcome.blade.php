<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Midori</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300;400;500;700&family=Zen+Maru+Gothic:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/svg+xml" href="{{ asset('midori.svg') }}">

</head>
<body class="gradient-bg min-h-screen relative overflow-x-hidden">
    <div class="petals-container">
        <div class="petal text-pink-400 text-xl">🌸</div>
        <div class="petal text-pink-300 text-3xl">🌸</div>
        <div class="petal text-pink-400 text-2xl">🌸</div>
    
    </div>
    
    <div class="leaves-container">
        <div class="leaf text-green-400 text-2xl">🍃</div>
        <div class="leaf text-green-500 text-xl">🍃</div>
        <div class="leaf text-green-400 text-3xl">🍃</div>
        <div class="leaf text-green-600 text-xl">🍃</div>
        <div class="leaf text-green-500 text-2xl">🍃</div>
    </div>

    <nav class="fixed top-0 left-0 right-0 z-50  opacity-80 bg-white/80 backdrop-blur-lg border-b border-pink-100 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <div class="flex items-center space-x-3">
                    <div class="w-12 h-12 bg-gradient-to-br from-green-400 to-green-600 rounded-full flex items-center justify-center shadow-lg">
                        <span class="text-white text-xl">緑</span>
                    </div>
                    <span class="zen-font text-2xl font-bold bg-gradient-to-r from-green-600 to-green-800 bg-clip-text text-transparent">Midori</span>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="{{ route('login') }}" class="px-5 py-2.5    text-green-500 font-medium hover:text-green-800 transition-colors">
                        Login
                    </a>
                    <a href="{{ route('register') }}" class="px-6 py-2.5 bg-gradient-to-r from-green-500 to-green-600 text-white font-medium rounded-full hover:from-green-600 hover:to-green-700 transition-all shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                        Register
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <section class="relative pt-52 pb-20 px-4 z-10">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16">
                <div class="flex justify-center items-center space-x-4 mb-6">
                    <span class="text-4xl">⛩️</span>
                    <div class="h-px w-24 bg-gradient-to-r from-transparent via-pink-300 to-transparent"></div>
                    <span class="text-5xl">🌸</span>
                    <div class="h-px w-24 bg-gradient-to-r from-transparent via-pink-300 to-transparent"></div>
                    <span class="text-4xl">⛩️</span>
                </div>
                
                <h1 class="zen-font text-6xl md:text-8xl font-bold mb-4">
                    <span class="bg-gradient-to-r from-green-600 via-green-500 to-emerald-600 bg-clip-text text-transparent">Midori</span>
                    <span class="text-pink-400 ml-4">緑</span>
                </h1>
                <p class="text-xl md:text-2xl text-gray-600 mb-4 max-w-2xl mx-auto">
                    日本文化の美しさを世界へ
                </p>
                <p class="text-lg text-gray-500 mb-12 max-w-xl mx-auto">
                    A quiet journey into Japanese culture
                </p>
                 <a href="{{ route('register') }}" class="inline-flex items-center gap-2 px-8 py-4 bg-gradient-to-r from-emerald-600 to-teal-600 text-white text-lg font-semibold rounded-full hover:from-emerald-700 hover:to-teal-700 transition-all shadow-xl shadow-emerald-600/30 transform hover:scale-105">
                Start Your Journey
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
            </div>
        </div>
    </section>
   <section class="py-1 px-4 relative z-10">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-16">
            <span class="text-pink-500 font-medium tracking-wider uppercase text-sm">
                Explore Our Collections
            </span>
        </div>
    </div>
</section>

            
        <section class="py-20 px-4 relative z-10">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="card-hover bg-white rounded-3xl overflow-hidden shadow-lg border border-green-100 group cursor-pointer">
                    <div class="h-48 bg-gradient-to-br from-green-100 to-green-200 flex items-center justify-center relative overflow-hidden">
                        <span class="text-8xl group-hover:scale-110 transition-transform duration-500">🍵</span>
                        <div class="absolute inset-0 bg-green-500/10 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    </div>
                    <div class="p-6">
                        <h3 class="zen-font text-xl font-bold text-gray-800 mb-2">Matcha Collection</h3>
                    </div>
                </div>

                <div class="card-hover bg-white rounded-3xl overflow-hidden shadow-lg border border-blue-100 group cursor-pointer">
                    <div class="h-48 bg-gradient-to-br from-blue-100 to-indigo-200 flex items-center justify-center relative overflow-hidden">
                        <span class="text-8xl group-hover:scale-110 transition-transform duration-500">✨</span>
                        <div class="absolute inset-0 bg-blue-500/10 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    </div>
                    <div class="p-6">
                        <h3 class="zen-font text-xl font-bold text-gray-800 mb-2">Anime Collection</h3>
                    </div>
                </div>

                <div class="card-hover bg-white rounded-3xl overflow-hidden shadow-lg border border-amber-100 group cursor-pointer">
                    <div class="h-48 bg-gradient-to-br from-amber-100 to-orange-200 flex items-center justify-center relative overflow-hidden">
                        <span class="text-8xl group-hover:scale-110 transition-transform duration-500">🏠</span>
                        <div class="absolute inset-0 bg-amber-500/10 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    </div>
                    <div class="p-6">
                        <h3 class="zen-font text-xl font-bold text-gray-800 mb-2">Studio Ghibli</h3>
                    </div>
                </div>

                <div class="card-hover bg-white rounded-3xl overflow-hidden shadow-lg border border-pink-100 group cursor-pointer">
                    <div class="h-48 bg-gradient-to-br from-pink-100 to-rose-200 flex items-center justify-center relative overflow-hidden">
                        <span class="text-8xl group-hover:scale-110 transition-transform duration-500">🎎</span>
                        <div class="absolute inset-0 bg-pink-500/10 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    </div>
                    <div class="p-6">
                        <h3 class="zen-font text-xl font-bold text-gray-800 mb-2">Decorations</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>

<footer class="bg-gray-900 text-white py-16 px-4 relative z-10">
    <div class="max-w-7xl mx-auto">

        <div class="grid grid-cols-1 md:grid-cols-3 gap-40">
            <div>
                <div class="flex items-center space-x-3 mb-6">
                    <div class="w-10 h-10 bg-gradient-to-br from-green-400 to-green-600 rounded-full flex items-center justify-center">
                        <span class="text-white">緑</span>
                    </div>
                    <span class="zen-font text-xl font-bold">Midori</span>
                </div>

                <p class="text-gray-400 text-sm mb-4">
                    Bringing the beauty and tradition of Japanese culture to modern homes.
                </p>

                <p class="text-gray-500 text-xs italic">
                    Designed for mindful meaning.
                </p>
            </div>

            <div >
                <h4 class="font-semibold mb-4 text-green-400">Explore</h4>
                <ul class="space-y-3 text-gray-400 text-sm">
                    <li><a href="/shop" class="hover:text-white transition-colors">Shop</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">About Midori</a></li>
                    <li><a href="/login" class="hover:text-white transition-colors">Login</a></li>
                </ul>
            </div>

            <div>
                <h4 class="font-semibold mb-4 text-green-400">Information</h4>
                <ul class="space-y-3 text-gray-400 text-sm">
                    <li>📧 support@midori.com</li>
                    <li>📞 547 896 547</li>
                </ul>
            </div>
        </div>

        <div class="border-t border-gray-800 mt-12 pt-8 text-center text-gray-500 text-sm space-y-2">
            <p>© {{ date('Y') }} Midori 緑. All rights reserved.</p>
            <p class="text-xs">
                Academic project · Payments are simulated · Built with Laravel & Tailwind
            </p>
        </div>
    </div>
</footer>
</body>
</html>
