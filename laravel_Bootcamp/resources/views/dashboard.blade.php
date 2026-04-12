<x-app-layout>
    @section('title', 'Dashboard Admin')
    <x-slot name="header">
        <h2
            class="inline-block font-black text-xl uppercase italic tracking-widest bg-gradient-to-r from-purple-400 to-cyan-400 bg-clip-text text-transparent">
            {{ __('Dashboard Admin') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-black">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">

                <div
                    class="group bg-gray-900 border border-cyan-500/30 p-6 rounded-xl shadow-[0_0_15px_rgba(6,182,212,0.1)] hover:shadow-[0_0_25px_rgba(6,182,212,0.4)] transition-all duration-300 hover:-translate-y-2 flex items-center relative overflow-hidden">
                    <div class="absolute top-0 left-0 w-1 h-full bg-cyan-500 shadow-[0_0_10px_#06b6d4]"></div>
                    <div class="p-3 bg-cyan-500/10 rounded-lg group-hover:bg-cyan-500/20 transition-colors">
                        <svg class="w-6 h-6 text-cyan-400 shadow-sm" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 11v10l8 4" />
                        </svg>
                    </div>
                    <div class="ml-4 flex items-center justify-between w-full">
                        <div>
                            <p class="text-xs uppercase tracking-widest text-cyan-500/70 font-bold">Total Produk</p>
                            <p class="text-3xl font-black text-white tracking-tighter">{{ $jumlahProduk }}</p>
                        </div>
                        <span
                            class="material-symbols-outlined text-cyan-500/30 group-hover:text-cyan-400 transition-colors text-4xl">inventory_2</span>
                    </div>
                </div>

                <div
                    class="group bg-gray-900 border border-purple-500/30 p-6 rounded-xl shadow-[0_0_15px_rgba(168,85,247,0.1)] hover:shadow-[0_0_25px_rgba(168,85,247,0.4)] transition-all duration-300 hover:-translate-y-2 flex items-center relative overflow-hidden">
                    <div class="absolute top-0 left-0 w-1 h-full bg-purple-500 shadow-[0_0_10px_#a855f7]"></div>
                    <div class="p-3 bg-purple-500/10 rounded-lg group-hover:bg-purple-500/20 transition-colors">
                        <svg class="w-6 h-6 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7l-6 6" />
                        </svg>
                    </div>
                    <div class="ml-4 flex items-center justify-between w-full">
                        <div>
                            <p class="text-xs uppercase tracking-widest text-purple-500/70 font-bold">Kategori Merek</p>
                            <p class="text-3xl font-black text-white tracking-tighter">{{ $jumlahMerek }}</p>
                        </div>
                        <span
                            class="material-symbols-outlined text-purple-500/30 group-hover:text-purple-400 transition-colors text-4xl">category</span>
                    </div>
                </div>

                <div
                    class="group bg-gray-900 border border-cyan-500/30 p-6 rounded-xl shadow-[0_0_15px_rgba(6,182,212,0.1)] hover:shadow-[0_0_25px_rgba(6,182,212,0.4)] transition-all duration-300 hover:-translate-y-2 flex items-center relative overflow-hidden">
                    <div
                        class="absolute top-0 left-0 w-1 h-full bg-gradient-to-b from-cyan-500 to-purple-500 shadow-[0_0_10px_#06b6d4]">
                    </div>
                    <div class="p-3 bg-cyan-500/10 rounded-lg group-hover:bg-cyan-500/20 transition-colors">
                        <svg class="w-6 h-6 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <div class="ml-4 flex items-center justify-between w-full">
                        <div>
                            <p class="text-xs uppercase tracking-widest text-cyan-500/70 font-bold">Total Stok</p>
                            <p class="text-3xl font-black text-white tracking-tighter">{{ number_format($totalStok) }}
                            </p>
                        </div>
                        <span
                            class="material-symbols-outlined text-cyan-500/30 group-hover:text-cyan-400 transition-colors text-4xl">inventory</span>
                    </div>
                </div>

                <div
                    class="group bg-gray-900 border border-yellow-500/30 p-6 rounded-xl shadow-[0_0_15px_rgba(234,179,8,0.1)] hover:shadow-[0_0_25px_rgba(234,179,8,0.4)] transition-all duration-300 hover:-translate-y-2 flex items-center relative overflow-hidden">
                    <div class="absolute top-0 left-0 w-1 h-full bg-yellow-500 shadow-[0_0_10px_#eab308]"></div>
                    <div class="p-3 bg-yellow-500/10 rounded-lg group-hover:bg-yellow-500/20 transition-colors">
                        <svg class="w-6 h-6 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 15l-2 5L9 9l5-2 1 8z" />
                        </svg>
                    </div>
                    <div class="ml-4 flex items-center justify-between w-full">
                        <div>
                            <p class="text-xs uppercase tracking-widest text-yellow-500/70 font-bold">Total Klik</p>
                            <p class="text-3xl font-black text-white tracking-tighter">{{ number_format($jumlahKlik) }}
                            </p>
                        </div>
                        <span
                            class="material-symbols-outlined text-yellow-500/30 group-hover:text-yellow-400 transition-colors text-4xl">touch_app</span>
                    </div>
                </div>
            </div>

            <div class="bg-gray-900 border border-purple-500/20 overflow-hidden shadow-sm sm:rounded-xl mb-8 relative">
                <div class="absolute top-0 right-0 w-32 h-32 bg-purple-600/10 blur-3xl"></div>
                <div class="p-6 relative z-10">
                    <h3 class="text-xl font-black text-white italic">WELCOME BACK, <span
                            class="text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-cyan-400 uppercase">{{ Auth::user()->name }}</span>!
                    </h3>
                    <p class="text-sm text-gray-500 font-mono tracking-tighter">Sistem status: <span
                            class="text-cyan-400">ONLINE</span> // Data sinkronisasi berhasil...</p>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <div class="lg:col-span-2 bg-gray-900 border border-gray-800 p-6 rounded-xl shadow-xl">
                    <h3
                        class="font-black mb-4 text-white uppercase tracking-widest text-sm border-b border-gray-800 pb-2">
                        Tren Penjualan <span class="text-cyan-400">Mingguan</span></h3>
                    <div style="height: 300px;"><canvas id="penjualanChart"></canvas></div>
                </div>

                <div class="bg-gray-900 border border-gray-800 p-6 rounded-xl shadow-xl">
                    <h3
                        class="font-black mb-4 text-white uppercase tracking-widest text-sm border-b border-gray-800 pb-2">
                        Stok <span class="text-purple-400">Merek</span></h3>
                    <div style="height: 300px;"><canvas id="stokPieChart"></canvas></div>
                </div>
            </div>

            <div class="mt-8 bg-gray-900 border border-cyan-500/20 rounded-xl overflow-hidden shadow-2xl relative">
                <div class="absolute top-0 left-0 w-2 h-2 border-t-2 border-l-2 border-cyan-400"></div>
                <div class="absolute bottom-0 right-0 w-2 h-2 border-b-2 border-r-2 border-purple-400"></div>

                <div class="p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="font-black text-white uppercase tracking-widest text-sm italic">
                            Recent_Orders <span class="text-cyan-400">// Week_Protocol</span>
                        </h3>
                        <span class="text-[10px] font-mono text-purple-400 animate-pulse">AUTO_REFRESH: ENABLED</span>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full border-separate border-spacing-y-2">
                            <thead>
                                <tr class="text-gray-500 text-[10px] uppercase tracking-widest font-black">
                                    <th class="px-4 py-2 text-left">Order_ID</th>
                                    <th class="px-4 py-2 text-left">Customer</th>
                                    <th class="px-4 py-2 text-left">Product</th>
                                    <th class="px-4 py-2 text-center">Qty</th>
                                    <th class="px-4 py-2 text-left">Total</th>
                                    <th class="px-4 py-2 text-center">Status</th>
                                    <th class="px-4 py-2 text-left">Method</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- Ganti $recentOrders dengan variabel yang dikirim dari Controller --}}
                                @forelse ($recentOrders as $order)
                                    <tr
                                        class="group bg-white/[0.03] hover:bg-cyan-500/[0.08] transition-all duration-300 border border-white/5">
                                        <td
                                            class="px-4 py-3 rounded-l-lg border-y border-l border-white/5 font-mono text-cyan-400 text-xs">
                                            #{{ $order->order_number }}
                                        </td>
                                        <td class="px-4 py-3 border-y border-white/5">
                                            <div class="text-xs font-bold text-white tracking-wide uppercase">
                                                {{ $order->user->name }}</div>
                                            <div class="text-[9px] text-gray-500 font-mono italic">UID:
                                                {{ $order->users_id }}</div>
                                        </td>
                                        <td class="px-4 py-3 border-y border-white/5">
                                            <span class="text-xs text-gray-300">{{ $order->product->nama }}</span>
                                        </td>
                                        <td class="px-4 py-3 border-y border-white/5 text-center">
                                            <span
                                                class="text-xs font-black text-purple-400">{{ $order->quantity }}</span>
                                        </td>
                                        <td class="px-4 py-3 border-y border-white/5 font-bold text-xs text-white">
                                            Rp{{ number_format($order->total) }}
                                        </td>
                                        <td
                                            class="px-4 py-3 rounded-r-lg border-y border-r border-white/5 text-center">
                                            @php
                                                $statusColors = [
                                                    'pending' =>
                                                        'bg-yellow-500/10 text-yellow-500 border-yellow-500/50',
                                                    'processing' => 'bg-blue-500/10 text-blue-500 border-blue-500/50',
                                                    'shipped' =>
                                                        'bg-purple-500/10 text-purple-500 border-purple-500/50',
                                                    'delivered' => 'bg-green-500/10 text-green-500 border-green-500/50',
                                                ];
                                            @endphp
                                            <span
                                                class="px-2 py-1 rounded text-[9px] font-black uppercase border {{ $statusColors[$order->status] ?? 'bg-gray-500/10 text-gray-500' }}">
                                                {{ $order->status }}
                                            </span>
                                        </td>
                                        <td
                                            class="px-4 py-3 border-y border-white/5 font-mono text-[10px] text-cyan-400">
                                            {{ strtoupper($order->payment_method) }}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="px-4 py-10 text-center">
                                            <div class="text-gray-600 font-mono text-xs uppercase tracking-widest">
                                                [ No_Orders_Detected_In_Current_Cycle ]
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
@vite(['resources/js/dashboard.js'])

<script>
    document.addEventListener('DOMContentLoaded', function() {
        
        initSalesChart(
            'penjualanChart', 
            @json($grafikLabel), 
            @json($revenueData), 
            @json($grafikData)
        );

        
        initStockPieChart(
            'stokPieChart', 
            @json($pieLabel), 
            @json($pieData)
        );
    });
</script>
