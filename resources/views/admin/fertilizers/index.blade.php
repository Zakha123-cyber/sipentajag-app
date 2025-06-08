<x-admin-layout>
    <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center sm:justify-between">
            <h2 class="text-2xl font-bold text-gray-900">Manajemen Pupuk</h2>
            <div class="mt-4 sm:mt-0">
                <a href="{{ route('admin.fertilizers.create') }}"
                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-green-600 border border-transparent rounded-md shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                    <svg class="w-5 h-5 mr-2 -ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Tambah Pupuk
                </a>
            </div>
        </div>

        @if (session('success'))
            <div class="p-4 mt-4 text-sm text-green-800 bg-green-100 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        <div class="mt-8 overflow-hidden bg-white shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                    Nama & Gambar
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                    Deskripsi
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                    Cara Penggunaan
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-xs font-medium tracking-wider text-center text-gray-500 uppercase">
                                    Link Pembelian
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-xs font-medium tracking-wider text-center text-gray-500 uppercase">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($fertilizers as $fertilizer)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            @if ($fertilizer->image_url)
                                                <div class="flex-shrink-0 w-16 h-16">
                                                    <img class="object-cover w-16 h-16 rounded-lg"
                                                        src="{{ asset('storage/' . $fertilizer->image_url) }}"
                                                        alt="{{ $fertilizer->name }}">
                                                </div>
                                            @endif
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">
                                                    {{ $fertilizer->name }}
                                                </div>
                                                <div class="text-sm text-gray-500">
                                                    {{ $fertilizer->diseases->count() }} penyakit terkait
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-900">
                                            {{ Str::limit($fertilizer->description, 100) }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-900">
                                            {{ Str::limit($fertilizer->usage_instruction, 100) }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        @if ($fertilizer->purchase_link)
                                            <span class="text-sm text-gray-600"
                                                title="{{ $fertilizer->purchase_link }}">
                                                {{ Str::limit($fertilizer->purchase_link, 30) }}
                                            </span>
                                        @else
                                            <span class="text-sm text-gray-500">-</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-sm font-medium text-center whitespace-nowrap">
                                        <div class="flex items-center justify-center space-x-3">
                                            <a href="{{ route('admin.fertilizers.edit', $fertilizer) }}"
                                                class="text-indigo-600 hover:text-indigo-900">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                            </a>
                                            <form action="{{ route('admin.fertilizers.destroy', $fertilizer) }}"
                                                method="POST" class="inline"
                                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus pupuk ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-4 text-center whitespace-nowrap">
                                        <div class="text-sm text-gray-500">Belum ada data pupuk.</div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">
                    {{ $fertilizers->links() }}
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
