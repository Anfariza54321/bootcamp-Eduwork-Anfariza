<x-guest-layout>
    <form method="POST" action="{{ route('password.store') }}" class="space-y-5">
    @csrf

    <input type="hidden" name="token" value="{{ $request->route('token') }}">

    <div>
        <x-input-label for="email" :value="__('RECOVERY_TARGET_ID')" 
            class="text-cyan-400 font-mono tracking-widest text-xs uppercase" />
        <x-text-input id="email" 
            class="block mt-1 w-full bg-black/40 border-cyan-500/50 text-cyan-100 focus:border-cyan-400 focus:ring focus:ring-cyan-400/30 placeholder-cyan-900 font-mono" 
            type="email" name="email" :value="old('email', $request->email)" 
            required autofocus autocomplete="username" />
        <x-input-error :messages="$errors->get('email')" class="mt-2 text-pink-500 text-xs italic font-mono" />
    </div>

    <div class="mt-4">
        <x-input-label for="password" :value="__('NEW_ENCRYPTION_KEY')" 
            class="text-purple-400 font-mono tracking-widest text-xs uppercase" />
        <x-text-input id="password" 
            class="block mt-1 w-full bg-black/40 border-purple-500/50 text-purple-100 focus:border-purple-400 focus:ring focus:ring-purple-400/30 placeholder-purple-900 font-mono" 
            type="password" name="password" 
            required autocomplete="new-password" 
            placeholder="SECURE_KEY_REQUIRED" />
        <x-input-error :messages="$errors->get('password')" class="mt-2 text-pink-500 text-xs italic font-mono" />
    </div>

    <div class="mt-4">
        <x-input-label for="password_confirmation" :value="__('VERIFY_NEW_KEY')" 
            class="text-purple-400 font-mono tracking-widest text-xs uppercase" />

        <x-text-input id="password_confirmation" 
            class="block mt-1 w-full bg-black/40 border-purple-500/50 text-purple-100 focus:border-purple-400 focus:ring focus:ring-purple-400/30 placeholder-purple-900 font-mono"
            type="password"
            name="password_confirmation" required autocomplete="new-password" 
            placeholder="REPEAT_NEW_KEY" />

        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-pink-500 text-xs italic font-mono" />
    </div>

    <div class="flex items-center justify-end mt-8">
        <button type="submit" 
            class="w-full py-3 bg-transparent border-2 border-cyan-500 text-cyan-400 font-mono font-bold uppercase tracking-[0.2em] 
                   hover:bg-cyan-500 hover:text-black hover:shadow-[0_0_20px_rgba(6,182,212,0.8)] 
                   active:scale-95 transition-all duration-300
                   relative overflow-hidden group">
            
            <span class="absolute top-0 left-0 w-2 h-2 border-t-2 border-l-2 border-white opacity-0 group-hover:opacity-100"></span>
            
            {{ __('EXECUTE_OVERRIDE') }}
        </button>
    </div>
</form>
</x-guest-layout>
