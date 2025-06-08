<x-admin-layout>
    <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center sm:justify-between">
            <h2 class="text-2xl font-bold text-gray-900">Edit Pupuk</h2>
        </div>

        @if (session('error'))
            <div class="p-4 mt-4 text-sm text-red-800 bg-red-100 rounded-lg">
                {{ session('error') }}
            </div>
        @endif

        <div class="mt-8 overflow-hidden bg-white shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <form action="{{ route('admin.fertilizers.update', $fertilizer) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    <!-- Name -->
                    <div class="mb-6">
                        <label for="name" class="block text-sm font-medium text-gray-700">Nama Pupuk</label>
                        <input type="text" name="name" id="name"
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm"
                            value="{{ old('name', $fertilizer->name) }}" required>
                        @error('name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Description -->
                    <div class="mb-6">
                        <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                        <textarea name="description" id="description" rows="3"
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm"
                            required>{{ old('description', $fertilizer->description) }}</textarea>
                        @error('description')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Usage Instruction -->
                    <div class="mb-6">
                        <label for="usage_instruction" class="block text-sm font-medium text-gray-700">Cara
                            Penggunaan</label>
                        <textarea name="usage_instruction" id="usage_instruction" rows="3"
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm"
                            required>{{ old('usage_instruction', $fertilizer->usage_instruction) }}</textarea>
                        @error('usage_instruction')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Purchase Link -->
                    <div class="mb-6">
                        <label for="purchase_link" class="block text-sm font-medium text-gray-700">Link
                            Pembelian</label>
                        <input type="url" name="purchase_link" id="purchase_link"
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm"
                            value="{{ old('purchase_link', $fertilizer->purchase_link) }}"
                            placeholder="https://example.com">
                        @error('purchase_link')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Image Upload -->
                    <div class="mb-6">
                        <label for="image_url" class="block text-sm font-medium text-gray-700">Upload Gambar</label>
                        <div class="grid grid-cols-2 gap-4">
                            <!-- Upload Area -->
                            <div
                                class="flex justify-center px-6 pt-5 pb-6 mt-1 border-2 border-gray-300 border-dashed rounded-md">
                                <div class="space-y-1 text-center">
                                    <svg class="w-12 h-12 mx-auto text-gray-400" stroke="currentColor" fill="none"
                                        viewBox="0 0 48 48">
                                        <path
                                            d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    <div class="flex text-sm text-gray-600">
                                        <label for="image_url"
                                            class="relative font-medium text-green-600 bg-white rounded-md cursor-pointer hover:text-green-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-green-500">
                                            <span>Upload a file</span>
                                            <input id="image_url" name="image_url" type="file" class="sr-only"
                                                accept="image/*">
                                        </label>
                                        <p class="pl-1">or drag and drop</p>
                                    </div>
                                    <p class="text-xs text-gray-500">PNG, JPG, GIF up to 2MB</p>
                                </div>
                            </div>

                            <!-- Preview Area -->
                            <div id="image-preview" class="{{ $fertilizer->image_url ? '' : 'hidden' }}">
                                <div class="relative h-full">
                                    <img src="{{ $fertilizer->image_url ? asset('storage/' . $fertilizer->image_url) : '' }}"
                                        alt="Preview" class="object-contain w-full h-full rounded-lg">
                                    <button type="button" id="removeImage"
                                        class="absolute p-1 text-gray-500 bg-white rounded-full shadow-sm top-2 right-2 hover:text-red-500">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                        @error('image_url')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Submit Buttons -->
                    <div class="flex justify-end mt-6 space-x-3">
                        <a href="{{ route('admin.fertilizers.index') }}"
                            class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                            Batal
                        </a>
                        <button type="submit"
                            class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-green-600 border border-transparent rounded-md shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            const imageInput = document.querySelector('#image_url');
            const imagePreview = document.querySelector('#image-preview');
            const previewImage = imagePreview.querySelector('img');
            const removeButton = document.querySelector('#removeImage');

            const removeImage = () => {
                imageInput.value = '';
                if (!@json($fertilizer->image_url)) {
                    imagePreview.classList.add('hidden');
                }
                previewImage.src = @json($fertilizer->image_url ? asset('storage/' . $fertilizer->image_url) : '');
            };

            removeButton.addEventListener('click', removeImage);

            imageInput.addEventListener('change', function(e) {
                const file = e.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        previewImage.src = e.target.result;
                        imagePreview.classList.remove('hidden');
                    }
                    reader.readAsDataURL(file);
                } else {
                    removeImage();
                }
            });

            // Add drag and drop functionality
            const dropZone = imageInput.closest('div');

            ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
                dropZone.addEventListener(eventName, preventDefaults, false);
            });

            function preventDefaults(e) {
                e.preventDefault();
                e.stopPropagation();
            }

            ['dragenter', 'dragover'].forEach(eventName => {
                dropZone.addEventListener(eventName, highlight, false);
            });

            ['dragleave', 'drop'].forEach(eventName => {
                dropZone.addEventListener(eventName, unhighlight, false);
            });

            function highlight(e) {
                dropZone.classList.add('border-green-500', 'bg-green-50');
            }

            function unhighlight(e) {
                dropZone.classList.remove('border-green-500', 'bg-green-50');
            }

            dropZone.addEventListener('drop', handleDrop, false);

            function handleDrop(e) {
                const dt = e.dataTransfer;
                const file = dt.files[0];

                if (file && file.type.startsWith('image/')) {
                    imageInput.files = dt.files;
                    const event = new Event('change');
                    imageInput.dispatchEvent(event);
                }
            }
        </script>
    @endpush
</x-admin-layout>
