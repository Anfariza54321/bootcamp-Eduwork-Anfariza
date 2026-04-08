<x-app-layout>
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 p-6 shadow-sm sm:rounded-lg">
                <h2 class="text-2xl font-bold mb-6 text-gray-800 dark:text-gray-100">Edit Produk</h2>

                <form action="{{ route('produk.update', $produk->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-1 gap-4">
                        <div>
                            <label class="block text-sm font-medium">Nama Produk</label>
                            <input type="text" name="nama" class="w-full mt-1 border-gray-300 rounded-md shadow-sm dark:bg-gray-700" value="{{ $produk->nama }}" required>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium">Merek</label>
                            <select name="merek_id" class="w-full mt-1 border-gray-300 rounded-md shadow-sm dark:bg-gray-700" required>
                                <option value="">-- Pilih Merek --</option>
                                @foreach($mereks as $merek)
                                    <option value="{{ $merek->id }}">{{ $merek->nama }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium">Harga</label>
                                <input type="number" name="harga" class="w-full mt-1 border-gray-300 rounded-md shadow-sm dark:bg-gray-700" required>
                            </div>
                            <div>
                                <label class="block text-sm font-medium">Stok</label>
                                <input type="number" name="stok" class="w-full mt-1 border-gray-300 rounded-md shadow-sm dark:bg-gray-700" required>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium">Upload Gambar</label>
                            <input type="file" name="gambar" class="w-full mt-1 text-sm text-gray-500">
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