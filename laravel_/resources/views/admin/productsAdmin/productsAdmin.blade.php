<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="{{ route('products.create') }}"
                        class="inline-block bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded m-8">
                        Add Products
                    </a>
                    <div
                        class="relative overflow-x-auto bg-neutral-primary-soft shadow-xs rounded-base border border-default">
                        <table class="w-full text-sm text-left rtl:text-right text-body">
                            <thead class="text-sm text-body bg-neutral-secondary-medium border-b border-default-medium">
                                <tr>
                                    <th scope="col" class="px-6 py-3 font-bold">
                                        Id
                                    </th>
                                    <th scope="col" class="px-16 py-3">
                                        <span class="sr-only">Image</span>
                                    </th>
                                    <th scope="col" class="px-6 py-3 font-bold">
                                        Product
                                    </th>
                                    <th scope="col" class="px-6 py-3 font-bold">
                                        Merek
                                    </th>
                                    <th scope="col" class="px-6 py-3 font-bold">
                                        Deskripsi
                                    </th>
                                    <th scope="col" class="px-6 py-3 font-bold">
                                        Stok
                                    </th>
                                    <th scope="col" class="px-6 py-3 font-bold">
                                        Price
                                    </th>
                                    <th scope="col" class="px-6 py-3 font-bold">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($products as $product)
                                    <tr
                                        class="bg-neutral-primary-soft border-b border-default hover:bg-neutral-secondary-medium">
                                        <td class="px-6 py-4 font-semibold text-heading">
                                            {{ $loop->iteration }} {{-- Nomor urut otomatis --}}
                                        </td>
                                        <td class="p-4">
                                            <img src="{{ asset('images/' . $product->gambar) }}" class="w-16 md:w-24"
                                                alt="{{ $product->nama }}">
                                        </td>
                                        <td class="px-6 py-4 font-semibold text-heading">
                                            {{ $product->nama }}
                                        </td>
                                        <td class="px-6 py-4 font-semibold text-heading">
                                            {{ $product->category->nama ?? 'Tanpa Kategori' }}
                                        </td>
                                        <td class="px-6 py-4 font-semibold text-heading max-w-xs">
                                            <p class="truncate">{{ $product->deskripsi }}</p>
                                        </td>
                                        <td class="px-6 py-4">
                                            <form class="max-w-xs mx-auto">
                                                <label for="counter-input-1" class="sr-only">Choose quantity:</label>
                                                <div class="relative flex items-center">
                                                    <button type="button"
                                                        data-input-counter-decrement="counter-input-1"
                                                        class="decrement-button flex items-center justify-center text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading focus:ring-4 focus:ring-neutral-tertiary rounded-full text-sm focus:outline-none h-6 w-6">
                                                        <svg class="w-3 h-3 text-heading" aria-hidden="true"
                                                            xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" fill="none" viewBox="0 0 24 24">
                                                            <path stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="2" d="M5 12h14" />
                                                        </svg>
                                                    </button>
                                                    <input type="text" data-input-counter
                                                        class="counter-input shrink-0 text-heading border-0 bg-transparent text-sm font-normal focus:outline-none focus:ring-0 max-w-[2.5rem] text-center"
                                                        placeholder="" value="{{ $product->stok }}" required />
                                                    <button type="button"
                                                        data-input-counter-increment="counter-input-1"
                                                        class="increment-button flex items-center justify-center text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading focus:ring-4 focus:ring-neutral-tertiary rounded-full text-sm focus:outline-none h-6 w-6">
                                                        <svg class="w-3 h-3 text-heading" aria-hidden="true"
                                                            xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" fill="none" viewBox="0 0 24 24">
                                                            <path stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="2"
                                                                d="M5 12h14m-7 7V5" />
                                                        </svg>
                                                    </button>
                                                </div>
                                            </form>
                                        </td>
                                        <td class="px-6 py-4 font-semibold text-heading">
                                            Rp{{ number_format($product->harga, 0, ',', '.') }}
                                        </td>
                                        <td class="px-6 py-4" x-data="{}">
                                            <div class="flex gap-2">
                                                {{-- Tombol Remove (Biasanya tetap pakai konfirmasi halaman/modal) --}}
                                            
                                                <button type="button"
                                                    @click.prevent="$dispatch('open-modal', 'confirm-delete-{{ $product->id }}')"
                                                    class="bg-red-500 hover:bg-red-400 text-white font-bold py-2 px-4 border-b-4 border-red-700 hover:border-red-500 rounded">
                                                    Remove
                                                </button>
                                                @include('admin.productsAdmin.deleteProducts', [
                                                    'product' => $product,
                                                ])

                                                {{-- Tombol Edit mengarah ke halaman edit --}}
                                                <a href="{{ route('products.edit', $product->id) }}"
                                                    class="bg-yellow-500 hover:bg-yellow-400 text-white font-bold py-2 px-4 border-b-4 border-yellow-700 rounded">
                                                    Edit
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

@vite(['resources/js/productsAdmin.js'])
