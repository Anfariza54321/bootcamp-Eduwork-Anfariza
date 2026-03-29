<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Produk: ') }} {{ $product->nama }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">

                {{-- PENTING: Gunakan enctype="multipart/form-data" agar bisa upload gambar --}}
                <form method="POST" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    <div class="mb-4">
                        <x-input-label for="nama" value="Nama Produk" />
                        <x-text-input id="nama" name="nama" type="text" class="mt-1 block w-full"
                            :value="old('nama', $product->nama)" required />
                        <x-input-error :messages="$errors->get('nama')" class="mt-2" />
                    </div>

                    

                    <div class="mb-4">
                        <x-input-label for="categories_id" value="Merek / Kategori" />
                        <select name="categories_id" id="categories_id"
                            class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('categories_id', $product->categories_id) == $category->id ? 'selected' : '' }}>
                                    {{ $category->nama }}
                                </option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('categories_id')" class="mt-2" />
                    </div>

                    <div class="mb-4">
                        <x-input-label for="deskripsi" value="Deskripsi" />
                        <textarea name="deskripsi" id="deskripsi"
                            class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                            rows="4">{{ old('deskripsi', $product->deskripsi) }}</textarea>
                        <x-input-error :messages="$errors->get('deskripsi')" class="mt-2" />
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="mb-4">
                            <x-input-label for="harga" value="Harga (Rp)" />
                            <x-text-input id="harga" name="harga" type="number" class="mt-1 block w-full"
                                :value="old('harga', $product->harga)" required />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="stok" value="Stok" />
                            <x-text-input id="stok" name="stok" type="number" class="mt-1 block w-full"
                                :value="old('stok', $product->stok)" required />
                        </div>

                    </div>

                    <div class="mb-4">
                        <x-input-label value="Foto Produk Saat Ini" />
                        <div class="mt-2 mb-4">
                            <img src="{{ asset('images/' . $product->gambar) }}" class="w-32 rounded shadow-sm"
                                alt="Preview">
                        </div>

                        <x-input-label for="gambar" value="Ganti Foto (Kosongkan jika tidak ingin ganti)" />
                        <input type="file" name="gambar" id="gambar"
                            class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" />
                        <x-input-error :messages="$errors->get('gambar')" class="mt-2" />
                    </div>

                    <div class="flex justify-end gap-2 mt-6">
                        <a href="{{ route('products.index') }}"
                            class="inline-flex items-center px-4 py-2 bg-gray-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-400 focus:bg-gray-400 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            Batal
                        </a>
                        <x-primary-button>
                            Update Produk
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
