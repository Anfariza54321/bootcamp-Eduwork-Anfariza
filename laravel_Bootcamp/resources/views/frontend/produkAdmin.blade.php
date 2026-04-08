<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Produk') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between items-center mb-4 gap-4">
                        <h2 class="font-bold">Daftar Produk</h2>
                        <form action="{{ route('produkAdmin') }}" method="GET" class="flex-1 max-w-sm">
                            <div class="relative">
                                <input type="text" name="search" value="{{ request('search') }}"
                                    placeholder="Cari produk atau merek..."
                                    class="w-full pl-10 pr-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                <div class="absolute left-3 top-2.5 text-gray-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                    </svg>
                                </div>
                            </div>
                        </form>

                        <a href="{{ route('produkAdmin') }}"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded shadow">
                            + Tambah Produk
                        </a>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white dark:bg-gray-800 border-collapse">
                            <thead>
                                <tr class="bg-gray-100 dark:bg-gray-700 text-left">
                                    <th class="py-3 px-4 border-b">No</th>
                                    <th class="py-3 px-4 border-b">Nama Produk</th>
                                    <th class="py-3 px-4 border-b">Merek</th>
                                    <th class="py-3 px-4 border-b">Harga</th>
                                    <th class="py-3 px-4 border-b">Stok</th>
                                    <th class="py-3 px-4 border-b text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($produks as $produk)
                                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-900">
                                        <td class="py-2 px-4 border-b text-sm">{{ $loop->iteration }}</td>
                                        <td class="py-2 px-4 border-b text-sm font-medium">{{ $produk->nama }}</td>
                                        <td class="py-2 px-4 border-b text-sm">{{ $produk->merek->nama ?? '-' }}</td>
                                        <td class="py-2 px-4 border-b text-sm">Rp
                                            {{ number_format($produk->harga, 0, ',', '.') }}</td>
                                        <td class="py-2 px-4 border-b text-sm">{{ $produk->stok }}</td>
                                        <td class="py-2 px-4 border-b text-center">
                                            <div class="flex justify-center gap-2">
                                                <a href="{{ route('produkAdmin', $produk->id) }}"
                                                    class="bg-yellow-500 hover:bg-yellow-600 text-white py-1 px-3 rounded text-xs shadow-sm">
                                                    Edit
                                                </a>
                                                <form action="{{ route('produkAdmin', $produk->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="bg-red-500 hover:bg-red-600 text-white py-1 px-3 rounded text-xs shadow-sm"
                                                        onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">
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

                    <div class="mt-4">
                        {{ $produks->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
