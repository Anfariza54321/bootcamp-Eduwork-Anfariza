<nav x-data="{ open: false }" class="bg-black/80 backdrop-blur-md border-b border-purple-500/30 shadow-[0_0_20px_rgba(168,85,247,0.2)] sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" class="relative group">
                        <div class="absolute inset-0 bg-cyan-500/20 blur-lg group-hover:bg-cyan-500/40 transition-all rounded-full"></div>
                        <x-application-logo class="relative block h-10 w-auto fill-current text-cyan-400 transform scale-110 drop-shadow-[0_0_8px_#06b6d4]" />
                    </a>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" 
                        class="text-xs uppercase tracking-[0.2em] font-black transition-all duration-300 {{ request()->routeIs('dashboard') ? 'text-cyan-400 shadow-[0_4px_0_-0px_#06b6d4]' : 'text-gray-500 hover:text-purple-400' }}">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    
                    <x-nav-link :href="route('produkAdmin')" :active="request()->routeIs('produkAdmin')"
                        class="text-xs uppercase tracking-[0.2em] font-black transition-all duration-300 {{ request()->routeIs('produkAdmin') ? 'text-cyan-400 shadow-[0_4px_0_-0px_#06b6d4]' : 'text-gray-500 hover:text-purple-400' }}">
                        {{ __('Products') }}
                    </x-nav-link>

                    <x-nav-link :href="route('merekAdmin')" :active="request()->routeIs('merekAdmin')"
                        class="text-xs uppercase tracking-[0.2em] font-black transition-all duration-300 {{ request()->routeIs('merekAdmin') ? 'text-cyan-400 shadow-[0_4px_0_-0px_#06b6d4]' : 'text-gray-500 hover:text-purple-400' }}">
                        {{ __('Brands') }}
                    </x-nav-link>
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-4 py-1 border border-cyan-500/30 text-xs leading-4 font-black rounded-full text-cyan-400 bg-cyan-500/10 hover:bg-cyan-500/20 hover:border-cyan-500 shadow-[0_0_10px_rgba(6,182,212,0.1)] focus:outline-none transition ease-in-out duration-150 uppercase tracking-widest">
                            <div class="flex items-center">
                                <span class="w-2 h-2 bg-green-500 rounded-full animate-pulse me-2"></span>
                                {{ Auth::user()->name }}
                            </div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <div class="bg-gray-900 border border-purple-500/50 rounded-md overflow-hidden shadow-[0_0_20px_rgba(168,85,247,0.3)]">
                            <x-dropdown-link :href="route('profile.edit')" class="text-xs uppercase font-bold text-gray-400 hover:bg-purple-500/20 hover:text-purple-400 transition-colors">
                                {{ __('User_Profile') }}
                            </x-dropdown-link>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                        class="text-xs uppercase font-bold text-red-500/70 hover:bg-red-500/20 hover:text-red-500 transition-colors"
                                        onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Terminate_Session') }}
                                </x-dropdown-link>
                            </form>
                        </div>
                    </x-slot>
                </x-dropdown>
            </div>

            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-cyan-400 hover:text-cyan-200 hover:bg-cyan-500/10 focus:outline-none transition duration-150 ease-in-out border border-cyan-500/20">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-gray-900/95 backdrop-blur-lg border-b border-purple-500/30">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-cyan-400 border-l-4 border-cyan-400 bg-cyan-500/10 font-black uppercase text-xs tracking-widest">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            </div>

        <div class="pt-4 pb-1 border-t border-purple-500/30">
            <div class="px-4">
                <div class="font-black text-sm text-purple-400 uppercase tracking-tighter">{{ Auth::user()->name }}</div>
                <div class="font-mono text-[10px] text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')" class="text-gray-400 uppercase text-[10px] font-bold">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                            class="text-red-500/70 uppercase text-[10px] font-bold"
                            onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>