<section class="bg-white py-8 antialiased dark:bg-gray-900 md:py-16">
    <div class="mx-auto max-w-7xl px-4 2xl:px-0">
        <ol
            class="items-center mx-auto max-w-3xl flex text-center justify-center text-sm font-medium text-gray-500 sm:text-base">
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
                <a href="{{ route('order.summary') }}" class="flex items-center">
                    <svg class="me-2 h-4 w-4 sm:h-5 sm:w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    Order summary
                </a>
            </li>
        </ol>

        @php
            $cart = session('cart', []);
            $subtotal = 0;
            foreach ($cart as $item) {
                $subtotal += $item['harga'] * $item['quantity'];
            }

            $tax = $subtotal * 0.11;
            $total = $subtotal + $tax;
        @endphp

        <div class="mx-auto max-w-3xl mt-4 sm:mt-6">
            <h2 class="text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">Order Summary</h2>

            
            <div class="mt-6 space-y-4 border-b border-t border-gray-200 py-8 dark:border-gray-700 sm:mt-8">
                <h4 class="text-lg font-semibold text-gray-900 dark:text-white">Billing & Delivery information</h4>
                <dl>
                    <dt class="text-base font-medium text-gray-900 dark:text-white">Individual Details</dt>
                    
                    <dd class="mt-1 text-base font-normal text-gray-500 dark:text-gray-400">
                        Pesanan Anda akan dikirimkan sesuai dengan detail alamat yang Anda isi pada tahap sebelumnya.
                    </dd>
                </dl>
            </div>

            <div class="mt-6 sm:mt-8">
                
                <div class="relative overflow-x-auto border-b border-gray-200 dark:border-gray-800">
                    <table class="w-full text-left font-medium text-gray-900 dark:text-white md:table-fixed">
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-800">
                            @forelse($cart as $id => $details)
                                <tr>
                                    <td class="whitespace-nowrap py-4 md:w-[384px]">
                                        <div class="flex items-center gap-4">
                                            <div
                                                class="flex items-center aspect-square w-12 h-12 shrink-0 bg-gray-100 rounded-lg overflow-hidden">
                                                
                                                <img class="h-full w-full object-cover"
                                                    src="{{ asset('images/' . $details['gambar']) }}"
                                                    alt="{{ $details['nama'] }}" />
                                            </div>
                                            <span class="font-semibold">{{ $details['nama'] }}</span>
                                        </div>
                                    </td>
                                    <td class="p-4 text-base font-normal text-gray-900 dark:text-white text-center">
                                        x{{ $details['quantity'] }}</td>
                                    <td class="p-4 text-right text-base font-bold text-gray-900 dark:text-white">
                                        Rp{{ number_format($details['harga'] * $details['quantity'], 0, ',', '.') }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center py-4 text-gray-500 italic">Keranjang kosong.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-4 space-y-6">
                    <h4 class="text-xl font-semibold text-gray-900 dark:text-white">Payment Details</h4>

                    <div class="space-y-4">
                        <div class="space-y-2">
                            <dl class="flex items-center justify-between gap-4">
                                <dt class="text-gray-500 dark:text-gray-400">Original price (Subtotal)</dt>
                                <dd class="text-base font-medium text-gray-900 dark:text-white">
                                    Rp{{ number_format($subtotal, 0, ',', '.') }}</dd>
                            </dl>

                            <dl class="flex items-center justify-between gap-4">
                                <dt class="text-gray-500 dark:text-gray-400">Tax (11%)</dt>
                                <dd class="text-base font-medium text-gray-900 dark:text-white">
                                    Rp{{ number_format($tax, 0, ',', '.') }}</dd>
                            </dl>
                        </div>

                        <dl
                            class="flex items-center justify-between gap-4 border-t border-gray-200 pt-2 dark:border-gray-700">
                            <dt class="text-lg font-bold text-gray-900 dark:text-white">Total</dt>
                            <dd class="text-lg font-bold text-gray-900 dark:text-white">
                                Rp{{ number_format($total, 0, ',', '.') }}</dd>
                        </dl>
                    </div>

                    <div class="flex items-start sm:items-center">
                        <input id="terms-checkbox-2" type="checkbox" value=""
                            class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600"
                            required />
                        <label for="terms-checkbox-2" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                            I agree with the <a href="#" class="text-blue-700 underline hover:no-underline">Terms
                                and Conditions</a>
                        </label>
                    </div>

                    <div class="gap-4 sm:flex sm:items-center">
                        <a href="{{ route('products.index') }}"
                            class="w-full text-center rounded-lg border border-gray-200 bg-white px-5 py-2.5 text-sm font-medium text-gray-900 hover:bg-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                            Return to Shopping
                        </a>

                        <button onclick="togglePaymentModal()" type="button"
                            class="mt-4 flex w-full items-center justify-center rounded-lg bg-blue-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-blue-800 dark:bg-blue-600 dark:hover:bg-blue-700 sm:mt-0">
                            Send the order
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div id="payment-modal"
    class="fixed inset-0 z-50 hidden bg-gray-900/60 backdrop-blur-sm p-4 items-center justify-center">
    <div
        class="relative w-full max-w-2xl bg-white dark:bg-gray-800 rounded-xl shadow-2xl border border-gray-200 dark:border-gray-700 overflow-hidden">

        <div
            class="flex items-center justify-between p-5 border-b border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-800/50">
            <h3 class="text-xl font-bold text-gray-900 dark:text-white">Selesaikan Pembayaran</h3>
            <button type="button" onclick="togglePaymentModal()"
                class="text-gray-500 hover:text-gray-700 dark:hover:text-white transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
            </button>
        </div>


        <div class="p-6">
            <form id="final-order-form" action="{{ route('order.store') }}" method="POST">
                @csrf
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

                    <div class="space-y-5">
                        <div>
                            <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Metode
                                Pembayaran</label>
                            <select name="payment_method" id="payment-method-select" onchange="handlePaymentChange()"
                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                <option value="cod">Cash On Delivery (COD)</option>
                                <option value="bca">Transfer Bank - BCA</option>
                                <option value="mandiri">Transfer Bank - Mandiri</option>
                                <option value="bri">Transfer Bank - BRI</option>
                            </select>
                        </div>

                        <div id="account-name-field" class="hidden">
                            <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Nama Pemilik
                                Rekening</label>
                            <input type="text" name="account_name"
                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                                placeholder="Sesuai nama di buku tabungan" />
                        </div>

                        <div id="cod-info" class="text-xs text-green-600 dark:text-green-400 italic">
                            *Anda akan membayar saat kurir mengantarkan sepatu ke rumah.
                        </div>
                    </div>

                    <div class="space-y-4">
                        <div
                            class="rounded-xl border border-blue-100 bg-blue-50/50 p-5 dark:border-blue-900/30 dark:bg-blue-900/20">
                            <p class="text-sm text-blue-800 dark:text-blue-300 font-medium mb-1">Total yang harus
                                dibayar:</p>
                            <h4 class="text-2xl font-black text-blue-700 dark:text-white">
                                Rp{{ number_format($total, 0, ',', '.') }}
                            </h4>
                            <p id="payment-instruction"
                                class="mt-4 text-xs text-gray-600 dark:text-gray-400 leading-relaxed">
                                Mohon siapkan uang tunai sesuai total tagihan...
                            </p>
                        </div>
                    </div>
                </div>

                <div class="mt-8">
                    <button type="submit" onclick="this.form.sub.it()"
                        class="w-full rounded-lg bg-blue-700 px-5 py-3 text-sm font-bold text-white hover:bg-blue-800 shadow-lg transition-all active:scale-95">
                        Konfirmasi Pesanan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@vite(['resources/js/order.js'])


