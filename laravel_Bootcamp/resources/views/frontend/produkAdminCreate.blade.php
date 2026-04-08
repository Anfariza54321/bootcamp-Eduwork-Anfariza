<x-app-layout>
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 p-6 shadow-sm sm:rounded-lg">
                <h2 class="text-2xl font-bold mb-6 text-gray-800 dark:text-gray-100">Tambah Produk Baru</h2>

                <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-1 gap-4 text-gray-900 dark:text-gray-100">
                        <div>
                            <label class="block text-sm font-medium mb-1">Nama Produk</label>
                            <input type="text" name="nama"
                                class="w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm 
                      bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 
                      focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Masukkan nama sepatu..." required>
                        </div>

                        <div>
                            <label class="block text-sm font-medium mb-1">Merek</label>
                            <select name="merek_id"
                                class="w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm 
                       bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 
                       focus:ring-blue-500 focus:border-blue-500"
                                required>
                                <option value="" class="dark:bg-gray-700">-- Pilih Merek --</option>
                                @foreach ($mereks as $merek)
                                    <option value="{{ $merek->id }}" class="dark:bg-gray-700">{{ $merek->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium mb-1">Deskripsi</label>
                            <textarea name="deskripsi" rows="4"
                                class="w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm
                       bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 
                       focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Masukkan deskripsi produk..." required></textarea>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium mb-1">Harga</label>
                                <input type="number" name="harga"
                                    class="w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm 
                          bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100"
                                    required>
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-1">Stok</label>
                                <input type="number" name="stok"
                                    class="w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm 
                          bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100"
                                    required>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium mb-1">Upload Gambar</label>
                            <input type="file" name="gambar"
                                class="w-full text-sm text-gray-500 dark:text-gray-400
                      file:mr-4 file:py-2 file:px-4
                      file:rounded-md file:border-0
                      file:text-sm file:font-semibold
                      file:bg-blue-50 file:text-blue-700
                      hover:file:bg-blue-100 
                      dark:file:bg-gray-600 dark:file:text-gray-200">
                            <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Format: JPG, PNG, atau JPEG (Maks.
                                2MB)</p>
                        </div>
                    </div>

                    <div class="mt-6 flex justify-end gap-2">
                        <a href="{{ route('produkAdmin') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Batal</a>
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan Produk</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
