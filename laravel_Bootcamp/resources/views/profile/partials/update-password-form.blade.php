<section class="space-y-6">
    <header class="border-l-4 border-purple-500 pl-4 bg-purple-500/5 py-2">
        <h2 class="text-lg font-mono font-bold text-purple-400 uppercase tracking-widest">
            {{ __('//_KEY_REGEN_PROTOCOL') }}
        </h2>

        <p class="mt-1 text-xs font-mono text-gray-400 uppercase tracking-tighter">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <x-input-label for="update_password_current_password" :value="__('EXISTING_ENCRYPTION_KEY')" 
                class="text-cyan-400 font-mono text-xs uppercase" />
            <x-text-input id="update_password_current_password" name="current_password" type="password" 
                class="mt-1 block w-full bg-black/40 border-cyan-500/50 text-cyan-100 focus:border-cyan-400" 
                autocomplete="current-password" 
                placeholder="********" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2 text-pink-500 text-xs italic" />
        </div>

        <div>
            <x-input-label for="update_password_password" :value="__('GENERATE_NEW_KEY')" 
                class="text-purple-400 font-mono text-xs uppercase" />
            <x-text-input id="update_password_password" name="password" type="password" 
                class="mt-1 block w-full bg-black/40 border-purple-500/50 text-purple-100 focus:border-purple-400" 
                autocomplete="new-password" 
                placeholder="NEW_IDENTITY_CODE" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2 text-pink-500 text-xs italic" />
        </div>

        <div>
            <x-input-label for="update_password_password_confirmation" :value="__('VERIFY_NEW_KEY')" 
                class="text-purple-400 font-mono text-xs uppercase" />
            <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" 
                class="mt-1 block w-full bg-black/40 border-purple-500/50 text-purple-100 focus:border-purple-400" 
                autocomplete="new-password" 
                placeholder="REPEAT_NEW_IDENTITY_CODE" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2 text-pink-500 text-xs italic" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button class="hover:shadow-[0_0_20px_rgba(6,182,212,0.6)]">
                {{ __('UPDATE_PASSWORD') }}
            </x-primary-button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-xs font-mono text-green-400 animate-pulse"
                >
                    <span class="mr-1">[OK]</span> {{ __('ENCRYPTION_KEY_MODIFIED.') }}
                </p>
            @endif
        </div>
    </form>
</section>