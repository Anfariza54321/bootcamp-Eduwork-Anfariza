 <div class="mx-auto max-w-7xl px-4 2xl:px-0">
     <!-- Heading & Filters -->
     <div class="mb-4 items-end justify-between space-y-4 sm:flex sm:space-y-0 md:mb-8">
         <form action="{{ route('products.index') }}" method="GET" id="filterForm">
             <input type="hidden" name="q" value="{{ request('q') }}">
             <div class="flex items-center space-x-4">
                 <div class="relative">
                     <button onclick="toggleDropdown('filterModal')" type="button"
                         class="flex items-center justify-center rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm font-medium text-gray-900 hover:bg-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 sm:w-auto">
                         <svg class="-ms-0.5 me-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                             <path stroke-linecap="round" stroke-width="2"
                                 d="M18.796 4H5.204a1 1 0 0 0-.753 1.659l5.302 6.058a1 1 0 0 1 .247.659v4.874a.5.5 0 0 0 .2.4l3 2.25a.5.5 0 0 0 .8-.4v-7.124a1 1 0 0 1 .247-.659l5.302-6.059c.566-.646.106-1.658-.753-1.658Z" />
                         </svg>
                         Filters
                     </button>
                     <div id="filterModal"
                         class="absolute z-10 hidden w-48 mt-2 bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700">
                         <ul class="p-3 space-y-3 text-sm text-gray-700 dark:text-gray-200">
                             @php $brands = ['Nike', 'Adidas', 'Puma', 'Vans', 'Converse']; @endphp
                             @foreach ($brands as $brand)
                                 <li>
                                     <div class="flex items-center">
                                         <input id="brand-{{ $brand }}" name="brands[]" type="checkbox"
                                             value="{{ $brand }}"
                                             class="brand-filter w-4 h-4 text-blue-600 rounded">
                                         <label for="brand-{{ $brand }}"
                                             class="ms-2 text-sm font-medium">{{ $brand }}</label>
                                     </div>
                                 </li>
                             @endforeach
                         </ul>
                     </div>
                 </div>

                 <div class="relative">
                     <button onclick="toggleDropdown('dropdownSort1')" type="button"
                         class="flex items-center justify-center rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm font-medium text-gray-900 hover:bg-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 sm:w-auto">
                         <svg class="-ms-0.5 me-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                 d="M7 4v16M7 4l3 3M7 4 4 7m9-3h6l-6 6h6m-6.5 10 3.5-7 3.5 7M14 18h4" />
                         </svg>
                         Sort
                     </button>
                     <div id="dropdownSort1"
                         class="absolute z-10 hidden w-40 mt-2 bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700">
                         <ul class="p-3 space-y-1 text-sm text-gray-700 dark:text-gray-200">
                             <li>
                                 <label
                                     class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600 cursor-pointer">
                                     <input type="radio" name="sort" value="asc" class="w-4 h-4 text-blue-600">
                                     <span class="ms-2">Harga Terendah</span>
                                 </label>
                             </li>
                             <li>
                                 <label
                                     class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600 cursor-pointer">
                                     <input type="radio" name="sort" value="desc" class="w-4 h-4 text-blue-600">
                                     <span class="ms-2">Harga Tertinggi</span>
                                 </label>
                             </li>
                         </ul>
                     </div>
                 </div>
                 <div>
                     <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Terapkan Filter</button>
                 </div>
             </div>
         </form>
     </div>
     <div class=" mb-4 grid gap-4 sm:grid-cols-2 md:mb-8 lg:grid-cols-3 xl:grid-cols-4">
         @foreach ($products as $product)
             <div class="cursor-pointer product-item group flex flex-col h-full rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition-all hover:shadow-xl hover:-translate-y-1 dark:border-slate-700/50 dark:bg-slate-800/80 backdrop-blur-sm"
                 onclick="openProductModal('{{ $product['id'] }}', '{{ addslashes($product['nama']) }}', '{{ number_format($product['harga'], 0, ',', '.') }}', '{{ asset('storage/' . $product['gambar']) }}')">

                 <div class="relative h-52 w-full overflow-hidden rounded-xl bg-slate-50 dark:bg-slate-900/50">
                     <a href="javascript:void(0)" class="flex h-full items-center justify-center">
                         <img class="max-h-full max-w-full object-contain p-4 transition-transform duration-500 group-hover:scale-110"
                             src="{{ asset('images/' . $product['gambar']) }}" alt="{{ $product['nama'] }}" />
                     </a>
                     <span
                         class="product-item absolute top-3 left-3 rounded-full bg-linear-to-r from-blue-600 to-indigo-600 px-3 py-1 text-[10px] font-bold text-white shadow-lg uppercase tracking-wider">
                         {{ $product['merek'] }}
                     </span>
                 </div>

                 <div class="flex flex-col grow pt-5">
                     <div class="mb-2 flex items-center justify-between">
                         <div class="flex items-center gap-1.5 text-yellow-400">
                             <svg class="h-3.5 w-3.5 fill-current" viewBox="0 0 20 20">
                                 <path
                                     d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                             </svg>
                             <span class="text-xs font-bold text-slate-700 dark:text-slate-300">5.0</span>
                         </div>
                         <span class="text-[11px] font-medium text-slate-400 dark:text-slate-500 italic">Stok:
                             {{ $product['stok'] }} unit</span>
                     </div>

                     <a href="javascript:void(0)"
                         class="mb-2 block text-lg font-bold leading-tight text-gray-900 hover:text-blue-600 dark:text-white dark:hover:text-blue-400 transition-colors line-clamp-1">
                         {{ $product['nama'] }}
                     </a>

                     <p class="mb-5 font-normal text-sm text-gray-500 dark:text-gray-400 leading-relaxed line-clamp-2">
                         {{ $product['deskripsi'] }}
                     </p>

                     <div class="mt-auto border-t border-slate-100 pt-4 dark:border-slate-700/50">
                         <div class="mb-4">
                             <span
                                 class="text-[10px] font-bold uppercase tracking-widest text-blue-500 dark:text-blue-400">Harga
                                 Terbaik</span>
                             <p class="text-2xl font-black tracking-tight text-slate-900 dark:text-white">
                                 <span
                                     class="product-item mr-1 text-xl font-extrabold text-blue-600">Rp</span>{{ number_format($product['harga'], 0, ',', '.') }}
                             </p>
                         </div>

                         <div class="flex gap-2">
                             <button type="button" onclick="stopPropagation();"
                                 onclick="openProductModal('{{ $product['id'] }}', '{{ addslashes($product['nama']) }}', '{{ number_format($product['harga'], 0, ',', '.') }}', '{{ asset('images/' . $product['gambar']) }}')"
                                 class="flex h-11 w-11 items-center justify-center rounded-xl border-2 border-slate-200 text-slate-600 transition-all hover:bg-slate-50 hover:border-blue-500 hover:text-blue-600 dark:border-slate-600 dark:text-slate-400 dark:hover:bg-slate-700 dark:hover:text-blue-400">
                                 <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2"
                                     viewBox="0 0 24 24">
                                     <path
                                         d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                 </svg>
                             </button>

                             <button
                                 class="grow rounded-xl bg-linear-to-r from-blue-600 to-indigo-700 py-2.5 text-sm font-bold text-white shadow-md shadow-blue-500/20 transition-all hover:from-blue-700 hover:to-indigo-800 active:scale-[0.98]">
                                 Beli Sekarang
                             </button>
                         </div>
                     </div>
                 </div>
             </div>
         @endforeach
     </div>
     <div class="w-full text-center">
         <button type="button"
             class="rounded-lg border border-gray-200 bg-white px-5 py-2.5 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700">Show
             more</button>
     </div>
 </div>

 {{-- product detail --}}
 <div id="product-modal" tabindex="-1" aria-hidden="true"
     class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full bg-gray-900/50 backdrop-blur-sm">
     <div class="relative p-4 w-full max-w-4xl max-h-full">
         <div
             class="relative bg-white rounded-2xl shadow-xl dark:bg-gray-900 border border-gray-200 dark:border-gray-800">
             <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-800">
                 <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                     Product Detail
                 </h3>
                 <button type="button" onclick="closeModal()"
                     class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                     <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                         viewBox="0 0 14 14">
                         <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                             d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                     </svg>
                     <span class="sr-only">Close modal</span>
                 </button>
             </div>

             <div class="p-4 md:p-8">
                 <div class="lg:grid lg:grid-cols-2 lg:gap-8">
                     <div class="shrink-0 max-w-md mx-auto">
                         <img id="modal-img" class="w-full rounded-xl" src="" alt="" />
                     </div>

                     <div class="mt-6 lg:mt-0">
                         <h1 id="modal-title"
                             class="text-2xl font-bold font-sans text-gray-900 dark:text-white leading-tight">
                         </h1>

                         <div class="mt-4 flex items-center gap-4">
                             <p id="modal-price" class="text-3xl font-extrabold text-blue-600 dark:text-blue-400">
                             </p>
                         </div>

                         <div class="mt-6 flex gap-4">
                             @csrf
                             <form id="add-to-cart-form" method="POST" action="">
                                 <input type="hidden" name="nama" id="modal-hidden-nama">
                                 <input type="hidden" name="harga" id="modal-hidden-harga">
                                 <input type="hidden" name="gambar" id="modal-hidden-gambar">

                                 <button type="submit"
                                     class="text-white bg-blue-600 hover:bg-blue-700 font-bold rounded-xl text-sm px-6 py-3 flex items-center transition-all hover:scale-105">
                                     <svg class="w-5 h-5 me-2" fill="none" stroke="currentColor"
                                         viewBox="0 0 24 24">
                                         <path stroke-width="2"
                                             d="M4 4h1.5L8 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm.75-3H7.5M11 7H6.312M17 4v6m-3-3h6" />
                                     </svg>
                                     Add to Cart
                                 </button>
                             </form>
                         </div>

                         <hr class="my-6 border-gray-200 dark:border-gray-800" />
                         <p class="text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                             Nikmati kenyamanan maksimal dengan koleksi sepatu eksklusif kami. Didesain untuk performa
                             dan gaya Cyberpunk yang modern.
                         </p>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
 
@vite(['resources/js/product.js'])