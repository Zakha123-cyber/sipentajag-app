<x-admin-layout>
    <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center sm:justify-between">
            <h2 class="text-2xl font-bold text-gray-900">Edit Penyakit</h2>
        </div>

        @if (session('error'))
            <div class="p-4 mt-4 text-sm text-red-800 bg-red-100 rounded-lg">
                {{ session('error') }}
            </div>
        @endif

        <div class="mt-8 overflow-hidden bg-white shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <form action="{{ route('admin.diseases.update', $disease) }}" method="POST">
                    @csrf
                    @method('PATCH')

                    <!-- Name -->
                    <div class="mb-6">
                        <label for="name" class="block text-sm font-medium text-gray-700">Nama Penyakit</label>
                        <input type="text" name="name" id="name"
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm"
                            value="{{ old('name', $disease->name) }}" required>
                        @error('name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Description -->
                    <div class="mb-6">
                        <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                        <textarea name="description" id="description" rows="3"
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm"
                            required>{{ old('description', $disease->description) }}</textarea>
                        @error('description')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Symptoms -->
                    <div class="mb-6">
                        <label for="symptoms" class="block text-sm font-medium text-gray-700">Gejala</label>
                        <textarea name="symptoms" id="symptoms" rows="3"
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm"
                            required>{{ old('symptoms', $disease->symptoms) }}</textarea>
                        @error('symptoms')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Treatment -->
                    <div class="mb-6">
                        <label for="treatment" class="block text-sm font-medium text-gray-700">Penanganan</label>
                        <textarea name="treatment" id="treatment" rows="3"
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm"
                            required>{{ old('treatment', $disease->treatment) }}</textarea>
                        @error('treatment')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Fertilizers -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700">Pupuk yang Direkomendasikan</label>
                        <div class="mt-2 space-y-2">
                            @foreach ($fertilizers as $fertilizer)
                                <div class="flex items-start">
                                    <div class="flex items-center h-5">
                                        <input type="checkbox" name="fertilizer_ids[]" value="{{ $fertilizer->id }}"
                                            {{ in_array($fertilizer->id, old('fertilizer_ids', $selectedFertilizers)) ? 'checked' : '' }}
                                            class="w-4 h-4 text-green-600 border-gray-300 rounded focus:ring-green-500">
                                    </div>
                                    <div class="ml-3 text-sm">
                                        <label for="fertilizer_{{ $fertilizer->id }}"
                                            class="font-medium text-gray-700">
                                            {{ $fertilizer->name }}
                                        </label>
                                        <p class="text-gray-500">{{ $fertilizer->description }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        @error('fertilizer_ids')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Submit Buttons -->
                    <div class="flex justify-end mt-6 space-x-3">
                        <a href="{{ route('admin.diseases.index') }}"
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
</x-admin-layout>
