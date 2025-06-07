<nav x-data="{ open: false, scrolled: false }" @scroll.window="scrolled = window.pageYOffset > 20"
    :class="scrolled ? 'bg-white/95 backdrop-blur-md shadow-lg' : 'bg-white/90 backdrop-blur-sm'"
    class="fixed top-0 left-0 right-0 z-50 transition-all duration-500 ease-out">

    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <!-- Left side - Logo -->
            <div class="flex items-center">
                <a href="{{ route('home') }}" class="flex items-center group">
                    <div class="flex items-center space-x-2">
                        <!-- Logo Image -->
                        <div class="relative transition-all duration-300 group-hover:scale-105">
                            <img src="{{ asset('storage/images/logo-sipentajag-1.png') }}" alt="SIPETANJAG Logo"
                                class="object-contain w-10 h-10 md:w-12 md:h-12">
                            <!-- Subtle glow effect -->
                            {{-- <div
                                class="absolute inset-0 transition-opacity duration-300 rounded-lg opacity-0 bg-gradient-to-br from-green-400 to-green-500 group-hover:opacity-20 animate-pulse">
                            </div> --}}
                        </div>

                        <!-- Text Logo -->
                        <div class="flex flex-col">
                            <span
                                class="text-xl font-bold text-transparent bg-gradient-to-r from-green-600 to-green-800 bg-clip-text">
                                SIPETANJAG
                            </span>
                            <span class="-mt-1 text-xs font-medium text-gray-500">
                                Smart Farming
                            </span>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Center - Navigation Links (Desktop) -->
            <div class="hidden md:flex md:items-center md:space-x-8">
                <a href="{{ route('home') }}"
                    class="relative px-3 py-2 text-sm font-medium transition-all duration-300 group {{ request()->routeIs('home') ? 'text-green-600' : 'text-gray-700 hover:text-green-600' }}">
                    <span class="relative z-10">Home</span>
                    <div
                        class="absolute inset-0 transition-all duration-300 scale-0 bg-green-50 rounded-lg group-hover:scale-100 {{ request()->routeIs('home') ? 'scale-100' : '' }}">
                    </div>
                    @if (request()->routeIs('home'))
                        <div
                            class="absolute bottom-0 left-1/2 w-6 h-0.5 bg-green-500 transform -translate-x-1/2 rounded-full">
                        </div>
                    @endif
                </a>

                @auth
                    <a href="{{ route('scan') }}"
                        class="relative px-3 py-2 text-sm font-medium transition-all duration-300 group {{ request()->routeIs('scan') ? 'text-green-600' : 'text-gray-700 hover:text-green-600' }}">
                        <span class="relative z-10">Scan</span>
                        <div
                            class="absolute inset-0 transition-all duration-300 scale-0 bg-green-50 rounded-lg group-hover:scale-100 {{ request()->routeIs('scan') ? 'scale-100' : '' }}">
                        </div>
                        @if (request()->routeIs('scan'))
                            <div
                                class="absolute bottom-0 left-1/2 w-6 h-0.5 bg-green-500 transform -translate-x-1/2 rounded-full">
                            </div>
                        @endif
                    </a>

                    <a href="{{ route('articles') }}"
                        class="relative px-3 py-2 text-sm font-medium transition-all duration-300 group {{ request()->routeIs('articles') ? 'text-green-600' : 'text-gray-700 hover:text-green-600' }}">
                        <span class="relative z-10">Article</span>
                        <div
                            class="absolute inset-0 transition-all duration-300 scale-0 bg-green-50 rounded-lg group-hover:scale-100 {{ request()->routeIs('articles') ? 'scale-100' : '' }}">
                        </div>
                        @if (request()->routeIs('articles'))
                            <div
                                class="absolute bottom-0 left-1/2 w-6 h-0.5 bg-green-500 transform -translate-x-1/2 rounded-full">
                            </div>
                        @endif
                    </a>
                @else
                    <a href="{{ route('login') }}"
                        class="relative px-3 py-2 text-sm font-medium text-gray-700 transition-all duration-300 group hover:text-green-600">
                        <span class="relative z-10">Scan</span>
                        <div
                            class="absolute inset-0 transition-all duration-300 scale-0 rounded-lg bg-green-50 group-hover:scale-100">
                        </div>
                    </a>

                    <a href="{{ route('login') }}"
                        class="relative px-3 py-2 text-sm font-medium text-gray-700 transition-all duration-300 group hover:text-green-600">
                        <span class="relative z-10">Article</span>
                        <div
                            class="absolute inset-0 transition-all duration-300 scale-0 rounded-lg bg-green-50 group-hover:scale-100">
                        </div>
                    </a>
                @endauth
            </div>

            <!-- Right side - User Menu (Desktop) -->
            <div class="hidden md:flex md:items-center">
                <div class="relative" x-data="{ open: false }">
                    <button type="button" @click="open = !open" @click.away="open = false"
                        class="flex items-center px-3 py-2 space-x-2 text-sm font-medium text-gray-700 transition-all duration-300 rounded-lg hover:bg-gray-50 hover:text-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                        <div class="flex items-center space-x-2">
                            <div
                                class="flex items-center justify-center w-8 h-8 rounded-full bg-gradient-to-br from-green-500 to-green-600">
                                <span class="text-xs font-semibold text-white">
                                    @auth
                                        {{ substr(Auth::user()->name, 0, 1) }}
                                    @else
                                        G
                                    @endauth
                                </span>
                            </div>
                            <span class="hidden lg:block">
                                @auth
                                    {{ Str::limit(Auth::user()->name, 12) }}
                                @else
                                    Guest
                                @endauth
                            </span>
                        </div>
                        <svg class="w-4 h-4 transition-transform duration-200" :class="open ? 'rotate-180' : ''"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <!-- Dropdown Menu -->
                    <div x-show="open" x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                        class="absolute right-0 z-50 w-56 mt-2 bg-white border border-gray-100 shadow-xl rounded-xl">
                        <div class="p-2">
                            @auth
                                <div class="px-3 py-2 border-b border-gray-100">
                                    <p class="text-sm font-medium text-gray-900">{{ Auth::user()->name }}</p>
                                    <p class="text-xs text-gray-500">{{ Auth::user()->email }}</p>
                                </div>
                                <a href="{{ route('profile.index') }}"
                                    class="flex items-center w-full px-3 py-2 mt-2 text-sm text-gray-700 transition-all duration-200 rounded-lg hover:bg-green-50 hover:text-green-600">
                                    <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                    Profile
                                </a>
                                <a href="{{ route('scan.history') }}"
                                    class="flex items-center w-full px-3 py-2 text-sm text-gray-700 transition-all duration-200 rounded-lg hover:bg-green-50 hover:text-green-600">
                                    <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    Riwayat Scan
                                </a>
                                <div class="pt-2 mt-2 border-t border-gray-100">
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit"
                                            class="flex items-center w-full px-3 py-2 text-sm text-red-600 transition-all duration-200 rounded-lg hover:bg-red-50">
                                            <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                            </svg>
                                            Logout
                                        </button>
                                    </form>
                                </div>
                            @else
                                <a href="{{ route('login') }}"
                                    class="flex items-center w-full px-3 py-2 text-sm text-gray-700 transition-all duration-200 rounded-lg hover:bg-green-50 hover:text-green-600">
                                    <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                                    </svg>
                                    Login
                                </a>
                                <a href="{{ route('register') }}"
                                    class="flex items-center w-full px-3 py-2 text-sm font-medium text-white transition-all duration-200 bg-green-500 rounded-lg hover:bg-green-600">
                                    <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                                    </svg>
                                    Register
                                </a>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mobile menu button -->
            <div class="flex items-center md:hidden">
                <button @click="open = !open" type="button"
                    class="inline-flex items-center justify-center p-2 text-gray-700 transition-all duration-300 rounded-lg hover:bg-gray-100 hover:text-green-600 focus:outline-none focus:ring-2 focus:ring-green-500">
                    <svg class="w-6 h-6" :class="{ 'hidden': open, 'block': !open }" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg class="w-6 h-6" :class="{ 'block': open, 'hidden': !open }" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile menu -->
    <div x-show="open" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 transform -translate-y-2"
        x-transition:enter-end="opacity-100 transform translate-y-0"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 transform translate-y-0"
        x-transition:leave-end="opacity-0 transform -translate-y-2"
        class="border-t border-gray-100 md:hidden bg-white/95 backdrop-blur-md">

        <!-- Navigation Links -->
        <div class="px-4 pt-4 pb-3 space-y-1">
            <a href="{{ route('home') }}"
                class="flex items-center px-3 py-3 text-base font-medium transition-all duration-200 rounded-lg {{ request()->routeIs('home') ? 'bg-green-50 text-green-600' : 'text-gray-700 hover:bg-gray-50 hover:text-green-600' }}">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                Home
            </a>

            <!-- Mobile menu Navigation Links -->
            <div class="px-4 pt-4 pb-3 space-y-1">
                <a href="{{ route('home') }}"
                    class="flex items-center px-3 py-3 text-base font-medium transition-all duration-200 rounded-lg {{ request()->routeIs('home') ? 'bg-green-50 text-green-600' : 'text-gray-700 hover:bg-gray-50 hover:text-green-600' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    Home
                </a>

                @auth
                    <a href="{{ route('scan') }}"
                        class="flex items-center px-3 py-3 text-base font-medium transition-all duration-200 rounded-lg {{ request()->routeIs('scan') ? 'bg-green-50 text-green-600' : 'text-gray-700 hover:bg-gray-50 hover:text-green-600' }}">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                        </svg>
                        Scan
                    </a>

                    <a href="{{ route('articles') }}"
                        class="flex items-center px-3 py-3 text-base font-medium transition-all duration-200 rounded-lg {{ request()->routeIs('articles') ? 'bg-green-50 text-green-600' : 'text-gray-700 hover:bg-gray-50 hover:text-green-600' }}">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                        Article
                    </a>
                @else
                    <a href="{{ route('login') }}"
                        class="flex items-center px-3 py-3 text-base font-medium text-gray-700 transition-all duration-200 rounded-lg hover:bg-gray-50 hover:text-green-600">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                        </svg>
                        Scan
                    </a>

                    <a href="{{ route('login') }}"
                        class="flex items-center px-3 py-3 text-base font-medium text-gray-700 transition-all duration-200 rounded-lg hover:bg-gray-50 hover:text-green-600">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                        Article
                    </a>
                @endauth
            </div>
        </div>

        <!-- User Section -->
        <div class="px-4 py-3 border-t border-gray-100">
            @auth
                <div class="flex items-center mb-3">
                    <div
                        class="flex items-center justify-center w-10 h-10 rounded-full bg-gradient-to-br from-green-500 to-green-600">
                        <span class="text-sm font-semibold text-white">{{ substr(Auth::user()->name, 0, 1) }}</span>
                    </div>
                    <div class="ml-3">
                        <p class="text-base font-medium text-gray-900">{{ Auth::user()->name }}</p>
                        <p class="text-sm text-gray-500">{{ Auth::user()->email }}</p>
                    </div>
                </div>
                <div class="space-y-1">
                    <a href="{{ route('profile.index') }}"
                        class="flex items-center w-full px-3 py-2 text-base font-medium text-gray-700 transition-all duration-200 rounded-lg hover:bg-gray-50 hover:text-green-600">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        Profile
                    </a>
                    <a href="{{ route('scan.history') }}"
                        class="flex items-center w-full px-3 py-2 text-base font-medium text-gray-700 transition-all duration-200 rounded-lg hover:bg-gray-50 hover:text-green-600">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Riwayat Scan
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="flex items-center w-full px-3 py-2 text-base font-medium text-red-600 transition-all duration-200 rounded-lg hover:bg-red-50">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                            Logout
                        </button>
                    </form>
                </div>
            @else
                <div class="space-y-2">
                    <a href="{{ route('login') }}"
                        class="flex items-center w-full px-3 py-2 text-base font-medium text-gray-700 transition-all duration-200 rounded-lg hover:bg-gray-50 hover:text-green-600">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                        </svg>
                        Login
                    </a>
                    <a href="{{ route('register') }}"
                        class="flex items-center w-full px-3 py-2 text-base font-medium text-white transition-all duration-200 bg-green-500 rounded-lg hover:bg-green-600">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                        </svg>
                        Register
                    </a>
                </div>
            @endauth
        </div>
    </div>
</nav>
