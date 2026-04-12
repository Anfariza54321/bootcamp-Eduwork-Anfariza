<section class="relative bg-transparent py-8 antialiased md:py-16 transition-colors duration-500">
    <div class="mx-auto max-w-7xl px-4 2xl:px-0 relative z-10">
        <ol class="items-center mx-auto max-w-3xl flex text-center justify-center mb-12">
            @php
                $steps = [
                    ['name' => 'Cart', 'route' => 'cart.index', 'active' => true],
                    ['name' => 'Checkout', 'route' => 'checkout.index', 'active' => true],
                    ['name' => 'Summary', 'route' => 'order.summary', 'active' => true],
                ];
            @endphp
            @foreach ($steps as $index => $step)
                <li
                    class="flex items-center md:w-full font-mono text-[10px] tracking-[0.2em] uppercase font-black
                    {{ $step['active'] ? 'text-cyan-500 dark:text-cyan-400' : 'text-gray-400 dark:text-gray-600' }}
                    {{ !$loop->last ? "after:content-[''] after:mx-4 after:hidden after:h-[1px] after:w-full after:border-b-2 after:border-dashed sm:after:inline-block " . ($steps[$index + 1]['active'] ? 'after:border-cyan-500' : 'after:border-gray-200 dark:after:border-gray-800') : '' }}">
                    <span class="flex items-center gap-2">
                        <span
                            class="w-6 h-6 flex items-center justify-center border-2 {{ $step['active'] ? 'border-cyan-500 bg-cyan-500 text-white dark:text-black shadow-[0_0_10px_rgba(6,182,212,0.5)]' : 'border-gray-300 dark:border-gray-800' }}">
                            {{ $index + 1 }}
                        </span>
                        <span class="hidden sm:inline">{{ $step['name'] }}_</span>
                    </span>
                </li>
            @endforeach
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
            <div class="border-l-4 border-cyan-500 pl-4 mb-8">
                <span
                    class="text-[9px] font-mono text-cyan-600 dark:text-cyan-400 font-bold tracking-[0.4em] uppercase">//_Final_Review</span>
                <h2 class="text-3xl font-black text-gray-900 dark:text-white uppercase italic tracking-tighter">
                    Order_Summary</h2>
            </div>

            <div
                class="relative bg-white dark:bg-black border-2 border-gray-100 dark:border-white/5 p-6 mb-8 shadow-[10px_10px_0px_rgba(0,0,0,0.05)] dark:shadow-none overflow-hidden">
                <div class="absolute top-0 right-0 p-2 opacity-10">
                    <svg class="w-16 h-16" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2L2 7v10l10 5 10-5V7L12 2zm0 2.8L19 8v8l-7 3.5L5 16V8l7-3.2z" />
                    </svg>
                </div>
                <h4
                    class="text-xs font-mono font-black text-purple-600 dark:text-purple-400 uppercase tracking-widest mb-4">
                    >> Billing_Delivery_Data</h4>
                <dl>
                    <dt class="text-[10px] font-mono text-gray-400 uppercase tracking-widest">Destination_Sector</dt>
                    <dd class="mt-2 text-sm font-bold text-gray-700 dark:text-gray-300 uppercase italic">
                        Pesanan Anda akan dideploy sesuai dengan koordinat alamat yang telah diverifikasi pada tahap
                        sebelumnya.
                    </dd>
                </dl>
            </div>

            <div class="mt-6 sm:mt-8">
                <div class="relative overflow-x-auto border-2 border-black dark:border-cyan-500/20">
                    <table
                        class="w-full text-left font-mono text-xs text-gray-900 dark:text-white md:table-fixed bg-white dark:bg-black/50">
                        <thead class="bg-black text-white dark:bg-cyan-500 dark:text-black">
                            <tr>
                                <th class="p-3 uppercase tracking-widest">Item_Description</th>
                                <th class="p-3 uppercase tracking-widest text-center">Qty</th>
                                <th class="p-3 uppercase tracking-widest text-right">Credits</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y-2 divide-gray-100 dark:divide-white/5 font-black">
                            @forelse($cart as $id => $details)
                                <tr class="hover:bg-gray-50 dark:hover:bg-cyan-500/5 transition-colors">
                                    <td class="py-4 px-3">
                                        <div class="flex items-center gap-4">
                                            <div
                                                class="w-12 h-12 border-2 border-gray-100 dark:border-white/10 p-1 bg-white dark:bg-black">
                                                <img class="h-full w-full object-cover grayscale hover:grayscale-0 transition-all duration-500"
                                                    src="{{ asset('images/' . $details['gambar']) }}"
                                                    alt="{{ $details['nama'] }}" />
                                            </div>
                                            <span
                                                class="uppercase tracking-tighter italic">{{ $details['nama'] }}</span>
                                        </div>
                                    </td>
                                    <td class="p-4 text-center">x{{ $details['quantity'] }}</td>
                                    <td class="p-4 text-right text-cyan-600 dark:text-cyan-400">
                                        {{ number_format($details['harga'] * $details['quantity'], 0, ',', '.') }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3"
                                        class="text-center py-8 opacity-50 uppercase italic tracking-widest">
                                        //_No_Data_Buffer_Empty</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-8 space-y-6 bg-gray-50 dark:bg-gray-950 p-6 border-t-4 border-purple-600 shadow-xl">
                    <h4
                        class="text-xs font-mono font-black text-purple-600 dark:text-purple-400 uppercase tracking-[0.3em]">
                        >> Payment_Calculations</h4>

                    <div class="space-y-4 font-mono font-bold uppercase">
                        <div class="flex justify-between text-[10px] text-gray-500">
                            <span>Base_Value</span>
                            <span
                                class="text-gray-900 dark:text-white">Rp{{ number_format($subtotal, 0, ',', '.') }}</span>
                        </div>
                        <div class="flex justify-between text-[10px] text-gray-500">
                            <span>System_Tax (11%)</span>
                            <span class="text-gray-900 dark:text-white">Rp{{ number_format($tax, 0, ',', '.') }}</span>
                        </div>
                        <div
                            class="flex justify-between items-end border-t-2 border-dashed border-gray-200 dark:border-white/10 pt-4">
                            <span
                                class="text-xs text-cyan-600 dark:text-cyan-400 italic font-black">Total_Requirement</span>
                            <span class="text-3xl font-black text-gray-900 dark:text-white tracking-tighter">
                                <span class="text-sm">RP</span>{{ number_format($total, 0, ',', '.') }}
                            </span>
                        </div>
                    </div>

                    <div
                        class="flex items-center gap-3 p-4 bg-white dark:bg-black border border-gray-200 dark:border-white/5">
                        <input id="terms-checkbox-2" type="checkbox" required
                            class="h-5 w-5 border-2 border-black dark:border-cyan-500 bg-transparent text-cyan-500 focus:ring-0 cursor-pointer" />
                        <label for="terms-checkbox-2"
                            class="text-[10px] font-black text-gray-600 dark:text-gray-400 uppercase tracking-widest cursor-pointer hover:text-cyan-400 transition-colors">
                            I accept the <a href="#" class="text-purple-600 underline">System_Terms</a> & Protocol
                            Conditions.
                        </label>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <a href="{{ route('products.index') }}"
                            class="text-center border-2 border-black dark:border-white/20 px-5 py-4 text-[10px] font-black uppercase tracking-widest hover:bg-black hover:text-white dark:text-gray-400 dark:hover:bg-white dark:hover:text-black transition-all">
                            Abort_And_Return
                        </a>
                        <button onclick="togglePaymentModal()" type="button"
                            class="bg-cyan-500 text-black px-5 py-4 text-[10px] font-black uppercase tracking-widest shadow-[0_0_20px_rgba(6,182,212,0.4)] hover:bg-purple-600 hover:text-white transition-all">
                            Initialize_Deployment_
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div id="payment-modal"
    class="fixed inset-0 z-[100] hidden items-center justify-center p-4 sm:p-6 transition-all duration-300">

    <div class="absolute inset-0 bg-gray-900/40 dark:bg-black/60 backdrop-blur-md" onclick="togglePaymentModal()"></div>

    <div
        class="relative w-full max-w-2xl bg-white/90 dark:bg-black/90 border-2 border-black dark:border-cyan-500 shadow-[0_0_50px_rgba(0,0,0,0.3)] dark:shadow-[0_0_50px_rgba(6,182,212,0.2)] overflow-hidden transition-all duration-500 scale-100">

        <div
            class="flex items-center justify-between p-5 border-b-2 border-gray-100 dark:border-cyan-500/20 bg-gray-50/50 dark:bg-gray-950/50">
            <div class="flex flex-col">
                <span
                    class="text-[8px] font-mono text-cyan-600 dark:text-cyan-500 uppercase tracking-[0.4em]">Secure_Link_Established</span>
                <h3 class="text-xl font-black text-gray-900 dark:text-white uppercase italic tracking-tighter">
                    Confirm_Transaction</h3>
            </div>
            <button type="button" onclick="togglePaymentModal()"
                class="w-10 h-10 flex items-center justify-center border-2 border-black dark:border-white/10 hover:bg-red-500 hover:text-white transition-all font-black">
                X
            </button>
        </div>

        <div class="p-6 sm:p-8">
            <form id="final-order-form" action="/order/store" method="POST">
                @csrf
                @foreach (session('cart', []) as $id => $details)
                    <input type="hidden" name="items[{{ $id }}][id]" value="{{ $id }}">
                    <input type="hidden" name="items[{{ $id }}][quantity]"
                        value="{{ $details['quantity'] }}">
                @endforeach
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 sm:gap-10">
                    <div class="space-y-6">
                        <div class="space-y-2">
                            <label
                                class="text-[10px] font-mono font-bold text-purple-600 dark:text-purple-400 uppercase tracking-widest">>>
                                Selection_Method</label>
                            <select name="payment_method" id="payment-method-select" onchange="handlePaymentChange()"
                                class="block w-full border-2 border-gray-200 dark:border-white/10 bg-white/50 dark:bg-gray-900/50 p-3 text-sm font-black text-gray-900 dark:text-white focus:border-cyan-500 uppercase backdrop-blur-sm">
                                <option value="cod">Cash_On_Delivery (COD)</option>
                                <option value="bca">Network_Transfer - BCA</option>
                                <option value="mandiri">Network_Transfer - Mandiri</option>
                                <option value="bri">Network_Transfer - BRI</option>
                            </select>
                        </div>

                        <div id="account-name-field" class="hidden space-y-2 transition-all">
                            <label
                                class="text-[10px] font-mono font-bold text-purple-600 dark:text-purple-400 uppercase tracking-widest">>>
                                Holder_Identity</label>
                            <input type="text" name="account_name"
                                class="block w-full border-2 border-gray-200 dark:border-white/10 bg-white/50 dark:bg-gray-900/50 p-3 text-sm font-black text-gray-900 dark:text-white focus:border-cyan-500 uppercase placeholder:opacity-20 backdrop-blur-sm"
                                placeholder="Verification name..." />
                        </div>

                        <div id="cod-info"
                            class="flex items-center gap-2 text-[10px] font-mono text-green-600 dark:text-green-400 font-bold uppercase animate-pulse">
                            <span class="w-2 h-2 bg-green-500 rounded-full"></span>
                            Physical exchange upon delivery.
                        </div>
                    </div>

                    <div
                        class="relative bg-black/5 dark:bg-cyan-500/5 p-6 border-l-4 border-cyan-500 backdrop-blur-md">
                        <p class="text-[10px] font-mono text-gray-500 dark:text-gray-400 uppercase mb-2">
                            Requirement_Sum:</p>
                        <h4 class="text-3xl font-black text-gray-900 dark:text-cyan-400 tracking-tighter">
                            <span class="text-xs">RP</span>{{ number_format($total, 0, ',', '.') }}
                        </h4>
                        <div class="mt-4 pt-4 border-t border-black/10 dark:border-white/10">
                            <p id="payment-instruction"
                                class="text-[9px] font-mono text-gray-600 dark:text-gray-500 leading-relaxed uppercase italic">
                                Mohon siapkan uang tunai sesuai total tagihan...
                            </p>
                        </div>
                    </div>
                </div>

                <div class="mt-10">
                    <button type="submit"
                        class="w-full relative group bg-black text-white dark:bg-cyan-500 dark:text-black py-5 text-xs font-black uppercase tracking-[0.3em] overflow-hidden hover:bg-purple-600 dark:hover:bg-white hover:text-white transition-all active:scale-95 shadow-2xl">
                        Confirm_Mission_Order_
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@vite(['resources/js/order.js'])
