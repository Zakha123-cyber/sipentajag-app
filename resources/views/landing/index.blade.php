@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <section
        class="relative flex items-center min-h-screen overflow-hidden bg-gradient-to-br from-green-50 via-white to-yellow-50">
        <!-- Background Elements -->
        <div class="absolute inset-0">
            <div
                class="absolute bg-green-200 rounded-full top-20 left-10 w-72 h-72 mix-blend-multiply filter blur-xl opacity-70 animate-float">
            </div>
            <div
                class="absolute bg-yellow-200 rounded-full top-40 right-10 w-72 h-72 mix-blend-multiply filter blur-xl opacity-70 animate-float animation-delay-1000">
            </div>
            <div
                class="absolute bg-green-300 rounded-full bottom-20 left-1/2 w-72 h-72 mix-blend-multiply filter blur-xl opacity-70 animate-float animation-delay-2000">
            </div>
        </div>

        <div class="relative z-10 px-4 pt-20 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="grid items-center grid-cols-1 gap-12 lg:grid-cols-2">
                <!-- Text Content -->
                <div class="text-center lg:text-left animate-slide-in-left">
                    <h1 class="mb-6 text-5xl font-bold leading-tight text-gray-900 lg:text-6xl">
                        <span class="block">Selamat Datang di</span>
                        <span class="block text-transparent bg-gradient-to-r from-green-600 to-yellow-500 bg-clip-text">
                            SIPETANJAG
                        </span>
                    </h1>
                    <p class="mb-8 text-xl leading-relaxed text-gray-600">
                        Sistem cerdas untuk memantau kesehatan tanaman jagung dengan teknologi AI.
                        Deteksi dini penyakit dan optimalkan hasil panen Anda.
                    </p>
                    <div class="flex flex-col justify-center gap-4 sm:flex-row lg:justify-start">
                        @auth
                            <a href="{{ route('scan') }}"
                                class="px-8 py-4 font-semibold text-center text-white transition-all duration-200 transform bg-green-500 rounded-xl hover:bg-green-600 hover:scale-105 animate-pulse-glow">
                                Scan Jagungmu!
                            </a>
                        @else
                            <a href="{{ route('login') }}"
                                class="px-8 py-4 font-semibold text-center text-white transition-all duration-200 transform bg-green-500 rounded-xl hover:bg-green-600 hover:scale-105 animate-pulse-glow">
                                Mulai Sekarang
                            </a>
                            <a href="#features"
                                class="px-8 py-4 font-semibold text-center text-gray-700 transition-all duration-200 transform bg-white border-2 border-green-500 rounded-xl hover:bg-green-50 hover:scale-105">
                                Pelajari Lebih Lanjut
                            </a>
                        @endauth
                    </div>
                </div>

                <!-- Image/Visual -->
                <div class="relative animate-slide-in-right">
                    <div class="relative">
                        <div
                            class="w-full shadow-2xl h-96 bg-gradient-to-br from-green-400 to-yellow-400 rounded-2xl animate-float">
                            <div class="absolute flex items-center justify-center bg-white inset-4 rounded-xl">
                                <img src="{{ asset('storage/images/jagung.jpg') }}" alt="Tanaman Jagung"
                                    class="object-cover w-full h-full rounded-xl">
                            </div>
                        </div>
                        <!-- Floating elements -->
                        <div class="absolute w-8 h-8 bg-yellow-400 rounded-full -top-4 -left-4 animate-bounce-gentle"></div>
                        <div
                            class="absolute w-6 h-6 bg-green-400 rounded-full -bottom-4 -right-4 animate-bounce-gentle animation-delay-500">
                        </div>
                        <div
                            class="absolute w-4 h-4 bg-yellow-300 rounded-full top-1/2 -right-8 animate-bounce-gentle animation-delay-1000">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-20 bg-white">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="mb-16 text-center animate-on-scroll">
                <h2 class="mb-4 text-4xl font-bold text-gray-900">
                    Fitur <span class="text-green-500">Unggulan</span>
                </h2>
                <p class="max-w-2xl mx-auto text-xl text-gray-600">
                    Tingkatkan produktivitas pertanian jagung dengan teknologi modern
                </p>
            </div>

            <div class="grid grid-cols-1 gap-8 md:grid-cols-3">
                <!-- Feature 1 -->
                <div class="p-8 bg-white border border-gray-100 shadow-lg animate-on-scroll card-hover rounded-2xl">
                    <div
                        class="flex items-center justify-center w-16 h-16 mb-6 bg-gradient-to-r from-green-500 to-green-600 rounded-2xl">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                        </svg>
                    </div>
                    <h3 class="mb-4 text-2xl font-bold text-gray-900">Scan Penyakit</h3>
                    <p class="leading-relaxed text-gray-600">
                        Deteksi penyakit tanaman jagung secara real-time menggunakan teknologi AI dengan akurasi tinggi.
                    </p>
                </div>

                <!-- Feature 2 -->
                <div
                    class="p-8 bg-white border border-gray-100 shadow-lg animate-on-scroll card-hover rounded-2xl animation-delay-200">
                    <div
                        class="flex items-center justify-center w-16 h-16 mb-6 bg-gradient-to-r from-yellow-500 to-yellow-600 rounded-2xl">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                    </div>
                    <h3 class="mb-4 text-2xl font-bold text-gray-900">Riwayat Pemantauan</h3>
                    <p class="leading-relaxed text-gray-600">
                        Kelola dan pantau riwayat kesehatan tanaman dengan sistem yang terorganisir dan mudah diakses.
                    </p>
                </div>

                <!-- Feature 3 -->
                <div
                    class="p-8 bg-white border border-gray-100 shadow-lg animate-on-scroll card-hover rounded-2xl animation-delay-400">
                    <div
                        class="flex items-center justify-center w-16 h-16 mb-6 bg-gradient-to-r from-green-500 to-yellow-500 rounded-2xl">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                    <h3 class="mb-4 text-2xl font-bold text-gray-900">Artikel Edukatif</h3>
                    <p class="leading-relaxed text-gray-600">
                        Akses artikel dan panduan terbaru dari para ahli untuk perawatan optimal tanaman jagung.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section id="stats" class="py-20 bg-gradient-animated">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 gap-8 md:grid-cols-4">
                <div class="text-center animate-on-scroll">
                    <div class="mb-2 text-white number-counter" data-target="{{ $activeUsers }}">0</div>
                    <div class="font-medium text-white/80">Pengguna Aktif</div>
                </div>
                <div class="text-center animate-on-scroll animation-delay-100">
                    <div class="mb-2 text-white number-counter" data-target="{{ $averageAccuracy }}">0</div>
                    <div class="font-medium text-white/80">Akurasi Deteksi %</div>
                </div>
                <div class="text-center animate-on-scroll animation-delay-200">
                    <div class="mb-2 text-white number-counter" data-target="24">0</div>
                    <div class="font-medium text-white/80">Jam Dukungan</div>
                </div>
                <div class="text-center animate-on-scroll animation-delay-300">
                    <div class="mb-2 text-white number-counter" data-target="{{ $detectedDiseases }}">0</div>
                    <div class="font-medium text-white/80">Penyakit Terdeteksi</div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 bg-green-950">
        <div class="max-w-4xl px-4 mx-auto text-center sm:px-6 lg:px-8">
            <div class="animate-on-scroll">
                <h2 class="mb-6 text-4xl font-bold text-white">
                    Siap Meningkatkan <span class="text-green-400">Hasil Panen</span> Anda?
                </h2>
                <p class="mb-8 text-xl leading-relaxed text-gray-300">
                    Bergabunglah dengan ribuan petani yang telah menggunakan SIPETANJAG untuk meningkatkan produktivitas
                    pertanian mereka.
                </p>
                <a href="{{ route('register') }}"
                    class="inline-block px-8 py-4 font-semibold text-white transition-all duration-200 transform shadow-lg bg-gradient-to-r from-green-500 to-yellow-500 rounded-xl hover:from-green-600 hover:to-yellow-600 hover:scale-105">
                    Mulai Gratis Sekarang
                </a>
            </div>
        </div>
    </section>
