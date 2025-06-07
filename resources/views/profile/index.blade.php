@extends('layouts.app')

@section('content')
    <div class="min-h-screen pt-32 pb-12 bg-gradient-to-br from-green-50 via-white to-yellow-50">
        <!-- Background Elements -->
        <div class="absolute inset-0 z-0">
            <div
                class="absolute bg-green-200 rounded-full -top-20 -left-20 w-72 h-72 mix-blend-multiply filter blur-xl opacity-70 animate-float">
            </div>
            <div
                class="absolute bg-yellow-200 rounded-full -bottom-20 -right-20 w-72 h-72 mix-blend-multiply filter blur-xl opacity-70 animate-float animation-delay-1000">
            </div>
        </div>

        <div class="container relative z-10 px-4 mx-auto sm:px-6 lg:px-8">
            <div class="max-w-2xl mx-auto">
                <!-- Profile Card -->
                <div class="overflow-hidden bg-white shadow-lg rounded-2xl">
                    <!-- Profile Header -->
                    <div class="px-6 py-8 text-center bg-gradient-to-r from-green-600 to-yellow-500">
                        <div class="w-24 h-24 mx-auto mb-4 overflow-hidden bg-white rounded-full">
                            <div class="flex items-center justify-center w-full h-full text-3xl font-bold text-green-600">
                                {{ substr(Auth::user()->name, 0, 1) }}
                            </div>
                        </div>
                        <h1 class="text-2xl font-bold text-white">
                            {{ Auth::user()->name }}
                        </h1>
                        <p class="text-green-50">{{ Auth::user()->email }}</p>
                    </div>

                    <!-- Profile Actions -->
                    <div class="p-6">
                        <div class="space-y-4">
                            <!-- Edit Profile -->
                            <a href="{{ route('profile.edit') }}"
                                class="flex items-center w-full p-3 text-left transition-colors rounded-lg hover:bg-gray-50">
                                <svg class="w-5 h-5 mr-3 text-gray-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                                <div>
                                    <p class="font-medium text-gray-900">Edit Profile</p>
                                    <p class="text-sm text-gray-500">Update your account information</p>
                                </div>
                            </a>

                            <!-- Scan History -->
                            <a href="{{ route('scan.history') }}"
                                class="flex items-center w-full p-3 text-left transition-colors rounded-lg hover:bg-gray-50">
                                <svg class="w-5 h-5 mr-3 text-gray-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                </svg>
                                <div>
                                    <p class="font-medium text-gray-900">Riwayat Scan</p>
                                    <p class="text-sm text-gray-500">Lihat history pemindaian Anda</p>
                                </div>
                            </a>

                            <!-- Logout -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                    class="flex items-center w-full p-3 text-left text-red-600 transition-colors rounded-lg hover:bg-red-50">
                                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                    </svg>
                                    <div>
                                        <p class="font-medium">Logout</p>
                                        <p class="text-sm text-red-500">Keluar dari akun Anda</p>
                                    </div>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('styles')
        <style>
            @keyframes float {

                0%,
                100% {
                    transform: translateY(0px);
                }

                50% {
                    transform: translateY(-10px);
                }
            }

            .animate-float {
                animation: float 3s ease-in-out infinite;
            }

            .animation-delay-1000 {
                animation-delay: 1000ms;
            }
        </style>
    @endpush
@endsection
