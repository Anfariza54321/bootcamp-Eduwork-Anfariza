<section class="bg-gray-50 py-8 antialiased dark:bg-gray-900 md:py-12">

    <div class="mx-auto max-w-7xl px-4 2xl:px-0">
        <ol class="items-center flex w-full max-w-2xl text-center text-sm font-medium text-gray-500 sm:text-base">
            <li
                class="flex items-center md:w-full 
        {{ Route::is('cart.index', 'checkout.index', 'order.summary') ? 'text-blue-600' : 'text-gray-500' }} 
        {{ Route::is('checkout.index', 'order.summary') ? 'after:border-blue-600' : 'after:border-gray-200' }}
        after:border after:mx-6 after:hidden after:h-1 after:w-full after:border-b sm:after:inline-block xl:after:mx-10">
                <a href="{{ route('cart.index') }}" class="flex items-center">
                    <span class="flex items-center after:mx-2 after:content-['/'] sm:after:hidden">
                        <svg class="me-2 h-4 w-4 sm:h-5 sm:w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        Cart
                    </span>
                </a>
            </li>

            <li
                class="flex items-center md:w-full 
        {{ Route::is('checkout.index', 'order.summary') ? 'text-blue-600' : 'text-gray-500' }} 
        {{ Route::is('order.summary') ? 'after:border-blue-600' : 'after:border-gray-200' }}
        after:border after:mx-6 after:hidden after:h-1 after:w-full after:border-b sm:after:inline-block xl:after:mx-10">
                <a href="{{ route('checkout.index') }}" class="flex items-center">
                    <span class="flex items-center after:mx-2 after:content-['/'] sm:after:hidden">
                        <svg class="me-2 h-4 w-4 sm:h-5 sm:w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        Checkout
                    </span>
                </a>
            </li>

            <li class="flex shrink-0 items-center {{ Route::is('order.summary') ? 'text-blue-600' : 'text-gray-500' }}">
                <svg class="me-2 h-4 w-4 sm:h-5 sm:w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                Order summary
            </li>
        </ol>
        <h2 class="text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">Shopping Cart</h2>

        <div class="mt-6 sm:mt-8 md:gap-6 lg:flex lg:items-start xl:gap-8">

            <div class="mx-auto w-full flex-none lg:max-w-2xl xl:max-w-4xl">
                <div class="space-y-6">
                    @if (session('cart') && count(session('cart')) > 0)
                        
                        @foreach (session('cart') as $id => $item)
                            <div
                                class="rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 md:p-6 transition-all hover:ring-1 hover:ring-blue-500">
                                
                                <div class="space-y-4 md:flex md:items-center md:justify-between md:gap-6 md:space-y-0">

                                    
                                    <a href="#" class="shrink-0 md:order-1">
                                        <img class="h-24 w-24 rounded-lg object-cover"
                                            src="{{ asset('images/' . ($item['gambar'] ?? 'default.png')) }}"
                                            alt="{{ $item['nama'] ?? 'produk' }}" />
                                    </a>

                                    
                                    <div class="w-full min-w-0 flex-1 space-y-2 md:order-2 md:max-w-md">
                                        <a href="#"
                                            class="text-lg font-bold text-gray-900 hover:text-blue-600 dark:text-white">
                                            {{ $item['nama'] }}
                                        </a>
                                        <div class="flex items-center gap-4">
                                            <form action="{{ route('cart.remove', $id) }}" method="POST">
                                                @csrf
                                                @method('DELETE') 

                                                <button type="submit"
                                                    class="inline-flex items-center text-sm font-medium text-red-500 hover:text-red-700 hover:underline">
                                                    <svg class="me-1.5 h-5 w-5" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                    </svg>
                                                    Remove
                                                </button>
                                            </form>
                                        </div>
                                    </div>

                                    
                                    <div class="flex items-center justify-between md:order-3 md:justify-end gap-6">
                                        <div
                                            class="flex items-center border border-gray-300 rounded-md dark:border-gray-600">
                                            <button type="button"
                                                class="px-2 py-1 hover:bg-gray-100 dark:hover:bg-gray-700 text-slate-500">-</button>
                                            <input type="text"
                                                class="w-10 border-0 bg-transparent text-center text-sm font-semibold focus:ring-0 dark:text-white"
                                                value="{{ $item['quantity'] }}" readonly />
                                            <button type="button"
                                                class="px-2 py-1 hover:bg-gray-100 dark:hover:bg-gray-700 text-slate-500">+</button>
                                        </div>
                                        <div class="text-end w-32">
                                            <p class="text-lg font-extrabold text-gray-900 dark:text-white">
                                                Rp {{ number_format($item['harga'], 0, ',', '.') }}
                                            </p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        @endforeach
                    @else
                        
                        <div
                            class="rounded-lg border border-gray-200 bg-white p-8 text-center dark:border-gray-700 dark:bg-gray-800">
                            <p class="text-gray-500 dark:text-gray-400">Keranjang belanja Anda masih kosong.</p>
                            <a href="/" class="mt-4 inline-block font-bold text-blue-600 hover:underline">Lanjut
                                Belanja</a>
                        </div>
                    @endif
                </div>
            </div>

            <div class="mx-auto mt-6 max-w-4xl flex-1 space-y-6 lg:mt-0 lg:w-full lg:sticky lg:top-4">
                <div
                    class="space-y-4 rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 sm:p-6">
                    <p class="text-xl font-semibold text-gray-900 dark:text-white">Order Summary</p>

                    @php
                        $originalPrice = 0;
                        if (session('cart')) {
                            foreach (session('cart') as $item) {
                                $originalPrice += $item['harga'] * $item['quantity'];
                            }
                        }

                        $taxRate = 0.11; // 11%
                        $taxAmount = $originalPrice * $taxRate;
                        $totalPrice = $originalPrice + $taxAmount;
                    @endphp

                    <div class="space-y-4">
                        <div class="space-y-2">
                            <dl class="flex items-center justify-between gap-4 text-gray-500 dark:text-gray-400">
                                <dt>Original Price</dt>
                                
                                <dd class="text-base font-medium text-gray-900 dark:text-white">
                                    Rp {{ number_format($originalPrice, 0, ',', '.') }}
                                </dd>
                            </dl>
                            <dl class="flex items-center justify-between gap-4 text-gray-500 dark:text-gray-400">
                                <dt>Store Pickup</dt>
                                <dd class="text-base font-medium text-gray-900 dark:text-white">Rp 0</dd>
                            </dl>
                            <dl class="flex items-center justify-between gap-4 text-gray-500 dark:text-gray-400">
                                <dt>Tax (11%)</dt>
                                
                                <dd class="text-base font-medium text-gray-900 dark:text-white">
                                    Rp {{ number_format($taxAmount, 0, ',', '.') }}
                                </dd>
                            </dl>
                        </div>

                        <dl
                            class="flex items-center justify-between gap-4 border-t border-gray-200 pt-2 dark:border-gray-700">
                            <dt class="text-base font-bold text-gray-900 dark:text-white">Total</dt>
                            
                            <dd class="text-base font-bold text-gray-900 dark:text-white">
                                Rp {{ number_format($totalPrice, 0, ',', '.') }}
                            </dd>
                        </dl>
                    </div>

                    <a href="{{ route('checkout.index') }}" title="Proceed to Checkout"
                        class="flex w-full items-center justify-center rounded-lg bg-blue-600 px-5 py-2.5 text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-500 dark:hover:bg-blue-600">Proceed
                        to Checkout</a>

                    <div class="flex items-center justify-center gap-2">
                        <span class="text-sm font-normal text-gray-500 dark:text-gray-400"> or </span>
                        <a href="{{ route('products.index') }}" title=""
                            class="inline-flex items-center gap-2 text-sm font-medium text-blue-600 underline hover:no-underline dark:text-blue-500">
                            Continue Shopping
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
