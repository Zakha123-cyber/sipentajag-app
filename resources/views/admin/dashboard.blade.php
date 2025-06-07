<x-admin-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <!-- Stats Grid -->
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
            <!-- Users Stats -->
            <div class="p-6 bg-white rounded-lg shadow-sm">
                <div class="flex items-center">
                    <div class="p-3 bg-green-100 rounded-full">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-medium text-gray-900">Total Users</h3>
                        <p class="text-3xl font-bold text-gray-900">{{ $stats['total_users'] ?? 0 }}</p>
                    </div>
                </div>
            </div>

            <!-- Scans Stats -->
            <div class="p-6 bg-white rounded-lg shadow-sm">
                <div class="flex items-center">
                    <div class="p-3 bg-blue-100 rounded-full">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-medium text-gray-900">Total Scans</h3>
                        <p class="text-3xl font-bold text-gray-900">{{ $stats['total_scans'] ?? 0 }}</p>
                    </div>
                </div>
            </div>

            <!-- Articles Stats -->
            <div class="p-6 bg-white rounded-lg shadow-sm">
                <div class="flex items-center">
                    <div class="p-3 bg-yellow-100 rounded-full">
                        <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-medium text-gray-900">Total Articles</h3>
                        <p class="text-3xl font-bold text-gray-900">{{ $stats['total_articles'] ?? 0 }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Activity -->
        <div class="grid grid-cols-1 gap-4 mt-8 lg:grid-cols-2">
            <!-- Recent Scans -->
            <div class="p-6 bg-white rounded-lg shadow-sm">
                <h3 class="text-lg font-medium text-gray-900">Recent Scans</h3>
                <div class="mt-4 space-y-4">
                    @foreach ($stats['recent_scans'] ?? [] as $scan)
                        <div class="p-4 transition-colors border border-gray-100 rounded-lg hover:bg-gray-50">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="font-medium text-gray-900">{{ $scan->user->name }}</p>
                                    <p class="text-sm text-gray-500">{{ $scan->created_at->diffForHumans() }}</p>
                                </div>
                                <span class="px-3 py-1 text-xs font-medium text-green-800 bg-green-100 rounded-full">
                                    {{ $scan->disease ? $scan->disease->name : 'Healthy' }}
                                </span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Recent Users -->
            <div class="p-6 bg-white rounded-lg shadow-sm">
                <h3 class="text-lg font-medium text-gray-900">Recent Users</h3>
                <div class="mt-4 space-y-4">
                    @foreach ($stats['recent_users'] ?? [] as $user)
                        <div class="p-4 transition-colors border border-gray-100 rounded-lg hover:bg-gray-50">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="font-medium text-gray-900">{{ $user->name }}</p>
                                    <p class="text-sm text-gray-500">{{ $user->email }}</p>
                                </div>
                                <span
                                    class="px-3 py-1 text-xs font-medium {{ $user->role === 'admin' ? 'bg-purple-100 text-purple-800' : 'bg-gray-100 text-gray-800' }} rounded-full">
                                    {{ ucfirst($user->role) }}
                                </span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
