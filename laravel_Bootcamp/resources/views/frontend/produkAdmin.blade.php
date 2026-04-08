<x-app-layout>
    <div x-data="{ 
        openEdit: false, 
        editId: '', 
        editNama: '', 
        editHarga: '', 
        editStok: '', 
        editMerek: '' 
    }">
        
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Produk Admin') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="flex justify-between items-center mb-4">
                            <h2 class="text-xl font-semibold">Daftar Produk</h2>
                            <a href="{{ route('produk.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                + Tambah Produk
                            </a>
                        </div>

                        <div class="overflow-x-auto">
                            <table class="min-w-full bg-white dark:bg-gray-800 border-collapse">
                                <thead>
                                    <tr class="bg-gray-100 dark:bg-gray-700 text-left">
                                        <th class="py-3 px-4 border-b">No</th>
                                        <th class="py-3 px-4 border-b">Gambar</th>
                                        <th class="py-3 px-4 border-b">Nama Produk</th>
                                        <th class="py-3 px-4 border-b">Merek</th>
                                        <th class="py-3 px-4 border-b">Harga</th>
                                        <th class="py-3 px-4 border-b text-center">Stok</th>
                                        <th class="py-3 px-4 border-b text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($produks as $produk)
                                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-900">
                                            <td class="py-2 px-4 border-b text-sm">{{ $loop->iteration }}</td>
                                            <td class="py-2 px-4 border-b">
                                                <img src="{{ asset('storage/' . $produk->gambar) }}" class="w-12 h-12 object-cover rounded shadow-sm">
                                            </td>
                                            <td class="py-2 px-4 border-b text-sm font-medium">{{ $produk->nama }}</td>
                                            <td class="py-2 px-4 border-b text-sm">{{ $produk->merek->nama ?? '-' }}</td>
                                            <td class="py-2 px-4 border-b text-sm">Rp {{ number_format($produk->harga, 0, ',', '.') }}</td>
                                            <td class="py-2 px-4 border-b text-sm text-center">{{ $produk->stok }}</td>
                                            <td class="py-2 px-4 border-b text-center">
                                                <div class="flex justify-center gap-2">
                                                    <button type="button" 
                                                        @click="
                                                            openEdit = true; 
                                                            editId = '{{ $produk->id }}'; 
                                                            editNama = '{{ $produk->nama }}'; 
                                                            editHarga = '{{ $produk->harga }}'; 
                                                            editStok = '{{ $produk->stok }}'; 
                                                            editMerek = '{{ $produk->merek_id }}'
                                                        "
                                                        class="bg-yellow-500 hover:bg-yellow-600 text-white py-1 px-3 rounded text-xs">
                                                        Edit
                                                    </button>
                                                    <form action="{{ route('produk.destroy', $produk->id) }}" method="POST">
                                                        @csrf @method('DELETE')
                                                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white py-1 px-3 rounded text-xs" onclick="return confirm('Hapus produk ini?')">
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

        <div x-show="openEdit" class="fixed inset-0 z-50 overflow-y-auto" style="display: none;" x-cloak>
            <div class="fixed inset-0 bg-black opacity-50" @click="openEdit = false"></div>
            <div class="relative min-h-screen flex items-center justify-center p-4">
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-xl max-w-lg w-full p-6">
                    <h2 class="text-xl font-bold mb-4 text-gray-900 dark:text-gray-100">Edit Produk</h2>

                    <form :action="'{{ route('produkAdmin') }}/' + editId" method="POST" enctype="multipart/form-data">
                        @csrf @method('PUT')
                        
                        <div class="grid grid-cols-1 gap-4 text-gray-900 dark:text-gray-100 text-left">
                            <div>
                                <label class="block text-sm font-medium">Nama Produk</label>
                                <input type="text" name="nama" x-model="editNama" class="w-full mt-1 border-gray-300 dark:border-gray-600 rounded-md dark:bg-gray-700">
                            </div>

                            <div>
                                <label class="block text-sm font-medium">Merek</label>
                                <select name="merek_id" x-model="editMerek" class="w-full mt-1 border-gray-300 dark:border-gray-600 rounded-md dark:bg-gray-700">
                                    @foreach($mereks as $merek)
                                        <option value="{{ $merek->id }}">{{ $merek->nama }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium">Harga</label>
                                    <input type="number" name="harga" x-model="editHarga" class="w-full mt-1 border-gray-300 dark:border-gray-600 rounded-md dark:bg-gray-700">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium">Stok</label>
                                    <input type="number" name="stok" x-model="editStok" class="w-full mt-1 border-gray-300 dark:border-gray-600 rounded-md dark:bg-gray-700">
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-medium">Ganti Gambar (Opsional)</label>
                                <input type="file" name="gambar" class="w-full mt-1 text-sm">
                            </div>
                        </div>

                        <div class="mt-6 flex justify-end gap-2">
                            <button type="button" @click="openEdit = false" class="bg-gray-500 text-white px-4 py-2 rounded text-sm">Batal</button>
                            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded text-sm font-bold">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>