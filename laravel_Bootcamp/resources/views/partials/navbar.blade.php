<!-- Include this script tag or install `@tailwindplus/elements` via npm: -->

<div class="bg-white text-sm font-semibold tracking-wide uppercase dark:bg-gray-800">
    <!-- Mobile menu -->
    <el-dialog>
        <dialog id="mobile-menu" class="backdrop:bg-transparent lg:hidden">
            <el-dialog-backdrop
                class="fixed inset-0 bg-black/60 backdrop-blur-sm transition-opacity duration-300 ease-linear data-closed:opacity-0"></el-dialog-backdrop>
            <div tabindex="0" class="fixed inset-0 flex focus:outline-none">
                <el-dialog-panel
                    class="relative flex w-full max-w-xs transform flex-col overflow-y-auto bg-white dark:bg-gray-800 pb-12 shadow-xl transition duration-300 ease-in-out data-closed:-translate-x-full">

                    <div class="flex px-4 pt-5 pb-2">
                        <button type="button" command="close" commandfor="mobile-menu"
                            class="relative -m-2 inline-flex items-center justify-center rounded-md p-2 text-gray-400">
                            <span class="sr-only">Close menu</span>
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                class="size-6">
                                <path d="M6 18 18 6M6 6l12 12" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </button>
                    </div>

                    <div class="px-4 pt-4 pb-6">
                        <p class="text-xs font-semibold uppercase tracking-widest text-gray-400 dark:text-gray-500">
                            Merek Sepatu</p>
                        <ul role="list" class="mt-6 flex flex-col space-y-6">
                            <li class="flow-root">
                                <a href="#"
                                    class="-m-2 block p-2 font-medium text-gray-900 dark:text-white hover:text-blue-600">Nike</a>
                            </li>
                            <li class="flow-root">
                                <a href="#"
                                    class="-m-2 block p-2 font-medium text-gray-900 dark:text-white hover:text-blue-600">Adidas</a>
                            </li>
                            <li class="flow-root">
                                <a href="#"
                                    class="-m-2 block p-2 font-medium text-gray-900 dark:text-white hover:text-blue-600">New
                                    Balance</a>
                            </li>
                            <li class="flow-root">
                                <a href="#"
                                    class="-m-2 block p-2 font-medium text-gray-900 dark:text-white hover:text-blue-600">Puma</a>
                            </li>
                            <li class="flow-root">
                                <a href="#"
                                    class="-m-2 block p-2 font-medium text-gray-900 dark:text-white hover:text-blue-600">Converse</a>
                            </li>
                            <li class="flow-root">
                                <a href="#"
                                    class="-m-2 block p-2 font-medium text-gray-900 dark:text-white hover:text-blue-600">Vans</a>
                            </li>
                        </ul>
                    </div>

                    <div class="space-y-6 border-t border-gray-200 dark:border-gray-700 px-4 py-6">
                        <div class="flow-root">
                            <a href="#" class="-m-2 block p-2 font-medium text-gray-900 dark:text-white">Tentang
                                Kami</a>
                        </div>
                        <div class="flow-root">
                            <a href="#" class="-m-2 block p-2 font-medium text-gray-900 dark:text-white">Lokasi
                                Toko</a>
                        </div>
                    </div>

                    <div class="mt-auto space-y-6 border-t border-gray-200 dark:border-gray-700 px-4 py-6">
                        <div class="flex flex-col space-y-4">
                            <a href="#" class="font-medium text-gray-900 dark:text-white">Masuk</a>
                            <a href="#" class="font-medium text-blue-600">Daftar Sekarang</a>
                        </div>

                        <div class="pt-4">
                            <a href="#" class="-m-2 flex items-center p-2">
                                <svg class="h-auto w-5 shrink-0" viewBox="0 0 20 15" fill="none">
                                    <rect width="20" height="15" fill="white" rx="2" />
                                    <path d="M0 0H20V7.5H0V0Z" fill="#E12127" />
                                </svg>
                                <span class="ml-3 block text-base font-medium text-gray-900 dark:text-white">IDR</span>
                            </a>
                        </div>
                    </div>

                </el-dialog-panel>
            </div>
        </dialog>
    </el-dialog>

    <header class="relative text-sm font-semibold tracking-wide uppercase bg-white dark:bg-gray-800">
        <p
            class="flex h-10 items-center justify-center bg-indigo-600 px-4 text-sm font-medium text-white sm:px-6 lg:px-8">
            Get free delivery on orders over $100</p>

        <nav aria-label="Top" class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="border-b border-gray-200 dark:border-gray-700">
                <div class="flex h-16 items-center">
                    <button type="button" command="show-modal" commandfor="mobile-menu"
                        class="relative rounded-md bg-white dark:bg-gray-800 p-2 text-gray-400 lg:hidden">
                        <span class="absolute -inset-0.5"></span>
                        <span class="sr-only">Open menu</span>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                            data-slot="icon" aria-hidden="true" class="size-6">
                            <path d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </button>

                    <!-- Logo -->
                    <div class="ml-4 flex lg:ml-0">
                        <a href="#">
                            <span class="sr-only">Your Company</span>
                            <img src="{{ asset("images/logo_anfariza'SS.webp") }}" class="w-12 h-12" alt="" />
                        </a>
                    </div>

                    <!-- Flyout menus -->
                    <el-popover-group class="group/popover-group hidden lg:ml-8 lg:block lg:self-stretch">
                        <div class="flex h-full space-x-8">


                            <a href="/"
                                class="flex items-center text-sm font-medium transition-colors 
            {{ request()->is('/') ? 'text-blue-500 drop-shadow-[0_0_5px_rgba(59,130,246,0.5)] dark:text-blue-400 border-b-2 border-blue-600' : 'text-gray-700 dark:text-gray-300 hover:text-gray-800 dark:hover:text-white' }}">
                                Home
                            </a>


                            <a href="/products"
                                class="flex items-center text-sm font-medium transition-colors 
            {{ request()->is('products*') ? 'text-blue-500 drop-shadow-[0_0_5px_rgba(59,130,246,0.5)] dark:text-blue-400 border-b-2 border-blue-600' : 'text-gray-700 dark:text-gray-300 hover:text-gray-800 dark:hover:text-white' }}">
                                Product
                            </a>

                        </div>
                    </el-popover-group>

                    <!-- Search -->
                    <form action="/products" method="GET" class="flex items-center">
                        <input type="text" name="q" value="{{ request('q') }}"
                            placeholder="Search shoes..."
                            class="hidden lg:block border rounded-md px-3 py-1 text-sm mr-2 dark:bg-gray-800 dark:text-white ml-5" />
                        <button type="submit" class="p-2 text-gray-400 hover:text-gray-500">
                            <span class="sr-only">Search</span>
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                class="size-6">
                                <path d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </button>
                    </form>

                    <div class="ml-auto flex items-center">
                        <div class="hidden lg:flex lg:flex-1 lg:items-center lg:justify-end lg:space-x-6 mr-4">
                            <a href="#"
                                class="text-sm font-medium text-gray-700 dark:text-gray-300 hover:text-gray-800 dark:hover:text-white">Sign
                                in</a>
                            <span aria-hidden="true" class="h-6 w-px bg-gray-200"></span>
                            <a href="#"
                                class="text-sm font-medium text-gray-700 dark:text-gray-300 hover:text-gray-800 dark:hover:text-white">Create
                                account</a>
                        </div>



                        <button onclick="toggleDarkMode()"
                            class="ml-4 p-2 rounded-lg bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-white hover:bg-gray-300 dark:hover:bg-gray-600 transition-all flex items-center justify-center w-10 h-10">

                            <span class="material-symbols-outlined block dark:hidden!">
                                dark_mode
                            </span>

                            <span class="material-symbols-outlined hidden! dark:block!">
                                light_mode
                            </span>
                        </button>

                        <!-- Cart -->
                        <div class="ml-4 flow-root lg:ml-6">
                            <a href="/cart" class="group -m-2 flex items-center p-2">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                    data-slot="icon" aria-hidden="true"
                                    class="size-6 shrink-0 text-gray-400 group-hover:text-gray-500">
                                    <path
                                        d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <span id="cart-count"
                                    class="ml-2 text-sm font-medium text-gray-700 dark:text-white group-hover:text-gray-800">
                                    {{ session('cart') ? array_sum(array_column(session('cart'), 'quantity')) : 0 }}
                                </span>
                                <span class="sr-only">items in cart, view bag</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>
