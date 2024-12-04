<x-guest-layout>
    <div class="flex flex-col items-center justify-center gap-6 p-6 bg-yellow-100 rounded-lg shadow-lg max-w-md mx-auto">
        <h1 class="text-3xl font-bold text-red-600 mb-10">Papa's Seafooderia Login</h1>
        @if (Route::has('login'))
            <nav class="flex justify-center gap-4 w-full">
                @auth
                    <a
                        href="{{ url('/dashboard') }}"
                        class="rounded-md px-4 py-2 bg-red-600 text-white font-semibold text-lg ring-2 ring-transparent transition-colors hover:bg-red-700 focus:outline-none focus:ring-[#FF2D20] dark:text-white dark:hover:bg-red-800"
                    >
                        Dashboard
                    </a>
                @else
                    <a
                        href="{{ route('login') }}"
                        class="rounded-md px-4 py-2 bg-yellow-500 text-black font-semibold text-lg ring-2 ring-transparent transition-colors hover:bg-yellow-600 focus:outline-none focus:ring-[#FF2D20] dark:text-white dark:hover:bg-yellow-400"
                    >
                        Log in
                    </a>
                    @if (Route::has('register'))
                        <a
                            href="{{ route('register') }}"
                            class="rounded-md px-4 py-2 bg-yellow-500 text-black font-semibold text-lg ring-2 ring-transparent transition-colors hover:bg-yellow-600 focus:outline-none focus:ring-[#FF2D20] dark:text-white dark:hover:bg-yellow-400"
                        >
                            Register
                        </a>
                    @endif
                @endauth
            </nav>
            @endif
    </div>
    
</x-guest-layout>