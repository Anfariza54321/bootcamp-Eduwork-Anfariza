<x-app-layout>
    <div x-data="{ openEdit: false, editId: '', editNama: '' }">
        
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Merek') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="flex justify-between items-center mb-4">
                            <h2 class="text-xl font-semibold">Daftar Merek</h2>
                            <a href="{{ route('merek.create') }}"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition">
                                + Tambah Merek
                            </a>
                        </div>

                        <div class="overflow-x-auto mt-4">
                            <table class="min-w-full bg-white dark:bg-gray-800 border-collapse">
                                <thead>
                                    <tr class="bg-gray-100 dark:bg-gray-700 text-left text-gray-900 dark:text-gray-100">
                                        <th class="py-3 px-4 border-b">No</th>
                                        <th class="py-3 px-4 border-b">Nama Merek</th>
                                        <th class="py-3 px-4 border-b text-center">Jumlah Produk</th>
                                        <th class="py-3 px-4 border-b text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($mereks as $merek)
                                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-900 text-gray-900 dark:text-gray-100 transition">
                                            <td class="py-2 px-4 border-b text-sm">{{ $loop->iteration }}</td>
                                            <td class="py-2 px-4 border-b text-sm font-medium">{{ $merek->nama }}</td>
                                            <td class="py-2 px-4 border-b text-sm text-center">
                                                <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">
                                                    {{ $merek->products_count }} Produk
                                                </span>
                                            </td>
                                            <td class="py-2 px-4 border-b text-center">
                                                <div class="flex justify-center gap-2">
                                                    <button type="button"
                                                        @click="openEdit = true; editId = '{{ $merek->id }}'; editNama = '{{ $merek->nama }}'"
                                                        class="bg-yellow-500 hover:bg-yellow-600 text-white py-1 px-3 rounded text-xs shadow-sm transition">
                                                        Edit
                                                    </button>
                                                    
                                                    <form action="{{ route('merek.destroy', $merek->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="bg-red-500 hover:bg-red-600 text-white py-1 px-3 rounded text-xs shadow-sm transition"
                                                            onclick="return confirm('Apakah Anda yakin ingin menghapus merek ini?')">
                                                            Hapus
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div x-show="openEdit" 
             class="fixed inset-0 z-50 overflow-y-auto" 
             style="display: none;" 
             x-cloak>
            
            <div class="fixed inset-0 bg-black opacity-60" @click="openEdit = false"></div>

            <div class="relative min-h-screen flex items-center justify-center p-4">
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-xl max-w-md w-full p-6">
                    <h2 class="text-xl font-bold mb-4 text-gray-900 dark:text-gray-100 border-b pb-2 dark:border-gray-700">Edit Merek</h2>

                    <form :action="'{{ url('merekAdmin') }}/' + editId" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-5">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Nama Merek</label>
                            <input type="text" name="nama" x-model="editNama"
                                class="w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-blue-500 focus:border-blue-500"
                                required>
                        </div>

                        <div class="flex justify-end gap-3">
                            <button type="button" @click="openEdit = false"
                                class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded text-sm transition">
                                Batal
                            </button>
                            <button type="submit"
                                class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded text-sm font-bold shadow-md transition">
                                Update Merek
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>