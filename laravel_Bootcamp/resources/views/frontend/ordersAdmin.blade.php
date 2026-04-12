<x-app-layout>
     @section('title', 'Dashboard Admin')
    <x-slot name="header">
        <h2
            class="inline-block font-black text-xl uppercase italic tracking-widest bg-gradient-to-r from-purple-400 to-cyan-400 bg-clip-text text-transparent">
            {{ __('Inventory Management') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="p-8 bg-[#0a0a0c] min-h-screen text-white font-sans selection:bg-purple-500/30">
                <div class="mb-10 border-l-4 border-purple-600 pl-4">
                    <h2
                        class="text-2xl font-black italic tracking-tighter text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-cyan-400 uppercase">
                        //_GLOBAL_ORDER_ARCHIVE // DATA_DUMP: {{ $all_orders->total() }}
                    </h2>
                    <p class="text-[10px] font-mono text-purple-500/60 uppercase tracking-[0.3em]">Status: System_Optimal
                        // Registry_History_Loaded</p>
                </div>

                <div
                    class="relative overflow-hidden border border-white/5 bg-white/[0.02] backdrop-blur-md rounded-sm shadow-2xl shadow-purple-900/10">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="border-b border-purple-900/50 bg-purple-900/10">
                                <th class="p-5 text-[10px] font-bold uppercase tracking-widest text-cyan-400">Date_Stamp
                                </th>
                                <th class="p-5 text-[10px] font-bold uppercase tracking-widest text-cyan-400">Order_Hash
                                </th>
                                <th class="p-5 text-[10px] font-bold uppercase tracking-widest text-cyan-400">
                                    Client_Name</th>
                                <th class="p-5 text-[10px] font-bold uppercase tracking-widest text-cyan-400">
                                    Assigned_Product</th>
                                <th class="p-5 text-[10px] font-bold uppercase tracking-widest text-cyan-400">
                                    Value_Credits</th>
                                <th class="p-5 text-[10px] font-bold uppercase tracking-widest text-cyan-400">
                                    Protocol_Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-white/5">
                            @foreach ($all_orders as $order)
                                <tr class="group hover:bg-purple-500/[0.03] transition-all duration-300">
                                    <td class="p-5 text-[11px] font-mono text-gray-500 group-hover:text-purple-400">
                                        {{ $order->created_at?->format('Y/m/d') ?? 'UNKNOWN' }}
                                    </td>

                                    <td class="p-5">
                                        <span
                                            class="font-mono text-xs text-cyan-300 group-hover:shadow-[0_0_15px_rgba(34,211,238,0.3)] transition-all">
                                            #{{ $order->order_number }}
                                        </span>
                                    </td>

                                    <td class="p-5 text-xs font-semibold tracking-tight text-gray-300 uppercase">
                                        {{ $order->user->name }}
                                    </td>

                                    <td class="p-5">
                                        <div class="text-xs text-white/80 group-hover:text-white transition-colors">
                                            {{ $order->product->nama }}
                                        </div>
                                    </td>

                                    <td class="p-5 font-mono text-xs text-purple-300">
                                        IDR {{ number_format($order->total, 0, ',', '.') }}
                                    </td>

                                    <td class="p-5">
                                        @if ($order->status == 'pending')
                                            <span
                                                class="px-3 py-1 bg-yellow-500/5 text-yellow-500 border border-yellow-500/20 text-[9px] font-black uppercase tracking-widest rounded-full">
                                                ● PENDING_PROCESS
                                            </span>
                                        @else
                                            <span
                                                class="px-3 py-1 bg-green-500/5 text-green-500 border border-green-500/20 text-[9px] font-black uppercase tracking-widest rounded-full shadow-[0_0_10px_rgba(34,197,94,0.1)]">
                                                ● COMPLETED
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="mt-10 border-t border-white/5 pt-6">
                    <div class="flex items-center gap-2 mb-4">
                        <span class="h-[1px] w-8 bg-purple-600"></span>
                        <span
                            class="text-[9px] font-mono text-purple-500 uppercase tracking-[0.4em]">Navigation_Control</span>
                    </div>
                    <div class="cyber-pagination">
                        {{ $all_orders->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
    
    nav[role="navigation"] {
        display: flex !important;
        align-items: center !important;
        justify-content: space-between !important;
        background: rgba(255, 255, 255, 0.02) !important;
        border: 1px solid rgba(255, 255, 255, 0.05) !important;
        padding: 1rem !important;
        margin-top: 1.5rem !important;
    }

    
    nav[role="navigation"] p {
        font-family: monospace !important;
        font-size: 10px !important;
        text-transform: uppercase !important;
        letter-spacing: 0.2em !important;
        color: rgba(168, 85, 247, 0.6) !important; /* Ungu Redup */
    }


    nav[role="navigation"] .relative.inline-flex,
    nav[role="navigation"] .flex.justify-between.flex-1 {
        display: flex !important;
        gap: 8px !important;
        background: transparent !important;
        border: none !important;
        box-shadow: none !important;
    }


    nav[role="navigation"] a, 
    nav[role="navigation"] span[aria-current="page"] > span,
    nav[role="navigation"] span[aria-disabled="true"] > span {
        background-color: #000 !important; /* Hitam total */
        border: 1px solid rgba(147, 51, 234, 0.3) !important; /* Border Ungu */
        color: #a855f7 !important; /* Teks Ungu */
        padding: 8px 16px !important;
        font-size: 10px !important;
        font-weight: 900 !important;
        text-transform: uppercase !important;
        transition: all 0.3s ease !important;
        border-radius: 0px !important;
    }

    
    nav[role="navigation"] span[aria-current="page"] > span {
        border-color: #22d3ee !important; /* Cyan/Biru */
        color: #22d3ee !important;
        background-color: rgba(34, 211, 238, 0.1) !important;
        box-shadow: 0 0 15px rgba(34, 211, 238, 0.3) !important;
    }

    
    nav[role="navigation"] a:hover {
        border-color: #a855f7 !important;
        color: #fff !important;
        background-color: rgba(168, 85, 247, 0.2) !important;
        box-shadow: 0 0 15px rgba(168, 85, 247, 0.3) !important;
    }

    
    .shadow-sm {
        box-shadow: none !important;
    }
</style>

</x-app-layout>
