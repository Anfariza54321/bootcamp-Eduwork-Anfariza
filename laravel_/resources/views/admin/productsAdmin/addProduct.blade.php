<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tambah Produk Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 p-6 shadow-sm sm:rounded-lg">
                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-1 gap-6">
                        <div>
                            <x-input-label for="nama" value="Nama Produk" />
                            <x-text-input id="nama" name="nama" type="text" class="mt-1 block w-full"
                                required />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="categories_id" value="Merek / Kategori" />

                            <select name="categories_id" id="categories_id"
                                class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                required>
                                <option value="">-- Pilih Merek --</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->nama }}</option>
                                @endforeach
                            </select>

                            <x-input-error :messages="$errors->get('categories_id')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="harga" value="Harga" />
                            <x-text-input id="harga" name="harga" type="number" class="mt-1 block w-full"
                                required />
                        </div>
                        <div>
                            <x-input-label for="stok" value="Stok" />
                            <x-text-input id="stok" name="stok" type="number" class="mt-1 block w-full"
                                required />
                        </div>

                        <div>
                            <x-input-label for="deskripsi" value="Deskripsi" />
                            <textarea name="deskripsi"
                                class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                rows="3"></textarea>
                        </div>
                        <div>
                            <x-input-label for="gambar" value="Foto Produk" />
                            <input type="file" name="gambar" class="mt-1 block w-full text-white" />
                        </div>
                        <div class="flex justify-end gap-2">
                            <a href="{{ route('products.index') }}"
                                class="bg-gray-500 text-white py-2 px-4 rounded">Batal</a>
                            <x-primary-button>Simpan Produk</x-primary-button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
