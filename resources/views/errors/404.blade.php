<x-app-layout>
    <div class="min-h-screen flex flex-col items-center justify-center text-center">
        <h1 class="text-6xl font-bold text-gray-800">404</h1>

        <p class="mt-4 text-lg text-gray-600">
            Página no encontrada
        </p>

        <a href="{{ url('/') }}"
           class="mt-6 inline-block px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
            Volver al inicio
        </a>
    </div>
</x-app-layout>
