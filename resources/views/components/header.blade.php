<header class="h-20 flex items-center bg-white/80 dark:bg-gray-900/60 backdrop-blur-md sticky top-0 z-10">
    <div class="w-full max-w-4xl px-4 mx-auto flex items-center">
        <nav class="hidden sm:block flex-1">
            <ul class="flex justify-center gap-6">
                <li>
                    <a href="/portfolio"
                       class="font-medium py-1 hover:text-gray-900 dark:hover:text-gray-100 text-gray-500 border-transparent">
                        Portfolio
                    </a>
                </li>
                <li>
                    <a href="/about"
                       class="font-medium py-1 hover:text-gray-900 dark:hover:text-gray-100 text-gray-500 border-transparent">
                        About
                    </a>
                </li>
                @if (Route::has('login'))
                    @auth
                        <li>
                            <a href="{{ url('/dashboard') }}"
                               class="font-medium py-1 hover:text-gray-900 dark:hover:text-gray-100 text-gray-500 border-transparent">
                                Dashboard
                            </a>
                        </li>
                    @else
                        <li>
                            <a href="{{ route('login') }}"
                               class="font-medium py-1 hover:text-gray-900 dark:hover:text-gray-100 text-gray-500 border-transparent">
                                Log in
                            </a>
                        </li>
                        @if (Route::has('register'))
                            <li>
                                <a href="{{ route('register') }}"
                                   class="font-medium py-1 hover:text-gray-900 dark:hover:text-gray-100 text-gray-500 border-transparent">
                                    Register
                                </a>
                            </li>
                        @endif
                    @endauth
                @endif
            </ul>
        </nav>

        <div class="flex-1 sm:flex sm:gap-4 sm:items-center sm:justify-end">
            <a class="block h-14 w-14 relative rounded-full border-2 border-white dark:border-gray-700 group shadow"
               href="/">
                <img class="absolute inset-0 rounded-full group-hover:opacity-80 transition-all duration-150"
                     src="{{asset('assets/images/main.jpg')}}"
                     alt="Klenin">
            </a>
        </div>

        <div class="sm:hidden flex-1 flex gap-4 items-center justify-end">
            <button @click="open = ! open">
                <svg class="w-6 h-6 text-gray-700 dark:text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none"
                     viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"></path>
                </svg>
            </button>
        </div>
    </div>
</header>

<div x-show="open" style="display: none;" class="fixed inset-0 bg-white dark:bg-gray-900 z-20">
    <div class="h-20 px-4 flex items-center justify-between">
        <a class="block h-14 w-14 relative rounded-full border-2 border-white dark:border-gray-700 group shadow"
           href="/">
            <img class="absolute inset-0 rounded-full group-hover:opacity-80 transition-all duration-150"
                 src="{{asset('assets/images/main.jpg')}}"
                 alt="Klenin">
        </a>
        <button class="sm:hidden" @click="open = ! open">
            <svg class="w-6 h-6 text-gray-700 dark:text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none"
                 viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"></path>
            </svg>
        </button>
    </div>
    <nav class="px-4 text-right">
        <ul class="flex flex-col gap-6">
            <li>
                <a href="/cryptocurrency"
                   class="font-medium text-xl py-1 hover:text-gray-900 dark:hover:text-gray-100 text-gray-500 border-transparent">
                    Cryptocurrency
                </a>
            </li>
            <li>
                <a href="/portfolio"
                   class="font-medium text-xl py-1 hover:text-gray-900 dark:hover:text-gray-100 text-gray-500 border-transparent">
                    Portfolio
                </a>
            </li>
            <li>
                <a href="/about"
                   class="font-medium text-xl py-1 hover:text-gray-900 dark:hover:text-gray-100 text-gray-500 border-transparent">
                    About
                </a>
            </li>
        </ul>
    </nav>
</div>
