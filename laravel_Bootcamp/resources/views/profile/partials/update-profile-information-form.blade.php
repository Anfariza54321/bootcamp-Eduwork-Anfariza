<section class="space-y-6">
    <header class="border-l-4 border-cyan-500 pl-4 bg-cyan-500/5 py-2">
        <h2 class="text-lg font-mono font-bold text-cyan-400 uppercase tracking-widest">
            {{ __('//_SUBJECT_IDENTITY_DATA') }}
        </h2>

        <p class="mt-1 text-xs font-mono text-gray-400 uppercase tracking-tighter">
            {{ __("Update your account's profile information and digital contact address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('LEGAL_ALIAS')" 
                class="text-cyan-400 font-mono text-xs uppercase" />
            <x-text-input id="name" name="name" type="text" 
                class="mt-1 block w-full bg-black/40 border-cyan-500/50 text-cyan-100" 
                :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2 text-pink-500 text-xs italic" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('DIGITAL_LINK_ID')" 
                class="text-cyan-400 font-mono text-xs uppercase" />
            <x-text-input id="email" name="email" type="email" 
                class="mt-1 block w-full bg-black/40 border-cyan-500/50 text-cyan-100" 
                :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2 text-pink-500 text-xs italic" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-4 p-3 border border-pink-500/30 bg-pink-500/5">
                    <p class="text-xs font-mono text-pink-400 uppercase">
                        <span class="font-bold">[!]</span> {{ __('Identity link is currently unverified.') }}

                        <button form="send-verification" class="block mt-2 underline text-[10px] text-cyan-500 hover:text-cyan-300 transition-colors uppercase tracking-widest">
                            {{ __('//_RE_INITIATE_VERIFICATION_PROTOCOL') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-mono text-[10px] text-green-400 animate-pulse">
                            {{ __('A new verification link has been dispatched to your terminal.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button class="hover:shadow-[0_0_20px_rgba(6,182,212,0.6)]">
                {{ __('SAVE') }}
            </x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-xs font-mono text-green-400"
                >
                    <span class="mr-1">>></span> {{ __('SYNC_COMPLETE.') }}
                </p>
            @endif
        </div>
    </form>
</section>