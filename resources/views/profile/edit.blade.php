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
            <div class="max-w-2xl mx-auto mb-8">
                <a href="{{ route('profile.index') }}"
                    class="inline-flex items-center text-sm font-medium text-gray-600 transition-colors hover:text-green-600">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    Kembali ke Profile
                </a>
            </div>

            <div class="max-w-2xl mx-auto">
                <!-- Update Profile Information -->
                <div class="overflow-hidden bg-white shadow-lg rounded-2xl">
                    <div class="px-6 py-8 text-center border-b border-gray-100">
                        <h2 class="text-2xl font-bold text-gray-900">Edit Profile</h2>
                        <p class="mt-2 text-gray-600">Update informasi profil dan email akun Anda</p>
                    </div>

                    <form method="post" action="{{ route('profile.update') }}" class="p-6 space-y-6">
                        @csrf
                        @method('patch')

                        <!-- Name -->
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                            <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}"
                                class="block w-full px-3 py-2 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm"
                                required autofocus>
                            @error('name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}"
                                class="block w-full px-3 py-2 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm"
                                required>
                            @error('email')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center gap-4">
                            <button type="submit"
                                class="px-4 py-2 text-sm font-medium text-white transition-colors bg-green-600 rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                                Simpan Perubahan
                            </button>

                            @if (session('status') === 'profile-updated')
                                <p class="text-sm text-gray-600">Tersimpan.</p>
                            @endif
                        </div>
                    </form>
                </div>

                <!-- Update Password -->
                <div class="mt-6 overflow-hidden bg-white shadow-lg rounded-2xl">
                    <div class="px-6 py-8 text-center border-b border-gray-100">
                        <h2 class="text-2xl font-bold text-gray-900">Update Password</h2>
                        <p class="mt-2 text-gray-600">Pastikan akun Anda menggunakan password yang aman</p>
                    </div>

                    <form method="post" action="{{ route('password.update') }}" class="p-6 space-y-6">
                        @csrf
                        @method('put')

                        <!-- Current Password -->
                        <div>
                            <label for="current_password" class="block text-sm font-medium text-gray-700">Password Saat
                                Ini</label>
                            <input type="password" name="current_password" id="current_password"
                                class="block w-full px-3 py-2 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm"
                                required>
                            @error('current_password')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- New Password -->
                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700">Password Baru</label>
                            <input type="password" name="password" id="password"
                                class="block w-full px-3 py-2 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm"
                                required>
                            @error('password')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Confirm Password -->
                        <div>
                            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi
                                Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                class="block w-full px-3 py-2 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm"
                                required>
                            @error('password_confirmation')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center gap-4">
                            <button type="submit"
                                class="px-4 py-2 text-sm font-medium text-white transition-colors bg-green-600 rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                                Update Password
                            </button>

                            @if (session('status') === 'password-updated')
                                <p class="text-sm text-gray-600">Tersimpan.</p>
                            @endif
                        </div>
                    </form>
                </div>

                <!-- Delete Account -->
                <div class="mt-6 overflow-hidden bg-white shadow-lg rounded-2xl">
                    <div class="px-6 py-8 text-center border-b border-gray-100">
                        <h2 class="text-2xl font-bold text-red-600">Hapus Akun</h2>
                        <p class="mt-2 text-gray-600">Setelah akun Anda dihapus, semua data akan terhapus secara permanen
                        </p>
                    </div>

                    <div class="p-6">
                        <button type="button"
                            class="px-4 py-2 text-sm font-medium text-white transition-colors bg-red-600 rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2"
                            onclick="document.getElementById('confirm-user-deletion').style.display = 'block'">
                            Hapus Akun
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Account Confirmation Modal -->
    <div id="confirm-user-deletion" class="fixed inset-0 z-50 hidden" aria-labelledby="modal-title" role="dialog"
        aria-modal="true">
        <div class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75"></div>

        <div class="fixed inset-0 z-10 overflow-y-auto">
            <div class="flex items-end justify-center min-h-full p-4 text-center sm:items-center sm:p-0">
                <div
                    class="relative px-4 pt-5 pb-4 overflow-hidden transition-all transform bg-white rounded-lg shadow-xl sm:max-w-lg sm:w-full sm:p-6">
                    <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
                        @csrf
                        @method('delete')

                        <h2 class="text-lg font-medium text-gray-900">
                            Apakah Anda yakin ingin menghapus akun?
                        </h2>

                        <p class="mt-1 text-sm text-gray-600">
                            Masukkan password Anda untuk konfirmasi penghapusan akun.
                        </p>

                        <div class="mt-6">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="password"
                                class="block w-full px-3 py-2 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500 sm:text-sm"
                                placeholder="Password" required>
                            @error('password', 'userDeletion')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex justify-end gap-4 mt-6">
                            <button type="button"
                                class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500"
                                onclick="document.getElementById('confirm-user-deletion').style.display = 'none'">
                                Batal
                            </button>
                            <button type="submit"
                                class="px-4 py-2 text-sm font-medium text-white bg-red-600 rounded-md shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                Hapus Akun
                            </button>
                        </div>
                    </form>
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
