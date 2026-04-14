<nav x-data="{ open: false }"
    class="bg-black/90 backdrop-blur-xl border-b border-purple-500/30 shadow-[0_0_20px_rgba(168,85,247,0.2)] sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center overflow-hidden">
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('admin.dashboard') }}" class="relative group">
                        <div class="absolute inset-0 bg-cyan-500/20 blur-lg group-hover:bg-cyan-500/40 transition-all rounded-full"></div>
                        <x-application-logo class="relative block h-8 w-auto fill-current text-cyan-400 transform scale-110 drop-shadow-[0_0_8px_#06b6d4]" />
                    </a>
                </div>

                <div class="hidden lg:flex lg:space-x-4 xl:space-x-8 lg:ms-10 h-full">
                    @php
                        $navLinks = [
                            ['route' => 'admin.dashboard', 'label' => 'Dashboard', 'active' => 'admin.dashboard'],
                            ['route' => 'produkAdmin', 'label' => 'Products', 'active' => 'produkAdmin'],
                            ['route' => 'merekAdmin', 'label' => 'Brands', 'active' => 'merekAdmin'],
                            ['route' => 'admin.orders.history', 'label' => 'History', 'active' => 'admin.orders.history'],
                            ['route' => 'home', 'label' => 'Home', 'active' => 'home'],
                        ];
                    @endphp

                    @foreach($navLinks as $link)
                        <x-nav-link :href="route($link['route'])" :active="request()->routeIs($link['active'])"
                            class="inline-flex items-center text-[10px] xl:text-xs uppercase tracking-[0.15em] font-black transition-all duration-300 {{ request()->routeIs($link['active']) ? 'text-white border-b-2 border-cyan-400' : 'text-gray-500 hover:text-purple-400 border-b-2 border-transparent' }}">
                            {{ __($link['label']) }}
                        </x-nav-link>
                    @endforeach
                </div>
            </div>

            <div class="hidden lg:flex lg:items-center">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-4 py-1 border border-cyan-500/30 text-[10px] font-black rounded-full text-cyan-400 bg-cyan-500/10 hover:bg-cyan-500/20 hover:border-cyan-500 shadow-[0_0_10px_rgba(6,182,212,0.1)] focus:outline-none transition duration-150 uppercase tracking-widest">
                            <span class="w-2 h-2 bg-green-500 rounded-full animate-pulse me-2"></span>
                            <span class="truncate max-w-[100px]">{{ Auth::user()->name }}</span>
                            <svg class="ms-2 fill-current h-4 w-4" viewBox="0 0 20 20"><path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" /></svg>
                        </button>
                    </x-slot>
                    <x-slot name="content">
                        <div class="bg-gray-950 border border-purple-500/50 rounded-none overflow-hidden shadow-[0_0_20px_rgba(168,85,247,0.3)]">
                            <x-dropdown-link :href="route('profile.edit')" class="text-[10px] uppercase font-bold text-gray-400 hover:bg-purple-500/20 hover:text-purple-400">
                                {{ __('//_User_Profile') }}
                            </x-dropdown-link>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')" class="text-[10px] uppercase font-bold text-red-500/70 hover:bg-red-500/20 hover:text-red-500" onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('//_Log_Out') }}
                                </x-dropdown-link>
                            </form>
                        </div>
                    </x-slot>
                </x-dropdown>
            </div>

            <div class="flex items-center lg:hidden">
                <button @click="open = ! open" class="p-2 rounded-md text-cyan-400 hover:bg-cyan-500/10 border border-cyan-500/20 transition duration-150">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div x-show="open" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 -translate-y-4" x-transition:enter-end="opacity-100 translate-y-0"
        class="lg:hidden bg-black/95 border-b border-purple-500/30 font-mono">
        <div class="pt-2 pb-3 space-y-1">
            @foreach($navLinks as $link)
                <x-responsive-nav-link :href="route($link['route'])" :active="request()->routeIs($link['active'])"
                    class="block pl-3 pr-4 py-2 border-l-4 text-xs font-black uppercase tracking-widest {{ request()->routeIs($link['active']) ? 'border-cyan-400 text-cyan-400 bg-cyan-400/10' : 'border-transparent text-gray-500 hover:text-purple-400 hover:bg-purple-400/5' }}">
                    {{ __($link['label']) }}
                </x-responsive-nav-link>
            @endforeach
        </div>

        <div class="pt-4 pb-1 border-t border-purple-500/30 bg-purple-900/10">
            <div class="px-4 flex items-center justify-between">
                <div>
                    <div class="font-black text-xs text-purple-400 uppercase tracking-tighter">{{ Auth::user()->name }}</div>
                    <div class="font-mono text-[9px] text-gray-600">{{ Auth::user()->email }}</div>
                </div>
                <span class="w-2 h-2 bg-green-500 rounded-full shadow-[0_0_8px_#22c55e]"></span>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')" class="text-gray-400 uppercase text-[10px] font-bold">
                    {{ __('> Edit_Profile') }}
                </x-responsive-nav-link>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')" class="text-red-500/70 uppercase text-[10px] font-bold" onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('> Abort_Session') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>