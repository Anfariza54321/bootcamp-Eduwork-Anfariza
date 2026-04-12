<x-guest-layout>
    <div class="mb-4 font-mono text-xs tracking-tight text-cyan-500/80 bg-cyan-500/5 p-3 border-l-2 border-cyan-500">
    <span class="font-bold text-cyan-400">//_SYSTEM_MESSAGE:</span> 
    {{ __('Forgot your encryption key? No problem. Provide your registered identity, and we will dispatch a reset protocol to your terminal.') }}
</div>

<x-auth-session-status class="mb-4 font-mono text-xs text-green-400 bg-green-500/10 p-2 border border-green-500/50 shadow-[0_0_10px_rgba(74,222,128,0.2)]" :status="session('status')" />

<form method="POST" action="{{ route('password.email') }}" class="space-y-6">
    @csrf

    <div>
        <x-input-label for="email" :value="__('RECOVERY_TARGET_ID')" 
            class="text-cyan-400 font-mono tracking-widest text-xs uppercase" />
        
        <x-text-input id="email" 
            class="block mt-1 w-full bg-black/40 border-cyan-500/50 text-cyan-100 focus:border-cyan-400 focus:ring focus:ring-cyan-400/30 placeholder-cyan-900 font-mono" 
            type="email" name="email" :value="old('email')" 
            required autofocus 
            placeholder="USER@CONTOH.COM" />
        
        <x-input-error :messages="$errors->get('email')" class="mt-2 text-pink-500 text-xs italic font-mono" />
    </div>

    <div class="flex items-center justify-end mt-6">
        <button type="submit" 
            class="w-full py-3 bg-transparent border-2 border-purple-600 text-purple-400 font-mono font-bold uppercase tracking-[0.1em] 
                   hover:bg-purple-600 hover:text-white hover:shadow-[0_0_20px_rgba(168,85,247,0.6)] 
                   active:scale-95 transition-all duration-300
                   relative overflow-hidden group">
            
            <span class="absolute top-0 right-0 w-2 h-2 border-t-2 border-r-2 border-white opacity-0 group-hover:opacity-100"></span>
            
            {{ __('DISPATCH_RESET_PROTOCOL') }}
        </button>
    </div>
</form>
</x-guest-layout>
