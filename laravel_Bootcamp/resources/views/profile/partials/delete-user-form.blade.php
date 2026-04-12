<section class="space-y-6">
    <header class="border-l-4 border-red-600 pl-4 bg-red-600/5 py-2">
        <h2 class="text-lg font-mono font-bold text-red-500 uppercase tracking-widest">
            {{ __('//_SYSTEM_PURGE_PROTOCOL') }}
        </h2>

        <p class="mt-1 text-xs font-mono text-red-400/80 uppercase">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>

    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        class="hover:shadow-[0_0_20px_rgba(239,68,68,0.6)]"
    >{{ __('DELETE_ACCOUNT') }}</x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6 bg-gray-900 border-2 border-red-600/50 shadow-[0_0_50px_rgba(239,68,68,0.2)]">
            @csrf
            @method('delete')

            <h2 class="text-lg font-mono font-bold text-red-500 uppercase">
                {{ __('CONFIRM_IDENTITY_PURGE?') }}
            </h2>

            <p class="mt-1 text-xs font-mono text-gray-400">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
            </p>

            <div class="mt-6 relative">
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4 bg-black border-red-500/50 text-red-100 focus:border-red-500 focus:ring-red-500/30"
                    placeholder="{{ __('INPUT_ENCRYPTION_KEY') }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2 text-red-500 text-[10px] italic" />
            </div>

            <div class="mt-6 flex justify-end space-x-3">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('ABORT_ACTION') }}
                </x-secondary-button>

                <x-danger-button class="ms-3 border-red-500 text-red-500 hover:bg-red-500 hover:text-white">
                    {{ __('EXECUTE_PURGE') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>