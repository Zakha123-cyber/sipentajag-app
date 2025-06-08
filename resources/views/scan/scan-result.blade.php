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
            <!-- Back Button -->
            <div class="max-w-4xl mx-auto mb-8">
                <a href="{{ route('scan') }}"
                    class="inline-flex items-center text-sm font-medium text-gray-600 transition-colors hover:text-green-600">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    Kembali ke Scan
                </a>
            </div>

            <!-- Result Container -->
            <div class="max-w-4xl mx-auto">
                <div class="overflow-hidden bg-white shadow-lg rounded-2xl">
                    <!-- Header -->
                    <div class="px-6 py-8 text-center border-b border-gray-100">
                        <h1 class="text-3xl font-bold text-gray-900">
                            Hasil Scan
                            <span
                                class="text-transparent bg-gradient-to-r from-green-600 to-yellow-500 bg-clip-text">Tanaman
                                Jagung</span>
                        </h1>
                        <p class="mt-2 text-gray-600">Scan dilakukan pada {{ $scan->created_at->format('d F Y, H:i') }}</p>
                    </div>

                    <!-- Image Result Section -->
                    <div class="p-6">
                        <div class="max-w-2xl mx-auto">
                            <h3 class="mb-3 text-sm font-semibold text-center text-gray-500">Hasil Analisis AI</h3>
                            <div class="overflow-hidden rounded-xl aspect-w-16 aspect-h-9">
                                <img src="{{ asset('storage/public/' . $scan->result_image_path) }}" alt="AI Result"
                                    class="object-cover w-full h-full">
                            </div>
                        </div>
                    </div>

                    <!-- Prediction Results -->
                    <div class="p-6 bg-gray-50">
                        <div class="max-w-2xl mx-auto">
                            <div class="grid gap-6 md:grid-cols-2">
                                <div class="p-4 bg-white rounded-xl">
                                    <h3 class="text-lg font-semibold text-gray-900">Diagnosis</h3>
                                    <div class="mt-2">
                                        <span
                                            class="inline-flex items-center px-3 py-1 text-sm font-medium rounded-full
                                        {{ $scan->disease ? 'bg-yellow-100 text-yellow-800' : 'bg-green-100 text-green-800' }}">
                                            {{ $scan->disease ? $scan->disease->name : 'Sehat' }}
                                        </span>
                                    </div>
                                    <p class="mt-3 text-sm text-gray-600">
                                        {{ $scan->disease ? $scan->disease->description : 'Tanaman jagung Anda dalam kondisi sehat.' }}
                                    </p>
                                </div>
                                <div class="p-4 bg-white rounded-xl">
                                    <h3 class="text-lg font-semibold text-gray-900">Tingkat Kepercayaan</h3>
                                    <div class="flex items-end mt-2 space-x-2">
                                        <span
                                            class="text-3xl font-bold text-green-600">{{ number_format($scan->confidence, 1) }}%</span>
                                        <span class="mb-1 text-sm text-gray-500">akurasi</span>
                                    </div>
                                    <div class="w-full h-2 mt-3 overflow-hidden bg-gray-200 rounded-full">
                                        <div class="h-full bg-green-500 rounded-full"
                                            style="width: {{ $scan->confidence }}%"></div>
                                    </div>
                                </div>
                            </div>

                            @if ($scan->disease)
                                <!-- Treatment Recommendations -->
                                <div class="p-4 mt-6 bg-white rounded-xl">
                                    <h3 class="text-lg font-semibold text-gray-900">Rekomendasi Penanganan</h3>
                                    <div class="mt-4 space-y-4">
                                        <div class="flex items-start">
                                            <div class="flex-shrink-0">
                                                <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                            </div>
                                            <p class="ml-3 text-sm text-gray-600">{{ $scan->disease->treatment }}</p>
                                        </div>

                                        @if ($scan->disease->fertilizers->count() > 0)
                                            <div class="pt-4 mt-4 border-t border-gray-100">
                                                <h4 class="mb-4 font-medium text-gray-900">Pupuk yang Disarankan:</h4>
                                                <div class="grid grid-cols-2 gap-4 sm:grid-cols-3">
                                                    @foreach ($scan->disease->fertilizers as $fertilizer)
                                                        <div class="block group">
                                                            <a href="{{ $fertilizer->purchase_link }}" target="_blank"
                                                                class="block transition-transform duration-200 hover:scale-105">
                                                                <div
                                                                    class="overflow-hidden bg-gray-100 rounded-lg aspect-w-1 aspect-h-1">
                                                                    @if ($fertilizer->image_url)
                                                                        <img src="{{ asset('storage/' . $fertilizer->image_url) }}"
                                                                            alt="{{ $fertilizer->name }}"
                                                                            class="object-cover w-full h-full transition-transform duration-200 group-hover:scale-110">
                                                                    @else
                                                                        <div
                                                                            class="flex items-center justify-center w-full h-full">
                                                                            <svg class="w-12 h-12 text-gray-400"
                                                                                fill="none" stroke="currentColor"
                                                                                viewBox="0 0 24 24">
                                                                                <path stroke-linecap="round"
                                                                                    stroke-linejoin="round" stroke-width="2"
                                                                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                                            </svg>
                                                                        </div>
                                                                    @endif
                                                                    <div
                                                                        class="absolute inset-0 transition-opacity duration-200 bg-black opacity-0 group-hover:opacity-10">
                                                                    </div>
                                                                </div>
                                                                <p
                                                                    class="mt-2 text-sm font-medium text-center text-gray-900">
                                                                    {{ $fertilizer->name }}</p>
                                                                <p class="text-xs text-center text-gray-500">Klik untuk
                                                                    detail
                                                                </p>
                                                            </a>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Share Button -->
                <div class="mt-6 text-center">
                    <button onclick="shareScanResult()"
                        class="inline-flex items-center px-4 py-2 text-sm font-medium text-white transition-colors bg-green-600 rounded-lg hover:bg-green-700">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z" />
                        </svg>
                        Bagikan Hasil
                    </button>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            function shareScanResult() {
                const shareData = {
                    title: 'Hasil Scan Tanaman Jagung',
                    text: `Diagnosis: {{ $scan->disease ? $scan->disease->name : 'Sehat' }}\nTingkat Kepercayaan: {{ number_format($scan->confidence, 1) }}%`,
                    url: window.location.href
                };

                if (navigator.share) {
                    navigator.share(shareData)
                        .catch((error) => console.log('Error sharing:', error));
                } else {
                    // Fallback for browsers that don't support native sharing
                    const url = encodeURIComponent(window.location.href);
                    const text = encodeURIComponent(shareData.text);
                    window.open(`https://wa.me/?text=${text}%0A${url}`);
                }
            }
        </script>
    @endpush

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

            .aspect-w-1 {
                position: relative;
                padding-bottom: 100%;
            }

            .aspect-w-1>* {
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
