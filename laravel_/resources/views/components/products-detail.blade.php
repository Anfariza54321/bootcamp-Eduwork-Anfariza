<section class="bg-gray-900 py-5">
    <div class="container mx-auto px-4 py-12">
        <a href="/products" class="flex items-center text-blue-600 hover:text-blue-800 transition mb-8">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Kembali ke Galeri
        </a>

        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden flex flex-col md:flex-row border border-gray-100">
            <div class="md:w-1/2 bg-gray-50 flex items-center justify-center p-8">
                @php
                    $imgName = data_get($product, 'gambar', 'shoes_flat_illustration.jpg');
                    $imgUrl = file_exists(public_path('images/' . $imgName))
                        ? asset('images/' . $imgName)
                        : asset('images/shoes_flat_illustration.jpg');
                @endphp
                <img src="{{ $imgUrl }}" alt="{{ $product->nama ?? ($product->namaProduk ?? 'Product Image') }}"
                    class="w-full h-auto object-contain transform hover:scale-105 transition duration-500">
            </div>

            <div class="md:w-1/2 p-8 md:p-12 flex flex-col justify-center">
                <span class="text-blue-600 font-semibold tracking-widest text-sm uppercase mb-2">Original
                    Collections</span>
                <h1 class="text-4xl font-extrabold text-gray-900 mb-4">{{ $product->nama }}</h1>

                <div class="flex items-center mb-6">
                    {{-- <span class="text-3xl font-bold text-gray-900 mr-4">${{ $product['hargaDiskon'] }}</span> --}}
                    <span class="text-3xl text-gray-900 mr-4">Rp{{ number_format($product->harga ?? 0, 0, ',', '.') }}</span>
                    {{-- <span class="ml-4 bg-red-100 text-red-600 px-3 py-1 rounded-full text-sm font-bold">
                        Save
                        {{ round((($product['hargaAsli'] - $product['hargaDiskon']) / $product['hargaAsli']) * 100) }}%
                    </span> --}}
                </div>

                <p class="text-gray-600 leading-relaxed mb-8">
                    Nikmati kenyamanan maksimal dengan {{ $product->nama }}. Dibuat dengan material
                    berkualitas tinggi yang memberikan durabilitas serta gaya modern yang cocok untuk aktivitas harian
                    Anda.
                </p>

                <div class="mb-8">
                    <h3 class="font-bold text-gray-900 mb-3">Pilih Ukuran</h3>
                    <div class="flex space-x-3">
                        @foreach ([40, 41, 42, 43, 44] as $size)
                            <button
                                class="w-12 h-12 border-2 border-gray-200 rounded-xl flex items-center justify-center hover:border-blue-600 hover:text-blue-600 transition font-medium">
                                {{ $size }}
                            </button>
                        @endforeach
                    </div>
                </div>

                <form action="{{ route('carts.add', $product['id']) }}" method="POST">
                    @csrf
                    <input type="hidden" name="nama" value="{{ $product->nama }}">
                    <input type="hidden" name="harga" value="{{ $product->harga }}">
                    <div class="flex space-x-4">
                        <button type="submit"
                            class="flex-1 bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 rounded-2xl shadow-lg transition duration-300 transform active:scale-95">
                            Add To Cart
                        </button>
                </form>
                <button class="p-4 border-2 border-gray-100 rounded-2xl hover:bg-gray-50 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
    </div>
</section>
