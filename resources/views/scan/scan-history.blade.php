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
            <!-- Header -->
            <div class="max-w-4xl mx-auto text-center">
                <h1 class="mb-4 text-4xl font-bold text-gray-900">
                    Riwayat
                    <span class="text-transparent bg-gradient-to-r from-green-600 to-yellow-500 bg-clip-text">Scan</span>
                </h1>
                <p class="max-w-2xl mx-auto text-lg text-gray-600">
                    Lihat riwayat pemindaian tanaman jagung Anda untuk memantau perkembangannya.
                </p>
            </div>

            <!-- Scan History List -->
            <div class="max-w-4xl mx-auto mt-12">
                @forelse($scans as $scan)
                    <div class="mb-6 overflow-hidden bg-white shadow-sm rounded-xl">
                        <div class="p-6">
                            <div class="grid items-center gap-6 md:grid-cols-3">
                                <!-- Result Image -->
                                <div class="overflow-hidden rounded-lg aspect-w-16 aspect-h-9 md:col-span-1">
                                    <img src="{{ asset('storage/public/' . $scan->result_image_path) }}" alt="Scan Result"
                                        class="object-cover w-full h-full">
                                </div>

                                <!-- Scan Details -->
                                <div class="md:col-span-2">
                                    <div class="flex items-center justify-between mb-4">
                                        <div>
                                            <h3 class="text-lg font-semibold text-gray-900">
                                                {{ $scan->disease ? $scan->disease->name : 'Sehat' }}
                                            </h3>
                                            <p class="text-sm text-gray-500">
                                                {{ $scan->created_at->format('d F Y, H:i') }}
                                            </p>
                                        </div>
                                        <span
                                            class="inline-flex items-center px-3 py-1 text-sm font-medium rounded-full
                                        {{ $scan->disease ? 'bg-yellow-100 text-yellow-800' : 'bg-green-100 text-green-800' }}">
                                            {{ number_format($scan->confidence, 1) }}% Akurasi
                                        </span>
                                    </div>

                                    <p class="mb-4 text-sm text-gray-600 line-clamp-2">
                                        {{ $scan->disease ? $scan->disease->description : 'Tanaman jagung Anda dalam kondisi sehat.' }}
                                    </p>

                                    <div class="flex items-center justify-between">
                                        <span class="inline-flex items-center text-sm text-gray-500">
                                            <svg class="w-5 h-5 mr-1.5" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                            </svg>
                                            {{ ucfirst($scan->scan_method) }}
                                        </span>

                                        <a href="{{ route('scan.result', $scan) }}"
                                            class="inline-flex items-center text-sm font-medium text-green-600 hover:text-green-700">
                                            Lihat Detail
                                            <svg class="w-5 h-5 ml-1" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 5l7 7-7 7" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="p-12 text-center bg-white rounded-xl">
                        <svg class="w-12 h-12 mx-auto text-gray-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                        </svg>
                        <h3 class="mt-2 text-sm font-medium text-gray-900">Belum Ada Riwayat Scan</h3>
                        <p class="mt-1 text-sm text-gray-500">Mulai scan tanaman jagung Anda untuk melihat riwayat.</p>
                        <div class="mt-6">
                            <a href="{{ route('scan') }}"
                                class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-green-600 rounded-lg hover:bg-green-700">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 4v16m8-8H4" />
                                </svg>
                                Mulai Scan
                            </a>
                        </div>
                    </div>
                @endforelse

                <!-- Pagination -->
                @if ($scans->hasPages())
                    <div class="mt-6">
                        {{ $scans->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>

    @push('styles')
        <style>
            .aspect-w-16 {
                position: relative;
                padding-bottom: 56.25%;
            }

            .aspect-w-16>* {
                position: absolute;
                height: 100%;
                width: 100%;
                top: 0;
                right: 0;
                bottom: 0;
                left: 0;
            }

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
