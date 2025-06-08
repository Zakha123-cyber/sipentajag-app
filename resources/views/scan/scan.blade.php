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
                    Scan Tanaman
                    <span class="text-transparent bg-gradient-to-r from-green-600 to-yellow-500 bg-clip-text">Jagung</span>
                </h1>
                <p class="max-w-2xl mx-auto text-lg text-gray-600">
                    Deteksi penyakit pada tanaman jagung Anda dengan mudah menggunakan kamera atau unggah gambar dari
                    perangkat.
                </p>
            </div>

            <!-- Scan Method Selection -->
            <div class="max-w-md mx-auto mb-8">
                <div class="grid grid-cols-2 gap-8">
                    <button id="camera-btn"
                        class="px-6 py-4 text-sm font-semibold text-white transition-all duration-200 shadow-lg group bg-gradient-to-r from-green-600 to-green-500 rounded-xl hover:from-green-700 hover:to-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50 method-btn active"
                        onclick="toggleMethod('camera')">
                        <svg class="w-6 h-6 mx-auto mb-2 transition-transform group-hover:scale-110" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                        </svg>
                        Gunakan Kamera
                    </button>
                    <button id="upload-btn"
                        class="px-6 py-4 text-sm font-semibold text-white transition-all duration-200 shadow-lg group bg-gradient-to-r from-yellow-500 to-yellow-400 rounded-xl hover:from-yellow-600 hover:to-yellow-500 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-opacity-50 method-btn"
                        onclick="toggleMethod('upload')">
                        <svg class="w-6 h-6 mx-auto mb-2 transition-transform group-hover:scale-110" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        Upload Gambar
                    </button>
                </div>
            </div>

            <!-- Scan Options Container -->
            <div class="max-w-2xl mx-auto"> <!-- Changed from max-w-3xl to max-w-2xl -->
                <!-- Camera Section -->
                <div id="camera-section" class="transition-all duration-300">
                    <div class="p-4 bg-white shadow-lg rounded-2xl"> <!-- Changed padding from p-6 to p-4 -->
                        <div class="relative mb-4 aspect-w-16 aspect-h-9"> <!-- Changed aspect ratio -->
                            <div id="camera-preview" class="flex items-center justify-center bg-gray-100 rounded-xl">
                                <video id="video" class="hidden object-cover w-full h-full rounded-xl"></video>
                                <canvas id="canvas" class="hidden object-cover w-full h-full rounded-xl"></canvas>
                                <div id="camera-placeholder" class="p-6 text-center"> <!-- Reduced padding -->
                                    <svg class="w-12 h-12 mx-auto mb-3 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    <p class="text-sm text-gray-500">Klik untuk mengaktifkan kamera</p>
                                </div>
                            </div>
                        </div>
                        <div class="flex space-x-3">
                            <button id="start-camera"
                                class="flex-1 py-3 font-semibold text-white transition-all duration-200 shadow-md bg-gradient-to-r from-green-600 to-green-500 rounded-xl hover:from-green-700 hover:to-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50">
                                Aktifkan Kamera
                            </button>
                            <button id="capture-photo"
                                class="flex-1 hidden py-3 font-semibold text-white transition-all duration-200 shadow-md bg-gradient-to-r from-blue-600 to-blue-500 rounded-xl hover:from-blue-700 hover:to-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                                Ambil Foto
                            </button>
                            <button id="retake-photo"
                                class="flex-1 hidden py-3 font-semibold text-white transition-all duration-200 shadow-md bg-gradient-to-r from-yellow-600 to-yellow-500 rounded-xl hover:from-yellow-700 hover:to-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-opacity-50">
                                Ambil Ulang
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Upload Section -->
                <div id="upload-section" class="hidden transition-all duration-300">
                    <div class="p-4 bg-white shadow-lg rounded-2xl"> <!-- Changed padding -->
                        <div class="mb-4 aspect-w-16 aspect-h-9"> <!-- Changed aspect ratio -->
                            <div id="upload-preview" class="flex items-center justify-center bg-gray-100 rounded-xl">
                                <div id="upload-placeholder" class="p-6 text-center"> <!-- Reduced padding -->
                                    <svg class="w-12 h-12 mx-auto mb-3 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                                    </svg>
                                    <p class="text-sm text-gray-500">Klik untuk memilih gambar</p>
                                </div>
                                <img id="uploaded-image" class="hidden object-cover w-full h-full rounded-xl">
                            </div>
                        </div>
                        <label class="w-full cursor-pointer">
                            <input type="file" accept="image/*" class="hidden" id="file-input">
                            <div
                                class="w-full py-3 font-semibold text-center text-white transition-all duration-200 shadow-md bg-gradient-to-r from-yellow-500 to-yellow-400 rounded-xl hover:from-yellow-600 hover:to-yellow-500 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-opacity-50">
                                Pilih File Gambar
                            </div>
                        </label>
                    </div>
                </div>

                <!-- Scan Button -->
                <div class="mt-8 text-center">
                    <button id="scan-button" disabled
                        class="px-8 py-4 font-semibold text-white transition-all duration-200 bg-gray-400 rounded-xl hover:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-opacity-50 disabled:opacity-50 disabled:cursor-not-allowed">
                        Mulai Scan
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const video = document.getElementById('video');
            const startCamera = document.getElementById('start-camera');
            const cameraPreview = document.getElementById('camera-preview');
            const cameraPlaceholder = document.getElementById('camera-placeholder');
            const fileInput = document.getElementById('file-input');
            const uploadedImage = document.getElementById('uploaded-image');
            const uploadPlaceholder = document.getElementById('upload-placeholder');
            const scanButton = document.getElementById('scan-button');
            const canvas = document.getElementById('canvas');
            const capturePhotoBtn = document.getElementById('capture-photo');
            const retakePhotoBtn = document.getElementById('retake-photo');
            let stream = null;
            let capturedImage = null;

            // Tambahkan ini:
            const cameraSectionEl = document.getElementById('camera-section');
            const uploadSectionEl = document.getElementById('upload-section');

            function toggleMethod(method) {
                const cameraBtnEl = document.getElementById('camera-btn');
                const uploadBtnEl = document.getElementById('upload-btn');

                // Reset scan button
                scanButton.disabled = true;
                scanButton.classList.remove('bg-green-500', 'hover:bg-green-600');
                scanButton.classList.add('bg-gray-400', 'hover:bg-gray-500');

                if (method === 'camera') {
                    // Update buttons
                    cameraBtnEl.classList.remove('bg-gray-400', 'hover:bg-gray-500');
                    cameraBtnEl.classList.add('bg-green-500', 'hover:bg-green-600');
                    uploadBtnEl.classList.remove('bg-green-500', 'hover:bg-green-600');
                    uploadBtnEl.classList.add('bg-gray-400', 'hover:bg-gray-500');

                    // Show/hide sections
                    cameraSectionEl.classList.remove('hidden');
                    uploadSectionEl.classList.add('hidden');

                    // Stop any existing stream
                    if (stream) {
                        stream.getTracks().forEach(track => track.stop());
                        video.srcObject = null;
                        video.classList.add('hidden');
                        cameraPlaceholder.classList.remove('hidden');
                    }
                } else {
                    // Update buttons
                    uploadBtnEl.classList.remove('bg-gray-400', 'hover:bg-gray-500');
                    uploadBtnEl.classList.add('bg-green-500', 'hover:bg-green-600');
                    cameraBtnEl.classList.remove('bg-green-500', 'hover:bg-green-600');
                    cameraBtnEl.classList.add('bg-gray-400', 'hover:bg-gray-500');

                    // Show/hide sections
                    cameraSectionEl.classList.add('hidden');
                    uploadSectionEl.classList.remove('hidden');

                    // Reset file input
                    fileInput.value = '';
                    uploadedImage.classList.add('hidden');
                    uploadPlaceholder.classList.remove('hidden');
                }
            }

            // Camera handling
            startCamera.addEventListener('click', async function() {
                try {
                    stream = await navigator.mediaDevices.getUserMedia({
                        video: true
                    });
                    video.srcObject = stream;
                    video.classList.remove('hidden');
                    cameraPlaceholder.classList.add('hidden');
                    canvas.classList.add('hidden');
                    video.play();

                    // Show capture button, hide start camera
                    startCamera.classList.add('hidden');
                    capturePhotoBtn.classList.remove('hidden');
                    retakePhotoBtn.classList.add('hidden');

                    // Disable scan button until photo is captured
                    scanButton.disabled = true;
                    scanButton.classList.remove('bg-green-500', 'hover:bg-green-600');
                    scanButton.classList.add('bg-gray-400', 'hover:bg-gray-500');
                } catch (err) {
                    console.error('Error accessing camera:', err);
                    alert(
                        'Error accessing camera. Please make sure you have granted camera permissions.'
                    );
                }
            });

            // Update scan button handling
            scanButton.addEventListener('click', function() {
                let scanMethod = '';

                if (!cameraSectionEl.classList.contains('hidden')) {
                    // Camera mode
                    scanMethod = 'camera';
                    if (capturedImage) {
                        // Use the captured image
                        sendToLaravel(null, scanMethod);
                    } else {
                        alert('Silakan ambil foto terlebih dahulu.');
                        return;
                    }
                } else if (!uploadSectionEl.classList.contains('hidden')) {
                    // Upload mode
                    if (fileInput.files.length > 0) {
                        scanMethod = 'upload';
                        sendToLaravel(fileInput.files[0], scanMethod);
                    } else {
                        alert('Silakan pilih file gambar terlebih dahulu.');
                        return;
                    }
                }
            });

            // Update sendToLaravel function
            function sendToLaravel(imageBlob, scanMethod) {
                const formData = new FormData();

                if (scanMethod === 'camera') {
                    // Convert captured image from base64 to blob
                    const base64Data = capturedImage.split(',')[1];
                    const binaryData = atob(base64Data);
                    const byteArray = new Uint8Array(binaryData.length);

                    for (let i = 0; i < binaryData.length; i++) {
                        byteArray[i] = binaryData.charCodeAt(i);
                    }

                    const imageBlob = new Blob([byteArray], {
                        type: 'image/jpeg'
                    });
                    formData.append('image', imageBlob, 'captured-image.jpg');
                } else {
                    formData.append('image', imageBlob);
                }

                formData.append('scan_method', scanMethod);
                sendRequest(formData);
            }

            // Update capture photo functionality
            capturePhotoBtn.addEventListener('click', function() {
                canvas.width = video.videoWidth;
                canvas.height = video.videoHeight;
                const ctx = canvas.getContext('2d');

                // Flip horizontally if using front camera
                ctx.translate(canvas.width, 0);
                ctx.scale(-1, 1);
                ctx.drawImage(video, 0, 0, canvas.width, canvas.height);

                // Reset transformation
                ctx.setTransform(1, 0, 0, 1, 0, 0);

                capturedImage = canvas.toDataURL('image/jpeg', 0.8);

                // Show canvas with captured image
                video.classList.add('hidden');
                canvas.classList.remove('hidden');

                // Update buttons
                capturePhotoBtn.classList.add('hidden');
                retakePhotoBtn.classList.remove('hidden');

                // Enable scan button
                scanButton.disabled = false;
                scanButton.classList.remove('bg-gray-400', 'hover:bg-gray-500');
                scanButton.classList.add('bg-green-500', 'hover:bg-green-600');
            });

            // Add retake photo functionality
            retakePhotoBtn.addEventListener('click', function() {
                // Show video stream again
                video.classList.remove('hidden');
                canvas.classList.add('hidden');

                // Reset capture image
                capturedImage = null;

                // Update buttons
                capturePhotoBtn.classList.remove('hidden');
                retakePhotoBtn.classList.add('hidden');

                // Disable scan button
                scanButton.disabled = true;
                scanButton.classList.remove('bg-green-500', 'hover:bg-green-600');
                scanButton.classList.add('bg-gray-400', 'hover:bg-gray-500');
            });

            // File upload handling
            fileInput.addEventListener('change', function(e) {
                if (e.target.files && e.target.files[0]) {
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        uploadedImage.src = e.target.result;
                        uploadedImage.classList.remove('hidden');
                        uploadPlaceholder.classList.add('hidden');
                        scanButton.disabled = false;
                        scanButton.classList.remove('bg-gray-400');
                        scanButton.classList.add('bg-green-500', 'hover:bg-green-600');
                    }

                    reader.readAsDataURL(e.target.files[0]);
                }
            });

            // Cleanup on page unload
            window.addEventListener('beforeunload', function() {
                if (stream) {
                    stream.getTracks().forEach(track => track.stop());
                }
            });

            function sendRequest(formData) {
                scanButton.innerText = 'Memproses...';
                scanButton.disabled = true;

                fetch("{{ route('scan.process') }}", {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: formData
                    })
                    .then(async response => {
                        if (!response.ok) {
                            const err = await response.json();
                            throw new Error(err.error || 'Terjadi kesalahan pada server');
                        }
                        return response.json();
                    })
                    .then(data => {
                        if (data.success && data.redirect_url) {
                            window.location.href = data.redirect_url;
                        } else {
                            throw new Error('Format response tidak valid');
                        }
                    })
                    .catch(err => {
                        alert('Gagal melakukan prediksi: ' + err.message);
                        scanButton.innerText = 'Mulai Scan';
                        scanButton.disabled = false;
                    });
            }

            // Make toggleMethod available globally
            window.toggleMethod = toggleMethod;
        });
    </script>
@endpush

@push('styles')
    <style>
        .aspect-w-16 {
            position: relative;
            padding-bottom: 56.25%;
            /* 16:9 aspect ratio */
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

        /* Inherit animations from index page */
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

        .method-btn.active {
            transform: scale(1.05);
        }

        .method-btn {
            transition: all 0.3s ease;
        }

        /* Add gradient animation */
        @keyframes gradient {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        .bg-gradient-animated {
            background-size: 200% 200%;
            animation: gradient 5s ease infinite;
        }
    </style>
@endpush
