<!-- Include this script tag or install `@tailwindplus/elements` via npm: -->

<div class="bg-white text-sm font-semibold tracking-wide uppercase dark:bg-black transition-colors duration-300">
    <el-dialog>
        <dialog id="mobile-menu" class="backdrop:bg-transparent lg:hidden">
            <el-dialog-backdrop class="fixed inset-0 bg-black/60 backdrop-blur-sm transition-opacity duration-300 ease-linear data-closed:opacity-0"></el-dialog-backdrop>
            <div tabindex="0" class="fixed inset-0 flex focus:outline-none">
                <el-dialog-panel class="relative flex w-full max-w-xs transform flex-col overflow-y-auto bg-white dark:bg-gray-900 pb-12 shadow-xl transition duration-300 ease-in-out data-closed:-translate-x-full border-r dark:border-cyan-500/20">
                    
                    <div class="flex px-4 pt-5 pb-2">
                        <button type="button" command="close" commandfor="mobile-menu" class="relative -m-2 inline-flex items-center justify-center rounded-md p-2 text-gray-400">
                            <span class="sr-only">Close menu</span>
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="size-6"><path d="M6 18 18 6M6 6l12 12" stroke-linecap="round" stroke-linejoin="round" /></svg>
                        </button>
                    </div>

                    <div class="px-4 pt-4 pb-6">
                        <p class="text-[10px] font-black uppercase tracking-[0.2em] text-gray-400 dark:text-purple-500 italic">Brands_Protocol</p>
                        <ul role="list" class="mt-6 flex flex-col space-y-6">
                            @foreach(['Nike', 'Adidas', 'New Balance', 'Puma', 'Converse', 'Vans'] as $brand)
                                <li class="flow-root">
                                    <a href="#" class="-m-2 block p-2 font-bold text-gray-900 dark:text-gray-300 hover:text-cyan-500 transition-colors uppercase italic">{{ $brand }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="mt-auto space-y-6 border-t border-gray-200 dark:border-gray-800 px-4 py-6">
                        <div class="flex flex-col space-y-4">
                            @auth
                                <div class="py-2 border-b border-gray-100 dark:border-gray-800">
                                    <p class="text-[9px] font-mono text-cyan-500 uppercase leading-none">Logged_As:</p>
                                    <p class="text-sm font-black text-gray-900 dark:text-white">{{ Auth::user()->name }}</p>
                                </div>
                                <a href="{{ route('admin.dashboard') }}" class="font-black text-gray-900 dark:text-white uppercase tracking-tighter">Admin_Dashboard</a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="font-black text-red-600 uppercase tracking-tighter w-full text-left">Terminate_Session</button>
                                </form>
                            @else
                                <a href="{{ route('login') }}" class="font-black text-gray-900 dark:text-white uppercase tracking-tighter">Sign_In</a>
                                <a href="{{ route('register') }}" class="font-black text-cyan-600 dark:text-cyan-400 uppercase tracking-tighter">Register</a>
                            @endauth
                        </div>
                    </div>
                </el-dialog-panel>
            </div>
        </dialog>
    </el-dialog>

    <header class="relative text-sm font-semibold tracking-wide uppercase bg-white dark:bg-black border-b border-gray-100 dark:border-cyan-500/20">
        <p class="flex h-10 items-center justify-center bg-gradient-to-r from-purple-700 via-indigo-600 to-cyan-500 px-4 text-[10px] font-black text-white sm:px-6 lg:px-8 italic tracking-[0.1em] shadow-lg">
            [ SYSTEM_STATUS: ONLINE // FREE_DELIVERY_OVER_$100 ]
        </p>

        <nav aria-label="Top" class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <div class="flex h-16 items-center">
        <button type="button" command="show-modal" commandfor="mobile-menu"
            class="relative rounded-md p-2 text-gray-400 lg:hidden">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="size-6">
                <path d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </button>

        <div class="ml-4 flex lg:ml-0 group">
            <a href="/" class="relative">
                <div
                    class="absolute -inset-1 bg-cyan-500 rounded-full blur opacity-0 dark:opacity-20 group-hover:opacity-50 transition duration-500">
                </div>
                <img src="{{ asset("images/logo_anfariza'SS.webp") }}" class="relative w-12 h-12 grayscale dark:grayscale-0"
                    alt="Logo" />
            </a>
        </div>

        <div class="hidden lg:ml-8 lg:block lg:self-stretch">
            <div class="flex h-full space-x-8">
                <a href="/"
                    class="flex items-center text-[11px] font-black transition-all tracking-widest
                    {{ request()->is('/') ? 'text-cyan-600 dark:text-cyan-400 border-b-2 border-cyan-500' : 'text-gray-500 dark:text-gray-400 hover:text-purple-500' }}">
                    HOME_
                </a>
                <a href="/products"
                    class="flex items-center text-[11px] font-black transition-all tracking-widest
                    {{ request()->is('products*') ? 'text-cyan-600 dark:text-cyan-400 border-b-2 border-cyan-500' : 'text-gray-500 dark:text-gray-400 hover:text-purple-500' }}">
                    PRODUCTS_
                </a>

                @auth
                    @if (Auth::user()->role === 'admin')
                        <a href="{{ route('admin.dashboard') }}"
                            class="flex items-center text-[11px] font-black transition-all tracking-widest text-purple-600 dark:text-purple-400 hover:text-cyan-500 group relative">
                            <span class="absolute -top-1 -right-2 text-[7px] text-cyan-500 opacity-70">ROOT</span>
                            DASHBOARD_
                        </a>
                    @endif
                @endauth
            </div>
        </div>

        <form action="/products" method="GET" class="flex items-center ml-auto">
            <div class="relative hidden lg:block group">
                <input type="text" name="q" value="{{ request('q') }}" placeholder="SEARCH_GEAR..."
                    class="bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-purple-500/30 rounded-none px-3 py-1 text-[10px] text-gray-800 dark:text-cyan-400 focus:border-cyan-500 focus:ring-0 placeholder-gray-400 transition-all w-48 font-mono">
            </div>
            <button type="submit" class="p-2 text-gray-400 dark:text-purple-400 hover:text-cyan-500 transition-colors">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="size-5">
                    <path d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"
                        stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </button>
        </form>

        <div class="ml-4 flex items-center">
            <div class="hidden lg:flex lg:items-center lg:space-x-6 mr-4 border-r dark:border-gray-800 pr-4">
                @auth
                    <div class="text-right flex flex-col items-end">
                        <p class="text-[8px] font-mono text-purple-600 dark:text-purple-400 leading-none uppercase">
                            {{ Auth::user()->role }}_OK</p>
                        <p class="text-[10px] font-black text-gray-900 dark:text-white italic tracking-widest uppercase">
                            {{ Auth::user()->name }}</p>
                    </div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="text-[10px] font-black text-red-600 dark:text-cyan-400 hover:bg-red-50 dark:hover:bg-cyan-500/10 px-2 py-1 transition-all">LOG OUT_</button>
                    </form>
                @else
                    <a href="{{ route('login') }}"
                        class="text-[10px] font-black text-gray-700 dark:text-gray-300 hover:text-cyan-500">SIGN_IN</a>
                    <a href="{{ route('register') }}"
                        class="text-[10px] font-black text-gray-700 dark:text-gray-300 hover:text-purple-500">REGISTER_</a>
                @endauth
            </div>

            <button onclick="toggleDarkMode()"
    class="relative p-2 rounded-lg bg-gray-50 dark:bg-gray-900 text-gray-500 dark:text-cyan-400 border border-gray-200 dark:border-cyan-500/20 hover:border-cyan-500 transition-all w-10 h-10 flex items-center justify-center overflow-hidden">
    
    <span class="material-symbols-outlined !hidden dark:!block">
        light_mode
    </span>

    <span class="material-symbols-outlined !block dark:!hidden">
        dark_mode
    </span>
</button>

            <div class="ml-4 flow-root group relative">
                <a href="/cart" class="-m-2 flex items-center p-2">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                        class="size-6 text-gray-400 group-hover:text-cyan-500 transition-colors">
                        <path
                            d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <span id="cart-count"
                        class="absolute -top-1 -right-1 flex h-4 w-4 items-center justify-center rounded-full bg-purple-600 text-[9px] font-bold text-white shadow-lg dark:shadow-[0_0_8px_#a855f7]">
                        {{ session('cart') ? array_sum(array_column(session('cart'), 'quantity')) : 0 }}
                    </span>
                </a>
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
    const html = document.documentElement;
    html.classList.toggle('dark');
    
    if (html.classList.contains('dark')) {
        localStorage.setItem('theme', 'dark');
    } else {
        localStorage.setItem('theme', 'light');
    }
}

// Inisialisasi tema saat halaman dimuat (taruh di Head agar tidak flicker)
(function() {
    const theme = localStorage.getItem('theme');
    const isDark = theme === 'dark' || (!theme && window.matchMedia('(prefers-color-scheme: dark)').matches);
    
    if (isDark) {
        document.documentElement.classList.add('dark');
    } else {
        document.documentElement.classList.remove('dark');
    }
})();

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
