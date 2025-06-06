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
            <div class="mb-8">
                <a href="{{ route('articles') }}"
                    class="inline-flex items-center text-sm font-medium text-gray-600 transition-colors hover:text-green-600">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    Kembali ke Artikel
                </a>
            </div>

            <!-- Article Content -->
            <div class="max-w-4xl mx-auto">
                <!-- Article Header -->
                <div class="mb-8">
                    <h1 class="mb-4 text-4xl font-bold text-gray-900">
                        {{ $article->title }}
                    </h1>

                    <!-- Article Meta -->
                    <div class="flex items-center space-x-6 text-gray-500">
                        <div class="flex items-center space-x-2">
                            <div
                                class="flex items-center justify-center w-8 h-8 rounded-full bg-gradient-to-br from-green-500 to-green-600">
                                <span class="text-xs font-semibold text-white">
                                    {{ substr($article->user->name, 0, 1) }}
                                </span>
                            </div>
                            <span class="text-sm">{{ $article->user->name }}</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <span class="text-sm">{{ $article->created_at->format('d M Y') }}</span>
                        </div>
                    </div>
                </div>

                <!-- Featured Image -->
                @if ($article->image_url)
                    <div class="relative mb-8 overflow-hidden rounded-2xl aspect-w-16 aspect-h-9 bg-gray-50">
                        <img src="{{ asset('storage/' . $article->image_url) }}" alt="{{ $article->title }}"
                            class="object-cover w-full h-full">
                    </div>
                @endif

                <!-- Article Body -->
                <div class="prose prose-lg max-w-none prose-green">
                    {!! $article->content !!}
                </div>

                <!-- Share Section -->
                <div class="flex items-center justify-between pt-8 mt-12 border-t border-gray-200">
                    <div class="text-sm text-gray-500">
                        Share this article:
                    </div>
                    <div class="flex space-x-4">
                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&text={{ urlencode($article->title) }}"
                            target="_blank" class="text-gray-400 transition-colors hover:text-blue-400">
                            <span class="sr-only">Share on Twitter</span>
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
                            </svg>
                        </a>
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}"
                            target="_blank" class="text-gray-400 transition-colors hover:text-blue-600">
                            <span class="sr-only">Share on Facebook</span>
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
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

        /* Article Content Styling */
        .prose img {
            border-radius: 0.75rem;
        }

        .prose a {
            color: #059669;
            text-decoration: none;
        }

        .prose a:hover {
            color: #047857;
            text-decoration: underline;
        }
    </style>
@endpush
