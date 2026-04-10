<section class="relative bg-transparent bg-white dark:bg-black py-8 antialiased md:py-12 transition-colors duration-500">
    <div class="mx-auto max-w-7xl px-4 2xl:px-0 relative z-10">
        <ol class="items-center flex w-full max-w-2xl text-center mb-8">
            @php
                $steps = [
                    ['name' => 'Cart', 'route' => 'cart.index', 'active_check' => ['cart.index', 'checkout.index', 'order.summary']],
                    ['name' => 'Checkout', 'route' => 'checkout.index', 'active_check' => ['checkout.index', 'order.summary']],
                    ['name' => 'Summary', 'route' => 'order.summary', 'active_check' => ['order.summary']],
                ];
            @endphp

            @foreach ($steps as $index => $step)
                <li class="flex items-center md:w-full font-mono text-[10px] tracking-[0.2em] uppercase font-black
                    {{ Route::is(...$step['active_check']) ? 'text-cyan-500 dark:text-cyan-400' : 'text-gray-400 dark:text-gray-600' }}
                    {{ !$loop->last ? "after:content-[''] after:mx-4 after:hidden after:h-[1px] after:w-full after:border-b-2 after:border-dashed sm:after:inline-block " . (Route::is(...$steps[$index+1]['active_check']) ? 'after:border-cyan-500' : 'after:border-gray-200 dark:after:border-gray-800') : '' }}">
                    <a href="{{ route($step['route']) }}" class="flex items-center gap-2 group">
                        <span class="w-6 h-6 flex items-center justify-center border-2 {{ Route::is(...$step['active_check']) ? 'border-cyan-500 bg-cyan-500 text-white dark:text-black shadow-[0_0_10px_rgba(6,182,212,0.5)]' : 'border-gray-300 dark:border-gray-800' }} transition-all">
                            {{ $index + 1 }}
                        </span>
                        <span class="hidden sm:inline">{{ $step['name'] }}_</span>
                    </a>
                </li>
            @endforeach
        </ol>

        <div class="border-l-4 border-purple-600 pl-4 mb-8">
            <span class="text-[9px] font-mono text-purple-600 dark:text-purple-400 font-bold tracking-[0.4em] uppercase">//_User_Assets</span>
            <h2 class="text-3xl font-black text-gray-900 dark:text-white uppercase italic tracking-tighter">Shopping_Cart</h2>
        </div>

        <div class="mt-6 sm:mt-8 md:gap-6 lg:flex lg:items-start xl:gap-8">
            <div class="mx-auto w-full flex-none lg:max-w-2xl xl:max-w-4xl space-y-6">
                @if (session('cart') && count(session('cart')) > 0)
                    @foreach (session('cart') as $id => $item)
                        <div class="relative group bg-white dark:bg-black border-2 border-gray-100 dark:border-white/5 p-4 md:p-6 transition-all hover:border-purple-500 dark:hover:border-cyan-500 overflow-hidden">
                            <div class="absolute -right-4 -top-4 text-4xl font-black text-gray-50 dark:text-white/5 italic select-none uppercase tracking-tighter">Item</div>
                            
                            <div class="relative z-10 space-y-4 md:flex md:items-center md:justify-between md:gap-6 md:space-y-0">
                                <div class="shrink-0 md:order-1 relative">
                                    <div class="absolute -inset-1 bg-gradient-to-tr from-cyan-500 to-purple-600 opacity-20 group-hover:opacity-100 transition duration-500 blur-sm"></div>
                                    <img class="relative h-24 w-24 object-cover border-2 border-white dark:border-black"
                                        src="{{ asset('images/' . ($item['gambar'] ?? 'default.png')) }}"
                                        alt="{{ $item['nama'] ?? 'produk' }}" />
                                </div>

                                <div class="w-full min-w-0 flex-1 space-y-2 md:order-2 md:max-w-md">
                                    <span class="text-[8px] font-mono text-cyan-600 dark:text-cyan-400 font-bold uppercase tracking-widest">//_ID:{{ substr($id, 0, 8) }}</span>
                                    <a href="#" class="block text-xl font-black text-gray-900 dark:text-white uppercase italic hover:text-purple-600 dark:hover:text-cyan-400 transition-colors">
                                        {{ $item['nama'] }}
                                    </a>
                                    
                                    <form action="{{ route('cart.remove', $id) }}" method="POST">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="group flex items-center gap-2 text-[10px] font-black uppercase tracking-tighter text-red-500 hover:text-red-700">
                                            <span class="w-4 h-[1px] bg-red-500 group-hover:w-6 transition-all"></span>
                                            Remove_Access_
                                        </button>
                                    </form>
                                </div>

                                <div class="flex items-center justify-between md:order-3 md:justify-end gap-8">
                                    <div class="flex items-center border-2 border-gray-900 dark:border-cyan-500/30 bg-gray-50 dark:bg-gray-950">
                                        <button type="button" class="w-8 h-8 flex items-center justify-center font-black text-gray-900 dark:text-cyan-400 hover:bg-black hover:text-white dark:hover:bg-cyan-500 dark:hover:text-black transition-all">-</button>
                                        <input type="text" class="w-10 border-0 bg-transparent text-center text-xs font-black dark:text-white focus:ring-0" value="{{ $item['quantity'] }}" readonly />
                                        <button type="button" class="w-8 h-8 flex items-center justify-center font-black text-gray-900 dark:text-cyan-400 hover:bg-black hover:text-white dark:hover:bg-cyan-500 dark:hover:text-black transition-all">+</button>
                                    </div>
                                    
                                    <div class="text-end min-w-[120px]">
                                        <span class="text-[8px] font-mono text-gray-400 uppercase">Sub_Total</span>
                                        <p class="text-lg font-black text-gray-900 dark:text-white tracking-tighter">
                                            <span class="text-xs text-purple-600">RP</span> {{ number_format($item['harga'], 0, ',', '.') }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="border-2 border-dashed border-gray-200 dark:border-white/10 p-12 text-center bg-white/50 dark:bg-black/50 backdrop-blur-sm">
                        <div class="text-gray-400 dark:text-gray-600 font-mono text-xs mb-4 uppercase tracking-[0.3em]">//_No_Data_Found</div>
                        <p class="text-sm font-bold text-gray-500 uppercase italic">Keranjang belanja Anda masih kosong.</p>
                        <a href="/" class="mt-6 inline-block bg-black text-white dark:bg-white dark:text-black px-8 py-3 text-[10px] font-black uppercase tracking-widest hover:bg-purple-600 dark:hover:bg-cyan-400 transition-all">Back_to_Market_</a>
                    </div>
                @endif
            </div>

            <div class="mx-auto mt-6 max-w-4xl flex-1 space-y-6 lg:mt-0 lg:w-full lg:sticky lg:top-4">
                <div class="relative bg-white dark:bg-black border-2 border-black dark:border-purple-500/30 p-6 shadow-[10px_10px_0px_rgba(0,0,0,1)] dark:shadow-none">
                    <h3 class="text-[10px] font-mono font-black text-purple-600 dark:text-purple-400 uppercase tracking-[0.4em] mb-6 flex items-center gap-2">
                        <span class="w-2 h-2 bg-purple-600 animate-pulse"></span>
                        Terminal_Summary
                    </h3>

                    @php
                        $originalPrice = 0;
                        if (session('cart')) {
                            foreach (session('cart') as $item) { $originalPrice += $item['harga'] * $item['quantity']; }
                        }
                        $taxAmount = $originalPrice * 0.11;
                        $totalPrice = $originalPrice + $taxAmount;
                    @endphp

                    <div class="space-y-4 font-bold uppercase tracking-tighter">
                        <div class="flex justify-between text-xs text-gray-500 dark:text-gray-400">
                            <span>Base_Price</span>
                            <span class="text-gray-900 dark:text-white">Rp {{ number_format($originalPrice, 0, ',', '.') }}</span>
                        </div>
                        <div class="flex justify-between text-xs text-gray-500 dark:text-gray-400">
                            <span>Service_Tax (11%)</span>
                            <span class="text-gray-900 dark:text-white">Rp {{ number_format($taxAmount, 0, ',', '.') }}</span>
                        </div>
                        <div class="flex justify-between text-xs text-gray-500 dark:text-gray-400 italic">
                            <span>Logistics</span>
                            <span class="text-green-500">FREE_</span>
                        </div>
                        
                        <div class="pt-4 border-t-2 border-black dark:border-white/10 flex justify-between items-end">
                            <span class="text-sm dark:text-cyan-400">Total_Credits</span>
                            <span class="text-2xl font-black text-gray-900 dark:text-white tracking-tighter">
                                <span class="text-xs">RP</span> {{ number_format($totalPrice, 0, ',', '.') }}
                            </span>
                        </div>
                    </div>

                    <div class="mt-8 space-y-4">
                        <a href="{{ route('checkout.index') }}" 
                            class="flex w-full items-center justify-center bg-black text-white dark:bg-cyan-500 dark:text-black px-5 py-4 text-xs font-black uppercase tracking-[0.2em] shadow-lg hover:bg-purple-600 dark:hover:bg-cyan-400 transition-all active:scale-95">
                            Authorize_Payment_
                        </a>

                        <a href="{{ route('products.index') }}" class="flex items-center justify-center gap-2 text-[10px] font-black text-gray-500 dark:text-gray-400 hover:text-purple-600 transition-colors uppercase italic tracking-widest group">
                            <i class="fas fa-arrow-left group-hover:-translate-x-1 transition-transform"></i>
                            Back_to_Inventory
                        </a>
                    </div>
                </div>
                
                <div class="border-2 border-gray-100 dark:border-white/5 p-4 flex justify-between items-center opacity-50">
                    <span class="text-[8px] font-mono dark:text-gray-500">SECURE_ENCRYPTION: ENABLED</span>
                    <span class="text-[8px] font-mono text-green-500 animate-pulse">LINK_STABLE</span>
                </div>
            </div>
        </div>
    </div>
</section>