@endsection

@push('styles')
    <style>
        /* Animation Keyframes */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-50px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(50px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
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

        @keyframes pulseGlow {

            0%,
            100% {
                box-shadow: 0 0 20px rgba(34, 197, 94, 0.3);
            }

            50% {
                box-shadow: 0 0 40px rgba(34, 197, 94, 0.6);
            }
        }

        @keyframes bounceGentle {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-5px);
            }
        }

        @keyframes gradientShift {

            0%,
            100% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }
        }

        /* Animation Classes */
        .animate-slide-in-left {
            animation: slideInLeft 0.8s ease-out;
        }

        .animate-slide-in-right {
            animation: slideInRight 0.8s ease-out;
        }

        .animate-float {
            animation: float 3s ease-in-out infinite;
        }

        .animate-pulse-glow {
            animation: pulseGlow 2s ease-in-out infinite;
        }

        .animate-bounce-gentle {
            animation: bounceGentle 2s ease-in-out infinite;
        }

        /* Scroll Animation */
        .animate-on-scroll {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s ease-out;
        }

        .animate-on-scroll.animated {
            opacity: 1;
            transform: translateY(0);
        }

        /* Background Gradients */
        .bg-gradient-animated {
            background: linear-gradient(-45deg, #22c55e, #16a34a, #eab308, #ca8a04);
            background-size: 400% 400%;
            animation: gradientShift 8s ease infinite;
        }

        /* Card Effects */
        .card-hover {
            transition: all 0.3s ease;
        }

        .card-hover:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }

        /* Counter Styling */
        .number-counter {
            font-weight: 700;
            font-size: 2.5rem;
        }

        /* Animation Delays */
        .animation-delay-100 {
            animation-delay: 100ms;
        }

        .animation-delay-200 {
            animation-delay: 200ms;
        }

        .animation-delay-300 {
            animation-delay: 300ms;
        }

        .animation-delay-400 {
            animation-delay: 400ms;
        }

        .animation-delay-500 {
            animation-delay: 500ms;
        }

        .animation-delay-1000 {
            animation-delay: 1000ms;
        }

        .animation-delay-2000 {
            animation-delay: 2000ms;
        }
    </style>
@endpush

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Intersection Observer for scroll animations
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animated');
                        observer.unobserve(entry.target);
                    }
                });
            }, observerOptions);

            document.querySelectorAll('.animate-on-scroll').forEach(el => {
                observer.observe(el);
            });

            // Counter animation
            function animateCounter(element, target, duration = 2000) {
                let start = 0;
                const increment = target / (duration / 16);

                const timer = setInterval(() => {
                    start += increment;
                    if (start >= target) {
                        element.textContent = target;
                        clearInterval(timer);
                    } else {
                        element.textContent = Math.floor(start);
                    }
                }, 16);
            }

            // Start counter animation when stats section is visible
            const statsObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const counters = entry.target.querySelectorAll('.number-counter');
                        counters.forEach(counter => {
                            const target = parseInt(counter.getAttribute('data-target'));
                            animateCounter(counter, target);
                        });
                        statsObserver.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.5
            });

            const statsSection = document.getElementById('stats');
            if (statsSection) {
                statsObserver.observe(statsSection);
            }

            // Smooth scrolling for navigation links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });
        });
    </script>
@endpush
