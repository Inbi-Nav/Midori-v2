<x-guest-layout>
    <div class="flex items-center justify-center gap-3 mb-8">
        <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-emerald-600 rounded-full flex items-center justify-center shadow">
            <span class="text-white text-xl">緑</span>
        </div>
        <span class="zen-font text-2xl font-bold text-green-700">
            Midori
        </span>
    </div>
    <div class="w-full max-w-md bg-white rounded-3xl shadow-xl p-10">
            <h1 class="text-2xl font-bold text-center mb-6">
                Welcome back
            </h1>

            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}" class="space-y-5">
                @csrf

                <div>
                    <x-input-label for="email" value="Email" />
                    <x-text-input id="email"  class="block mt-1 w-full" type="email"  name="email" :value="old('email')"  required autofocus />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="password" value="Password" />
                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <div class="flex items-center justify-between text-sm">
                    <label class="flex items-center gap-2">
                        <input type="checkbox" name="remember" class="rounded border-gray-300 text-green-600 focus:ring-green-500">
                        Remember me
                    </label>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-green-600 hover:underline">
                            Forgot password?
                        </a>
                    @endif
                </div>
                <button
                    class="w-full bg-green-600 text-white py-3 rounded-xl hover:bg-green-700 transition font-semibold">
                    Log in
                </button>
            </form>
            <p class="mt-6 text-center text-sm text-gray-500">
                Don’t have an account?
                <a href="{{ route('register') }}" class="text-green-600 hover:underline font-medium">
                    Create one
                </a>
            </p>
        </div>
</x-guest-layout>
