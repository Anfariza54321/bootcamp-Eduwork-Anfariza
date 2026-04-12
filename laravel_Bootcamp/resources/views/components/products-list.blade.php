 <style>
     /* Custom Scrollbar untuk Modal/Dropdown */
     .custom-scrollbar::-webkit-scrollbar {
         width: 4px;
     }

     .custom-scrollbar::-webkit-scrollbar-track {
         background: transparent;
     }

     .custom-scrollbar::-webkit-scrollbar-thumb {
         background: #8b5cf6;
         border-radius: 10px;
     }

     /* Gaya Checkbox Cyberpunk */
     .brand-filter {
         appearance: none;
         border: 2px solid #6366f1;
         background: transparent;
         cursor: pointer;
         position: relative;
     }

     .brand-filter:checked {
         background-color: #06b6d4;
         box-shadow: 0 0 10px #06b6d4;
     }

     /* Card Hover Effect */
     .cyber-card {
         transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
     }

     .cyber-card:hover {
         border-color: #a855f7;
         box-shadow: 0 0 20px rgba(168, 85, 247, 0.2);
     }

     /* Pagination Container Styling */
     .cyber-pagination .page-item .page-link {
         background-color: transparent;
         border: 2px solid #e2e8f0;
         /* Default light border */
         color: #64748b;
         font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, monospace;
         font-weight: 900;
         text-transform: uppercase;
         transition: all 0.3s ease;
         margin: 0 2px;
     }

     /* Dark Mode Pagination */
     .dark .cyber-pagination .page-item .page-link {
         border-color: rgba(6, 182, 212, 0.2);
         color: #94a3b8;
     }

     /* Active State (Neon) */
     .cyber-pagination .page-item.active .page-link {
         background-color: #000;
         border-color: #000;
         color: #fff;
     }

     .dark .cyber-pagination .page-item.active .page-link {
         background-color: #06b6d4;
         border-color: #06b6d4;
         color: #000;
         box-shadow: 0 0 15px rgba(6, 182, 212, 0.5);
     }

     /* Hover State */
     .cyber-pagination .page-item:not(.active) .page-link:hover {
         border-color: #a855f7;
         color: #a855f7;
         transform: translateY(-2px);
     }
 </style>

 <div class="mx-auto max-w-7xl px-4 2xl:px-0 py-10">
     <div class="mb-8 flex flex-col md:flex-row md:items-center justify-between gap-6 border-l-4 border-cyan-500 pl-6">
         <div>
             <h2 class="text-xs font-mono font-black tracking-[0.4em] text-purple-600 dark:text-purple-400 uppercase">
                 //_Database_Catalog
             </h2>
             <h1 class="text-3xl font-black text-gray-900 dark:text-white italic uppercase tracking-tighter">
                 Prime_Selection
             </h1>
         </div>

         <form action="{{ route('products.index') }}" method="GET" id="filterForm"
             class="flex flex-wrap items-center gap-4">
             <input type="hidden" name="q" value="{{ request('q') }}">

             <div class="relative">
                 <button onclick="toggleDropdown('filterModal')" type="button"
                     class="group flex items-center justify-center rounded-none border-2 border-gray-200 bg-white px-5 py-2.5 text-xs font-black uppercase tracking-widest text-gray-900 transition-all hover:bg-black hover:text-white dark:border-cyan-500/30 dark:bg-black dark:text-cyan-400 dark:hover:bg-cyan-500 dark:hover:text-black dark:hover:shadow-[0_0_15px_#06b6d4]">
                     <svg class="me-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                         <path stroke-linecap="round" stroke-width="2"
                             d="M18.796 4H5.204a1 1 0 0 0-.753 1.659l5.302 6.058a1 1 0 0 1 .247.659v4.874a.5.5 0 0 0 .2.4l3 2.25a.5.5 0 0 0 .8-.4v-7.124a1 1 0 0 1 .247-.659l5.302-6.059c.566-.646.106-1.658-.753-1.658Z" />
                     </svg>
                     Filters_
                 </button>
                 <div id="filterModal"
                     class="absolute z-20 hidden w-56 mt-3 bg-white border-2 border-black shadow-[10px_10px_0px_#000] dark:bg-gray-950 dark:border-cyan-500/50 dark:shadow-[0_0_30px_rgba(6,182,212,0.1)] p-4">
                     <p class="text-[10px] font-mono font-bold text-purple-500 mb-3 uppercase tracking-tighter">//
                         Select_Brand</p>
                     <ul class="space-y-3">
                         @php $brands = ['Nike', 'Adidas', 'Puma', 'Vans', 'Converse']; @endphp
                         @foreach ($brands as $brand)
                             <li class="flex items-center group cursor-pointer">
                                 <input id="brand-{{ $brand }}" name="brands[]" type="checkbox"
                                     value="{{ $brand }}" class="brand-filter w-4 h-4 rounded-none">
                                 <label for="brand-{{ $brand }}"
                                     class="ms-3 text-xs font-bold uppercase tracking-tight text-gray-700 dark:text-gray-300 group-hover:text-cyan-500 transition-colors">{{ $brand }}</label>
                             </li>
                         @endforeach
                     </ul>
                 </div>
             </div>

             <div class="relative">
                 <button onclick="toggleDropdown('dropdownSort1')" type="button"
                     class="flex items-center justify-center rounded-none border-2 border-gray-200 bg-white px-5 py-2.5 text-xs font-black uppercase tracking-widest text-gray-900 hover:bg-black hover:text-white dark:border-purple-500/30 dark:bg-black dark:text-purple-400 dark:hover:bg-purple-500 dark:hover:text-black">
                     Sort_By
                 </button>
                 <div id="dropdownSort1"
                     class="absolute z-20 hidden w-48 mt-3 bg-white border-2 border-black dark:bg-gray-950 dark:border-purple-500/50 p-2">
                     <label
                         class="flex items-center p-2 hover:bg-gray-100 dark:hover:bg-purple-900/30 cursor-pointer group">
                         <input type="radio" name="sort" value="asc" class="w-3 h-3 text-purple-600">
                         <span
                             class="ms-3 text-[10px] font-bold uppercase dark:text-gray-300 group-hover:text-purple-400 transition-colors">Lowest_Price</span>
                     </label>
                     <label
                         class="flex items-center p-2 hover:bg-gray-100 dark:hover:bg-purple-900/30 cursor-pointer group">
                         <input type="radio" name="sort" value="desc" class="w-3 h-3 text-purple-600">
                         <span
                             class="ms-3 text-[10px] font-bold uppercase dark:text-gray-300 group-hover:text-purple-400 transition-colors">Highest_Price</span>
                     </label>
                 </div>
             </div>

             <button type="submit"
                 class="bg-black text-white dark:bg-gradient-to-r dark:from-cyan-600 dark:to-purple-600 px-6 py-2.5 text-xs font-black uppercase tracking-[0.2em] shadow-lg hover:scale-105 transition-transform active:scale-95">
                 Apply_Changes
             </button>
         </form>
     </div>

     @if (session('success'))
         <div class="bg-cyan-500/10 border border-cyan-500/50 p-4 rounded-lg flex items-center justify-between">
             <div class="flex items-center">
                 <span class="font-black text-cyan-500 mr-3">>></span>
                 <p class="text-xs font-black uppercase tracking-widest text-cyan-500">
                     {{ session('success') }}
                 </p>
             </div>
             <button onclick="this.parentElement.remove()" class="text-cyan-500 hover:text-white transition-colors">
                 <span class="material-symbols-outlined text-sm">close</span>
             </button>
         </div>
     @endif

     <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
         @foreach ($products as $item)
             <a href="{{ route('products.show', $item->slug) }}" class="block">
                 <div
                     class="cyber-card group flex flex-col h-full bg-white border-2 border-gray-100 p-4 dark:border-white/5 dark:bg-gray-950 relative overflow-hidden">

                     <div
                         class="absolute -right-4 -top-4 text-[40px] font-black text-gray-50 dark:text-white/5 italic pointer-events-none uppercase">
                         Gear</div>

                     <div
                         class="relative h-64 w-full bg-gray-50 dark:bg-black border border-transparent dark:group-hover:border-cyan-500/50 transition-colors overflow-hidden">
                         <img class="h-full w-full object-contain p-6 transition-transform duration-700 group-hover:scale-110 group-hover:rotate-3"
                             src="{{ asset('images/' . $item->gambar) }}" alt="{{ $item->nama }}" />

                         <span
                             class="absolute top-0 left-0 bg-black text-white dark:bg-cyan-500 dark:text-black px-3 py-1 text-[9px] font-black uppercase tracking-tighter">
                             {{ $item->merek->nama }}
                         </span>
                     </div>

                     <div class="flex flex-col grow pt-6">
                         <div class="flex justify-between items-start mb-2">
                             <h3
                                 class="text-sm font-black text-gray-900 dark:text-white uppercase italic tracking-tight group-hover:text-cyan-500 transition-colors leading-none">
                                 {{ $item->nama }}
                             </h3>
                             <div class="flex items-center gap-1 text-yellow-400">
                                 <span class="text-[10px] font-bold">5.0</span>
                             </div>
                         </div>

                         <p
                             class="mb-6 text-[11px] text-gray-500 dark:text-gray-400 line-clamp-2 leading-tight uppercase font-medium">
                             {{ $item->deskripsi }}
                         </p>

                         <div class="mt-auto border-t-2 border-dashed border-gray-100 dark:border-white/10 pt-4">
                             <div class="flex justify-between items-end mb-4">
                                 <div>
                                     <span
                                         class="text-[8px] font-mono font-bold text-purple-500 uppercase tracking-tighter">Current_Value</span>
                                     <p
                                         class="text-xl font-black text-gray-900 dark:text-white leading-none tracking-tighter">
                                         <span
                                             class="text-xs text-cyan-600 dark:text-cyan-400 mr-1">IDR</span>{{ number_format($item->harga, 0, ',', '.') }}
                                     </p>
                                 </div>
                                 <span class="text-[8px] font-mono text-gray-400 uppercase">Stock:
                                     {{ $item->stok }}</span>
                             </div>

                             <div class="flex gap-2">
                                 <button type="button"
                                     class="w-12 h-12 flex items-center justify-center border-2 border-gray-900 text-gray-900 hover:bg-black hover:text-white dark:border-cyan-500/30 dark:text-cyan-400 dark:hover:bg-cyan-500 dark:hover:text-black transition-all">
                                     <span class="material-symbols-outlined">
                                         shopping_cart_checkout
                                     </span>
                                 </button>
                                 <button
                                     class="grow bg-transparent border-2 border-purple-600 
               text-purple-500 text-[10px] font-mono font-black uppercase tracking-[0.2em] 
               relative overflow-hidden group transition-all duration-300
               hover:bg-purple-600 hover:text-white hover:shadow-[0_0_20px_rgba(168,85,247,0.8)]
               active:scale-95 shadow-lg">

                                     <span
                                         class="absolute top-0 left-0 w-2 h-2 border-t-2 border-l-2 border-cyan-400 opacity-0 group-hover:opacity-100 transition-opacity"></span>
                                     <span
                                         class="absolute bottom-0 right-0 w-2 h-2 border-b-2 border-r-2 border-cyan-400 opacity-0 group-hover:opacity-100 transition-opacity"></span>

                                     <span class="relative z-10 group-hover:italic transition-all">
                                         Buy_Now_
                                     </span>

                                     <div
                                         class="absolute inset-0 bg-[linear-gradient(rgba(18,16,16,0)_50%,rgba(0,0,0,0.1)_50%)] bg-[length:100%_2px] pointer-events-none">
                                     </div>
                                 </button>
                             </div>
                         </div>
                     </div>
                 </div>
             </a>
         @endforeach
     </div>
 </div>

 {{-- product detail modal --}}
 <div id="product-modal" tabindex="-1" aria-hidden="true"
     class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full bg-black/80 backdrop-blur-md transition-all duration-500">

     <div class="relative p-4 w-full max-w-4xl max-h-full">
         <div
             class="relative bg-white dark:bg-black rounded-none border-2 border-black dark:border-cyan-500/50 shadow-[20px_20px_0px_rgba(0,0,0,1)] dark:shadow-[0_0_50px_rgba(6,182,212,0.15)] overflow-hidden">

             <div class="absolute top-0 left-0 w-4 h-4 border-t-2 border-l-2 border-purple-500 hidden dark:block"></div>
             <div class="absolute bottom-0 right-0 w-4 h-4 border-b-2 border-r-2 border-purple-500 hidden dark:block">
             </div>

             <div
                 class="flex items-center justify-between p-4 md:p-6 border-b-2 border-gray-100 dark:border-cyan-500/20 bg-gray-50 dark:bg-gray-950/50">
                 <div class="flex flex-col">
                     <span
                         class="text-[8px] font-mono text-purple-600 dark:text-purple-400 tracking-[0.4em] uppercase font-black">//_Scanner_Active</span>
                     <h3 class="text-xl font-black text-gray-900 dark:text-white uppercase italic tracking-tighter">
                         Product_Data_Archive
                     </h3>
                 </div>
                 <button type="button" onclick="closeModal()"
                     class="group relative w-10 h-10 flex items-center justify-center border-2 border-black dark:border-cyan-500 text-black dark:text-cyan-500 hover:bg-black hover:text-white dark:hover:bg-cyan-500 dark:hover:text-black transition-all">
                     <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                         viewBox="0 0 14 14">
                         <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                             d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                     </svg>
                 </button>
             </div>

             <div class="p-6 md:p-10">
                 <div class="lg:grid lg:grid-cols-2 lg:gap-12 items-center">

                     <div class="relative shrink-0 max-w-md mx-auto group">
                         <div
                             class="absolute -inset-2 border border-dashed border-gray-300 dark:border-cyan-500/30 opacity-50 group-hover:opacity-100 transition-opacity">
                         </div>

                         <div class="bg-gray-50 dark:bg-gray-900 p-8 border-2 border-gray-100 dark:border-white/5">
                             <img id="modal-img"
                                 class="w-full h-auto object-contain transition-transform duration-700 group-hover:scale-105"
                                 src="" alt="" />
                         </div>

                         <div
                             class="mt-2 flex justify-between text-[8px] font-mono text-gray-400 dark:text-cyan-500/50 uppercase tracking-tighter">
                             <span>Resolution: 1080px</span>
                             <span>Status: Verified</span>
                         </div>
                     </div>

                     <div class="mt-8 lg:mt-0 space-y-6">
                         <div>
                             <span
                                 class="text-[10px] font-mono font-bold text-purple-600 dark:text-purple-400 uppercase tracking-widest">>>_Identification</span>
                             <h1 id="modal-title"
                                 class="text-3xl font-black text-gray-900 dark:text-white leading-none uppercase italic tracking-tighter mt-1">
                             </h1>
                         </div>

                         <div class="flex items-end gap-2">
                             <div class="bg-black dark:bg-cyan-500/10 px-4 py-2 border-l-4 border-cyan-500">
                                 <span
                                     class="text-[9px] font-mono text-gray-400 dark:text-cyan-400/60 uppercase block">Price_Unit_IDR</span>
                                 <p id="modal-price"
                                     class="text-3xl font-black text-blue-600 dark:text-cyan-400 tracking-tighter">
                                 </p>
                             </div>
                         </div>

                         <div class="pt-4">
                             <span
                                 class="text-[10px] font-mono font-bold text-purple-600 dark:text-purple-400 uppercase tracking-widest block mb-2">>>_Description_Log</span>
                             <p
                                 class="text-gray-600 dark:text-gray-400 text-xs leading-relaxed uppercase font-medium tracking-tight border-b border-gray-100 dark:border-white/10 pb-6">
                                 Nikmati kenyamanan maksimal dengan koleksi sepatu eksklusif kami. Didesain untuk
                                 performa tinggi dan gaya Cyberpunk yang modern. Pastikan langkahmu terekam dalam
                                 sejarah fashion digital.
                             </p>
                         </div>

                         <div class="flex flex-wrap gap-4 pt-4">
                             @csrf
                             <form id="add-to-cart-form" method="POST" action="" class="grow">
                                 <input type="hidden" name="nama" id="modal-hidden-nama">
                                 <input type="hidden" name="harga" id="modal-hidden-harga">
                                 <input type="hidden" name="gambar" id="modal-hidden-gambar">

                                 <button type="submit"
                                     class="w-full relative group bg-black text-white dark:bg-cyan-500 dark:text-black font-black uppercase tracking-widest text-xs px-8 py-4 overflow-hidden transition-all hover:scale-105 active:scale-95">
                                     <span class="relative z-10 flex items-center justify-center gap-2">
                                         <span class="material-symbols-outlined">
                                             shopping_cart_checkout
                                         </span>
                                         Initialize_Purchase_
                                     </span>
                                 </button>
                             </form>
                         </div>
                     </div>
                 </div>
             </div>

             <div
                 class="bg-gray-50 dark:bg-gray-950/80 p-3 px-6 border-t-2 border-gray-100 dark:border-cyan-500/20 flex justify-between items-center">
                 <div class="flex gap-4">
                     <span class="text-[8px] font-mono text-gray-400">AUTH: VALID</span>
                     <span class="text-[8px] font-mono text-gray-400">ENCRYPTION: AES-256</span>
                 </div>
                 <div class="animate-pulse flex items-center gap-1">
                     <div class="w-1 h-1 bg-green-500 rounded-full"></div>
                     <span class="text-[8px] font-mono text-green-500 uppercase">Live_Database_Link</span>
                 </div>
             </div>
         </div>
     </div>
 </div>

 <div class="mt-20 mb-10 flex flex-col items-center gap-4">
     <div class="flex items-center gap-3">
         <div class="h-[1px] w-12 bg-gray-200 dark:bg-cyan-500/30"></div>
         <span class="text-[9px] font-mono font-black tracking-[0.3em] text-gray-400 dark:text-purple-500 uppercase">
             //_Navigation_Console
         </span>
         <div class="h-[1px] w-12 bg-gray-200 dark:bg-cyan-500/30"></div>
     </div>

     <div
         class="cyber-pagination inline-flex items-center p-2 bg-white dark:bg-black border-2 border-black dark:border-cyan-500/20 shadow-[8px_8px_0px_#000] dark:shadow-none">
         @if ($products->hasPages())
             <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center gap-1">
                 {{-- Previous Page Link --}}
                 @if ($products->onFirstPage())
                     <span
                         class="px-3 py-2 text-xs font-black opacity-30 cursor-not-allowed uppercase italic">Prev_</span>
                 @else
                     <a href="{{ $products->previousPageUrl() }}"
                         class="page-link px-3 py-2 text-xs font-black hover:bg-black hover:text-white dark:hover:bg-cyan-500 dark:hover:text-black uppercase italic transition-all">
                         Prev_
                     </a>
                 @endif

                 {{-- Pagination Elements (Numbers) --}}
                 <div class="hidden md:flex items-center gap-1">
                     @foreach ($products->links()->elements as $element)
                         @if (is_string($element))
                             <span class="px-3 py-2 text-gray-400">...</span>
                         @endif

                         @if (is_array($element))
                             @foreach ($element as $page => $url)
                                 <div class="page-item {{ $page == $products->currentPage() ? 'active' : '' }}">
                                     @if ($page == $products->currentPage())
                                         <span
                                             class="page-link block px-4 py-2 text-xs">{{ sprintf('%02d', $page) }}</span>
                                     @else
                                         <a href="{{ $url }}"
                                             class="page-link block px-4 py-2 text-xs">{{ sprintf('%02d', $page) }}</a>
                                     @endif
                                 </div>
                             @endforeach
                         @endif
                     @endforeach
                 </div>

                 {{-- Next Page Link --}}
                 @if ($products->hasMorePages())
                     <a href="{{ $products->nextPageUrl() }}"
                         class="page-link px-3 py-2 text-xs font-black hover:bg-black hover:text-white dark:hover:bg-purple-500 dark:hover:text-black uppercase italic transition-all">
                         Next_
                     </a>
                 @endif
             </nav>
         @endif
     </div>

     <div class="mt-2">
         <p class="text-[8px] font-mono text-gray-400 dark:text-gray-600 uppercase">
             Showing_Sector: {{ $products->firstItem() }} to {{ $products->lastItem() }} of {{ $products->total() }}
             units
         </p>
     </div>
 </div>

 @if (session('openModalId'))
     @php

         $clickedProduct = $products->firstWhere('id', session('openModalId'));
     @endphp

     @if ($clickedProduct)
         <script>
             document.addEventListener('DOMContentLoaded', function() {
                 openProductModal(
                     "{{ $clickedProduct->id }}",
                     "{{ addslashes($clickedProduct->nama) }}",
                     "{{ number_format($clickedProduct->harga, 0, ',', '.') }}",
                     "{{ asset('images/' . $clickedProduct->gambar) }}",
                     "{{ $clickedProduct->slug }}"
                 );
             });
         </script>
     @endif
 @endif

 @if (session('wa_link'))
     <div class="fixed bottom-10 right-10 z-[9999] animate-in fade-in slide-in-from-bottom-5 duration-500">
         <a href="{{ session('wa_link') }}" target="_blank"
             class="flex items-center gap-3 bg-[#22c55e] text-black px-6 py-4 font-black text-[11px] uppercase tracking-[0.2em] shadow-[0_0_30px_rgba(34,197,94,0.4)] hover:bg-white hover:scale-105 transition-all group">
             <span class="relative flex h-3 w-3">
                 <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-white opacity-75"></span>
                 <span class="relative inline-flex rounded-full h-3 w-3 bg-white"></span>
             </span>
             >> HUBUNGI_ADMIN_VIA_WA
         </a>
     </div>
 @endif

 @vite(['resources/js/product.js'])
