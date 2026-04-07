<section class="bg-white py-8 antialiased dark:bg-gray-900 md:py-16">
    <form action="#" class="mx-auto max-w-7xl px-4 2xl:px-0">
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

        @php
            $subtotal = 0;
            if (session('cart')) {
                foreach (session('cart') as $item) {
                    $subtotal += $item['harga'] * $item['quantity'];
                }
            }
            $tax = $subtotal * 0.11;
            $delivery = 0; 
            $total = $subtotal + $tax + $delivery;
        @endphp

        <div class="mt-6 sm:mt-8 lg:flex lg:items-start lg:gap-12 xl:gap-16">
            <div class="min-w-0 flex-1 space-y-12">
                <form action="#" method="POST" class="min-w-0 flex-1 space-y-8">
                    @csrf
                    
                    <div class="space-y-4">
                        <h2 class="text-xl font-semibold text-gray-900 dark:text-white border-b pb-2">Delivery Details
                        </h2>
                        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2"> 
                            <div>
                                <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Full
                                    Name</label>
                                <input type="text" name="name"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm dark:bg-gray-700 dark:text-white"
                                    placeholder="Masukkan nama lengkap" required />
                            </div>
                            <div>
                                <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Email
                                    Address</label>
                                <input type="email" name="email"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm dark:bg-gray-700 dark:text-white"
                                    placeholder="name@email.com" required />
                            </div>
                            <div>
                                <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">City</label>
                                <select name="city"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm dark:bg-gray-700 dark:text-white">
                                    <option value="Pati">Pati</option>
                                    <option value="Semarang">Semarang</option>
                                    <option value="Jakarta">Jakarta</option>
                                </select>
                            </div>
                            <div>
                                <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Phone
                                    Number</label>
                                <input type="text" name="phone"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm dark:bg-gray-700 dark:text-white"
                                    placeholder="+62 812..." required />
                            </div>
                        </div>
                    </div>

                    
                    <div class="space-y-4">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white border-b pb-2">Payment Method
                        </h3>
                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2"> 
                            <label
                                class="relative flex cursor-pointer rounded-xl border border-gray-200 bg-white p-5 shadow-sm transition-all hover:border-blue-500 dark:border-gray-700 dark:bg-gray-800">
                                <input type="radio" name="payment_method" value="transfer"
                                    class="mt-1 h-4 w-4 text-blue-600" checked />
                                <span class="ms-4">
                                    <span class="block text-sm font-bold text-gray-900 dark:text-white">Bank
                                        Transfer</span>
                                    <span class="block text-xs text-gray-500">Manual verification (BCA/Mandiri)</span>
                                </span>
                            </label>

                            <label
                                class="relative flex cursor-pointer rounded-xl border border-gray-200 bg-white p-5 shadow-sm transition-all hover:border-blue-500 dark:border-gray-700 dark:bg-gray-800">
                                <input type="radio" name="payment_method" value="cod"
                                    class="mt-1 h-4 w-4 text-blue-600" />
                                <span class="ms-4">
                                    <span class="block text-sm font-bold text-gray-900 dark:text-white">Cash on
                                        Delivery</span>
                                    <span class="block text-xs text-gray-500">Bayar saat sepatu sampai</span>
                                </span>
                            </label>
                        </div>
                    </div>
            </div>
    </form>

    <div class="mt-6 w-full space-y-6 sm:mt-8 lg:mt-0 lg:max-w-xs xl:max-w-md">
        <div class="rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800">
            <h3 class="mb-4 text-xl font-semibold text-gray-900 dark:text-white">Order Summary</h3>
            <div class="divide-y divide-gray-200 dark:divide-gray-700">
                <div class="flex items-center justify-between gap-4 py-3">
                    <dt class="text-gray-500">Subtotal</dt>
                    <dd class="font-medium text-gray-900 dark:text-white">Rp
                        {{ number_format($subtotal, 0, ',', '.') }}</dd>
                </div>
                <div class="flex items-center justify-between gap-4 py-3">
                    <dt class="text-gray-500">Tax (11%)</dt>
                    <dd class="font-medium text-gray-900 dark:text-white">Rp
                        {{ number_format($tax, 0, ',', '.') }}</dd>
                </div>
                <div class="flex items-center justify-between gap-4 py-3">
                    <dt class="text-base font-bold text-gray-900 dark:text-white">Total</dt>
                    <dd class="text-2xl font-black text-blue-700 dark:text-white">Rp
                        {{ number_format($total, 0, ',', '.') }}</dd>
                </div>
            </div>

            <form action="{{ route('order.summary') }}" method="GET" class="min-w-0 flex-1 space-y-8">

                <div class="mt-6 w-full space-y-6 lg:max-w-xs xl:max-w-md">
                    <div
                        class="rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                        <h3 class="mb-4 text-xl font-semibold text-gray-900 dark:text-white">Order Summary</h3>

                        
                        <button type="submit"
                            class="mt-4 flex w-full items-center justify-center rounded-lg bg-blue-700 px-5 py-3 text-sm font-bold text-white hover:bg-blue-800 transition-all shadow-lg">
                            Review Order
                        </button>
                    </div>
                </div>
            </form>

            <p class="mt-4 text-center text-sm text-gray-500">
                <a href="{{ route('products.index') }}" class="text-blue-600 underline hover:no-underline">Back
                    to Shop</a>
            </p>
        </div>
    </div>

</section>

@vite(['resources/js/checkout.js'])
