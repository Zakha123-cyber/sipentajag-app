<aside class="fixed inset-y-0 left-0 w-64 bg-white border-r">
    <!-- Logo -->
    <div class="flex items-center justify-center h-16 bg-green-600">
        <span class="text-xl font-bold text-white">Admin Panel</span>
    </div>

    <!-- Navigation -->
    <nav class="px-4 py-6 space-y-1">
        <!-- Dashboard -->
        <a href="{{ route('dashboard') }}"
            class="flex items-center px-4 py-2 text-gray-700 rounded-lg hover:bg-green-50 hover:text-green-700 {{ request()->routeIs('dashboard') ? 'bg-green-50 text-green-700' : '' }}">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
            </svg>
            Dashboard
        </a>

        <!-- Account Management -->
        <a href="{{ route('admin.users.index') }}"
            class="flex items-center px-4 py-2 text-gray-700 rounded-lg hover:bg-green-50 hover:text-green-700 {{ request()->routeIs('admin.users.*') ? 'bg-green-50 text-green-700' : '' }}">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
            </svg>
            Manajemen Akun
        </a>

        <!-- Article Management -->
        <a href="{{ route('admin.articles.index') }}"
            class="flex items-center px-4 py-2 text-gray-700 rounded-lg hover:bg-green-50 hover:text-green-700 {{ request()->routeIs('admin.articles.*') ? 'bg-green-50 text-green-700' : '' }}">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
            </svg>
            Manajemen Artikel
        </a>

        <!-- Disease Management -->
        <a href="{{ route('admin.diseases.index') }}"
            class="flex items-center px-4 py-2 text-gray-700 rounded-lg hover:bg-green-50 hover:text-green-700 {{ request()->routeIs('admin.diseases.*') ? 'bg-green-50 text-green-700' : '' }}">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            Manajemen Penyakit
        </a>

        <!-- Fertilizer Management -->
        <a href="{{ route('admin.fertilizers.index') }}"
            class="flex items-center px-4 py-2 text-gray-700 rounded-lg hover:bg-green-50 hover:text-green-700 {{ request()->routeIs('admin.fertilizers.*') ? 'bg-green-50 text-green-700' : '' }}">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" />
            </svg>
            Manajemen Pupuk
        </a>

        <!-- Logout Button -->
        <form method="POST" action="{{ route('logout') }}" class="mt-6">
            @csrf
            <button type="submit"
                class="flex items-center w-full px-4 py-2 text-gray-700 rounded-lg hover:bg-red-50 hover:text-red-700">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                </svg>
                Logout
            </button>
        </form>
    </nav>
</aside>
