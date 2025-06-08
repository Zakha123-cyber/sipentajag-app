<x-admin-layout>
    <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center sm:justify-between">
            <h2 class="text-2xl font-bold text-gray-900">Edit Artikel</h2>
        </div>

        <div class="mt-8 overflow-hidden bg-white shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <form action="{{ route('admin.articles.update', $article) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    <!-- Title -->
                    <div class="mb-6">
                        <label for="title" class="block text-sm font-medium text-gray-700">Judul Artikel</label>
                        <input type="text" name="title" id="title"
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm"
                            value="{{ old('title', $article->title) }}" required>
                        @error('title')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Content -->
                    <div class="mb-6">
                        <label for="content" class="block text-sm font-medium text-gray-700">Konten Artikel</label>
                        <textarea name="content" id="content" rows="10"
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm"
                            required>{{ old('content', $article->content) }}</textarea>
                        @error('content')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Image Upload -->
                    <div class="mb-6">
                        <label for="image" class="block text-sm font-medium text-gray-700">Gambar Artikel</label>
                        <div class="grid grid-cols-2 gap-4">
                            <!-- Current Image Preview -->
                            <div class="p-4 rounded-lg bg-gray-50">
                                <p class="mb-2 text-sm font-medium text-gray-500">Current Image</p>
                                @if ($article->image_url)
                                    <img src="{{ asset('storage/' . $article->image_url) }}" alt="Current Image"
                                        class="object-cover w-full h-48 rounded-lg">
                                @else
                                    <div class="flex items-center justify-center w-full h-48 bg-gray-100 rounded-lg">
                                        <p class="text-sm text-gray-500">No image available</p>
                                    </div>
                                @endif
                            </div>

                            <!-- New Image Upload -->
                            <div>
                                <div
                                    class="flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                    <div class="space-y-1 text-center">
                                        <svg class="w-12 h-12 mx-auto text-gray-400" stroke="currentColor"
                                            fill="none" viewBox="0 0 48 48">
                                            <path
                                                d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        <div class="flex text-sm text-gray-600">
                                            <label for="image"
                                                class="relative font-medium text-green-600 bg-white rounded-md cursor-pointer hover:text-green-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-green-500">
                                                <span>Upload new image</span>
                                                <input id="image" name="image" type="file" class="sr-only"
                                                    accept="image/*">
                                            </label>
                                        </div>
                                        <p class="text-xs text-gray-500">PNG, JPG, GIF up to 2MB</p>
                                    </div>
                                </div>
                                <div id="imagePreviewContainer" class="hidden mt-4">
                                    <div class="relative">
                                        <img id="imagePreview" class="object-cover w-full h-48 rounded-lg"
                                            src="" alt="Preview">
                                        <button type="button" id="removeImage"
                                            class="absolute p-1 text-gray-500 bg-white rounded-full shadow-sm top-2 right-2 hover:text-red-500">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @error('image')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Submit Buttons -->
                    <div class="flex justify-end mt-6 space-x-3">
                        <a href="{{ route('admin.articles.index') }}"
                            class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                            Cancel
                        </a>
                        <button type="submit"
                            class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-green-600 border border-transparent rounded-md shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                            Update Artikel
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            const imageInput = document.querySelector('#image');
            const previewContainer = document.querySelector('#imagePreviewContainer');
            const preview = document.querySelector('#imagePreview');
            const removeButton = document.querySelector('#removeImage');

            const removeImage = () => {
                imageInput.value = '';
                previewContainer.classList.add('hidden');
                preview.src = '';
            };

            removeButton.addEventListener('click', removeImage);

            imageInput.addEventListener('change', function(e) {
                const file = e.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        preview.src = e.target.result;
                        previewContainer.classList.remove('hidden');
                    }
                    reader.readAsDataURL(file);
                } else {
                    removeImage();
                }
            });
        </script>
    @endpush
</x-admin-layout>
