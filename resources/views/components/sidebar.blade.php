<aside class="fixed inset-y-0 left-0 w-64 bg-white border-r">
    <!-- Logo -->
    <div class="flex items-center justify-center h-16 bg-green-600">
        <span class="text-xl font-bold text-white">Admin Panel</span>
    </div>

    <!-- Navigation -->
    <nav class="px-4 py-6 space-y-1">
        <a href="{{ route('dashboard') }}"
            class="flex items-center px-4 py-2 text-gray-700 rounded-lg hover:bg-green-50 hover:text-green-700 {{ request()->routeIs('dashboard') ? 'bg-green-50 text-green-700' : '' }}">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
            </svg>
            Dashboard
        </a>

        <a href="{{ route('scan.history') }}"
            class="flex items-center px-4 py-2 text-gray-700 rounded-lg hover:bg-green-50 hover:text-green-700 {{ request()->routeIs('scan.history') ? 'bg-green-50 text-green-700' : '' }}">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
            </svg>
            Riwayat Scan
        </a>

        <a href="{{ route('users.index') }}"
            class="flex items-center px-4 py-2 text-gray-700 rounded-lg hover:bg-green-50 hover:text-green-700
                   {{ request()->routeIs('users.index') ? 'bg-green-50 text-green-700' : '' }}">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
            </svg>
            Users
        </a>

        <!-- Logout Button -->
        <form method="POST" action="{{ route('logout') }}" class="mt-auto">
            @csrf
            <button type="submit"
                class="flex items-center w-full px-4 py-2 mt-6 text-gray-700 rounded-lg hover:bg-red-50 hover:text-red-700">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                </svg>
                Logout
            </button>
        </form>
    </nav>
</aside>
