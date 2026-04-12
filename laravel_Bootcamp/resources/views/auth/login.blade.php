<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-6">
    @csrf

    <div>
        <x-input-label for="email" :value="__('EMAIL_ADDRESS')" 
            class="text-cyan-400 font-mono tracking-widest text-xs uppercase" />
        
        <x-text-input id="email" 
            class="block mt-1 w-full bg-black/40 border-cyan-500/50 text-cyan-100 focus:border-cyan-400 focus:ring focus:ring-cyan-400/30 placeholder-cyan-900 font-mono" 
            type="email" name="email" :value="old('email')" 
            required autofocus autocomplete="username" 
            placeholder="ACCESS_IDENTITY" />
        
        <x-input-error :messages="$errors->get('email')" class="mt-2 text-pink-500 text-xs italic" />
    </div>

    <div class="mt-4">
        <x-input-label for="password" :value="__('ENCRYPTION_KEY')" 
            class="text-purple-400 font-mono tracking-widest text-xs uppercase" />

        <x-text-input id="password" 
            class="block mt-1 w-full bg-black/40 border-purple-500/50 text-purple-100 focus:border-purple-400 focus:ring focus:ring-purple-400/30 placeholder-purple-900 font-mono"
            type="password"
            name="password"
            required autocomplete="current-password" 
            placeholder="********" />

        <x-input-error :messages="$errors->get('password')" class="mt-2 text-pink-500 text-xs italic" />
    </div>

    <div class="flex items-center justify-between mt-4">
        <label for="remember_me" class="inline-flex items-center cursor-pointer group">
            <input id="remember_me" type="checkbox" 
                class="rounded bg-gray-900 border-cyan-500/50 text-cyan-500 shadow-sm focus:ring-cyan-500/50 focus:ring-offset-gray-900" 
                name="remember">
            <span class="ms-2 text-xs font-mono text-cyan-500/70 group-hover:text-cyan-400 transition-colors">
                {{ __('KEEP_SESSION_ACTIVE') }}
            </span>
        </label>

        @if (Route::has('password.request'))
            <a class="text-xs font-mono text-purple-500/70 hover:text-purple-400 underline decoration-purple-500/30 underline-offset-4 transition-all" 
               href="{{ route('password.request') }}">
                {{ __('FORGET_KEY?') }}
            </a>
        @endif
    </div>

    <div class="flex flex-col mt-6">
        <button type="submit" 
            class="w-full py-3 bg-transparent border-2 border-cyan-500 text-cyan-400 font-mono font-bold uppercase tracking-[0.2em] 
                   hover:bg-cyan-500 hover:text-black hover:shadow-[0_0_20px_rgba(6,182,212,0.8)] 
                   active:scale-95 transition-all duration-300
                   relative overflow-hidden group">
            
            <span class="absolute top-0 left-0 w-2 h-2 border-t-2 border-l-2 border-white opacity-0 group-hover:opacity-100"></span>
            <span class="absolute bottom-0 right-0 w-2 h-2 border-b-2 border-r-2 border-white opacity-0 group-hover:opacity-100"></span>
            
            {{ __('INITIALIZE_LOGIN') }}
        </button>
    </div>
</form>
</x-guest-layout>
