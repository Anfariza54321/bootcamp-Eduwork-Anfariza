<section class="relative bg-transparent bg-white dark:bg-black py-8 antialiased md:py-16 transition-colors duration-500">
    <div class="mx-auto max-w-7xl px-4 2xl:px-0 relative z-10">
        
        <ol class="items-center flex w-full max-w-2xl text-center mb-12">
            @php
                $steps = [
                    ['name' => 'Cart', 'route' => 'cart.index', 'active' => true],
                    ['name' => 'Checkout', 'route' => 'checkout.index', 'active' => true],
                    ['name' => 'Summary', 'route' => 'order.summary', 'active' => false],
                ];
            @endphp
            @foreach ($steps as $index => $step)
                <li class="flex items-center md:w-full font-mono text-[10px] tracking-[0.2em] uppercase font-black
                    {{ $step['active'] ? 'text-cyan-500 dark:text-cyan-400' : 'text-gray-400 dark:text-gray-600' }}
                    {{ !$loop->last ? "after:content-[''] after:mx-4 after:hidden after:h-[1px] after:w-full after:border-b-2 after:border-dashed sm:after:inline-block " . ($steps[$index+1]['active'] ? 'after:border-cyan-500' : 'after:border-gray-200 dark:after:border-gray-800') : '' }}">
                    <span class="flex items-center gap-2">
                        <span class="w-6 h-6 flex items-center justify-center border-2 {{ $step['active'] ? 'border-cyan-500 bg-cyan-500 text-white dark:text-black shadow-[0_0_10px_rgba(6,182,212,0.5)]' : 'border-gray-300 dark:border-gray-800' }}">
                            {{ $index + 1 }}
                        </span>
                        <span class="hidden sm:inline">{{ $step['name'] }}_</span>
                    </span>
                </li>
            @endforeach
        </ol>

        @php
            $subtotal = 0;
            if (session('cart')) {
                foreach (session('cart') as $item) { $subtotal += $item['harga'] * $item['quantity']; }
            }
            $tax = $subtotal * 0.11;
            $total = $subtotal + $tax;
        @endphp

        <div class="lg:flex lg:items-start lg:gap-12 xl:gap-16">
            <div class="min-w-0 flex-1">
                <form action="#" method="POST" class="space-y-12">
                    @csrf
                    
                    <div class="relative bg-white dark:bg-black border-2 border-gray-100 dark:border-white/5 p-6 md:p-8 shadow-[15px_15px_0px_rgba(0,0,0,0.05)] dark:shadow-none">
                        <div class="absolute -top-3 left-6 bg-white dark:bg-black px-2 flex items-center gap-2">
                            <span class="w-2 h-2 bg-purple-600 animate-ping"></span>
                            <h2 class="text-xs font-mono font-black text-purple-600 dark:text-purple-400 uppercase tracking-[0.3em]">
                                //_Delivery_Protocol
                            </h2>
                        </div>

                        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 mt-4"> 
                            @foreach([
                                ['label' => 'Full Name', 'name' => 'name', 'type' => 'text', 'placeholder' => 'Entry citizen name...'],
                                ['label' => 'Email Address', 'name' => 'email', 'type' => 'email', 'placeholder' => 'id@network.com'],
                                ['label' => 'Phone Number', 'name' => 'phone', 'type' => 'text', 'placeholder' => '+62...']
                            ] as $input)
                            <div class="space-y-2">
                                <label class="text-[10px] font-mono font-bold text-gray-500 dark:text-gray-400 uppercase tracking-widest">>> {{ $input['label'] }}</label>
                                <input type="{{ $input['type'] }}" name="{{ $input['name'] }}" required
                                    class="block w-full border-2 border-gray-100 dark:border-white/10 bg-gray-50 dark:bg-gray-950/50 p-3 text-sm font-bold text-gray-900 dark:text-white focus:border-purple-500 dark:focus:border-cyan-500 focus:ring-0 transition-all uppercase placeholder:opacity-30"
                                    placeholder="{{ $input['placeholder'] }}" />
                            </div>
                            @endforeach

                            <div class="space-y-2">
                                <label class="text-[10px] font-mono font-bold text-gray-500 dark:text-gray-400 uppercase tracking-widest">>> Sector/City</label>
                                <select name="city" class="block w-full border-2 border-gray-100 dark:border-white/10 bg-gray-50 dark:bg-gray-950/50 p-3 text-sm font-bold text-gray-900 dark:text-white focus:border-purple-500 dark:focus:border-cyan-500 transition-all uppercase">
                                    <option value="Pati">Pati_Sector</option>
                                    <option value="Semarang">Semarang_Sector</option>
                                    <option value="Jakarta">Jakarta_Central</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="relative bg-white dark:bg-black border-2 border-gray-100 dark:border-white/5 p-6 md:p-8 shadow-[15px_15px_0px_rgba(0,0,0,0.05)] dark:shadow-none">
                        <div class="absolute -top-3 left-6 bg-white dark:bg-black px-2">
                            <h2 class="text-xs font-mono font-black text-cyan-600 dark:text-cyan-400 uppercase tracking-[0.3em]">
                                //_Credit_Authorization
                            </h2>
                        </div>

                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 mt-4"> 
                            <label class="relative flex cursor-pointer border-2 border-gray-100 dark:border-white/5 bg-gray-50 dark:bg-gray-950/50 p-5 transition-all group hover:border-cyan-500">
                                <input type="radio" name="payment_method" value="transfer" class="mt-1 h-4 w-4 text-cyan-500 border-2 border-gray-300 dark:border-white/20 bg-transparent focus:ring-0" checked />
                                <span class="ms-4">
                                    <span class="block text-xs font-black text-gray-900 dark:text-white uppercase tracking-tighter italic group-hover:text-cyan-500 transition-colors">Bank_Transfer_Secure</span>
                                    <span class="block text-[10px] text-gray-500 font-mono uppercase">Manual Verification / BCA_MANDIRI</span>
                                </span>
                            </label>

                            <label class="relative flex cursor-pointer border-2 border-gray-100 dark:border-white/5 bg-gray-50 dark:bg-gray-950/50 p-5 transition-all group hover:border-purple-500">
                                <input type="radio" name="payment_method" value="cod" class="mt-1 h-4 w-4 text-purple-500 border-2 border-gray-300 dark:border-white/20 bg-transparent focus:ring-0" />
                                <span class="ms-4">
                                    <span class="block text-xs font-black text-gray-900 dark:text-white uppercase tracking-tighter italic group-hover:text-purple-500 transition-colors">Cash_On_Arrival</span>
                                    <span class="block text-[10px] text-gray-500 font-mono uppercase">Physical Credit Exchange</span>
                                </span>
                            </label>
                        </div>
                    </div>
                </form>
            </div>

            <div class="mt-12 w-full lg:mt-0 lg:max-w-xs xl:max-w-md">
                <div class="sticky top-8 space-y-6">
                    <div class="relative bg-black text-white p-6 shadow-[10px_10px_0px_rgba(6,182,212,0.3)] dark:shadow-none border-t-4 border-cyan-500">
                        <div class="flex justify-between items-center mb-6">
                            <h3 class="text-[10px] font-mono font-black uppercase tracking-[0.3em] text-cyan-400">Terminal_Receipt</h3>
                            <span class="text-[8px] font-mono opacity-50 uppercase italic">Ref_ID: {{ rand(1000, 9999) }}</span>
                        </div>

                        <div class="space-y-4 font-mono uppercase">
                            <div class="flex justify-between text-[10px]">
                                <span class="text-gray-400">Net_Amount</span>
                                <span>Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
                            </div>
                            <div class="flex justify-between text-[10px]">
                                <span class="text-gray-400">Gov_Tax (11%)</span>
                                <span>Rp {{ number_format($tax, 0, ',', '.') }}</span>
                            </div>
                            <div class="pt-4 border-t border-white/10 flex justify-between items-end">
                                <span class="text-xs font-black text-cyan-400 italic">Total_Credits</span>
                                <span class="text-2xl font-black tracking-tighter">Rp {{ number_format($total, 0, ',', '.') }}</span>
                            </div>
                        </div>

                        <form action="{{ route('order.summary') }}" method="GET" class="mt-8">
                            <button type="submit"
                                class="w-full bg-cyan-500 text-black py-4 text-xs font-black uppercase tracking-widest hover:bg-purple-500 transition-all shadow-[0_0_15px_rgba(6,182,212,0.4)] active:scale-95">
                                Review_Final_Order_
                            </button>
                        </form>

                        <div class="mt-6 pt-4 border-t border-white/5 flex justify-center">
                            <a href="{{ route('products.index') }}" class="text-[10px] font-mono text-gray-500 hover:text-white uppercase tracking-widest flex items-center gap-2 transition-all">
                                <span class="w-2 h-[1px] bg-gray-500"></span>
                                Back_to_Shop
                            </a>
                        </div>
                    </div>

                    <div class="p-4 border border-dashed border-gray-300 dark:border-white/10">
                        <p class="text-[8px] font-mono text-gray-400 dark:text-gray-600 uppercase leading-relaxed">
                            System_Note: All transactions are encrypted with RSA-4096. By proceeding, you authorize the transfer of credits to Anfariza'SS main vault.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@vite(['resources/js/checkout.js'])