</div>

@if (session('order_success'))
    <div id="alert-success" class="mx-auto max-w-7xl px-4 mt-4">
        <div class="flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 border border-green-200 shadow-md"
            role="alert">
            <svg class="shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
            </svg>
            <div class="ms-3 text-sm font-medium">
                {{ session('order_success') }}
            </div>
            <button type="button"
                class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"
                onclick="this.parentElement.style.display='none'">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button>
        </div>
    </div>
@endif

<script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module"></script>

<script>
    function toggleDarkMode() {
        document.documentElement.classList.toggle('dark');
        if (document.documentElement.classList.contains('dark')) {
            localStorage.setItem('theme', 'dark');
        } else {
            localStorage.setItem('theme', 'light');
        }
    }

    // Skrip ini untuk menjaga tema tetap aktif saat halaman direfresh
    if (localStorage.getItem('theme') === 'dark' ||
        (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        document.documentElement.classList.add('dark');
    } else {
        document.documentElement.classList.remove('dark');
    }

    function addToCart(productId) {
        fetch(`/add-to-cart/${productId}`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                // 'data.total_items' adalah jumlah baru yang dikirim balik oleh Controller
                document.getElementById('cart-count').innerText = data.total_items;

                // Opsional: Tampilkan notifikasi sukses
                alert('Produk berhasil ditambahkan!');
            });
    }
</script>
