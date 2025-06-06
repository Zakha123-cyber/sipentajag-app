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
            <div class="mb-12 text-center">
                <h1 class="mb-4 text-4xl font-bold text-gray-900">
                    Artikel
                    <span class="text-transparent bg-gradient-to-r from-green-600 to-yellow-500 bg-clip-text">Seputar
                        Jagung</span>
                </h1>
                <p class="max-w-2xl mx-auto text-lg text-gray-600">
                    Pelajari berbagai informasi menarik seputar tanaman jagung untuk meningkatkan hasil panen Anda.
                </p>
            </div>

            <!-- Articles Grid -->
            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                @forelse ($articles as $article)
                    <div class="group">
                        <div
                            class="overflow-hidden transition-all duration-300 bg-white shadow-lg rounded-2xl hover:shadow-xl">
                            <!-- Article Image -->
                            <div class="relative aspect-w-16 aspect-h-9">
                                @if ($article->image_url)
                                    <img src="{{ asset('storage/' . $article->image_url) }}" alt="{{ $article->title }}"
                                        class="object-cover w-full h-full transition-transform duration-300 group-hover:scale-110">
                                @else
                                    <div class="flex items-center justify-center w-full h-full bg-gray-200">
                                        <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                @endif
                                <!-- Gradient Overlay -->
                                <div
                                    class="absolute inset-0 transition-opacity duration-300 opacity-0 bg-gradient-to-t from-black/60 to-transparent group-hover:opacity-100">
                                </div>
                            </div>

                            <!-- Content -->
                            <div class="p-6">
                                <h3
                                    class="mb-2 text-xl font-bold tracking-tight text-gray-900 transition-colors group-hover:text-green-600">
                                    {{ $article->title }}
                                </h3>
                                <p class="mb-4 text-sm text-gray-600 line-clamp-3">
                                    {{ Str::limit(strip_tags($article->content), 150) }}
                                </p>
                                <div class="flex items-center justify-between">
                                    <!-- Author Info -->
                                    <div class="flex items-center space-x-2">
                                        <div
                                            class="flex items-center justify-center w-8 h-8 rounded-full bg-gradient-to-br from-green-500 to-green-600">
                                            <span class="text-xs font-semibold text-white">
                                                {{ substr($article->user->name, 0, 1) }}
                                            </span>
                                        </div>
                                        <span class="text-sm text-gray-600">{{ $article->user->name }}</span>
                                    </div>
                                    <!-- Date -->
                                    <span class="text-sm text-gray-500">
                                        {{ $article->created_at->format('d M Y') }}
                                    </span>
                                </div>
                            </div>

                            <!-- Read More Link -->
                            <div class="px-6 pb-8">
                                <a href="{{ route('articles.show', $article) }}"
                                    class="inline-flex items-center text-sm font-semibold text-green-600 transition-colors hover:text-green-700">
                                    Baca selengkapnya
                                    <svg class="w-4 h-4 ml-1 transition-transform group-hover:translate-x-1" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full">
                        <div class="flex flex-col items-center justify-center p-8 text-center bg-white rounded-2xl">
                            <svg class="w-16 h-16 mb-4 text-gray-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2 2 0 00-2-2h-2m-4 0h-4" />
                            </svg>
                            <h3 class="mb-2 text-xl font-semibold text-gray-900">Belum ada artikel</h3>
                            <p class="text-gray-600">Artikel akan segera ditambahkan.</p>
                        </div>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            @if ($articles->hasPages())
                <div class="mt-12">
                    {{ $articles->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection

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

        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
@endpush
