<x-guest-layout>
    <div class="mb-4 font-mono text-xs tracking-tight text-cyan-500/80 bg-cyan-500/5 p-4 border-l-4 border-cyan-500 shadow-[0_0_15px_rgba(6,182,212,0.1)]">
    <span class="font-bold text-cyan-400 block mb-1">//_IDENTITY_VERIFICATION_REQUIRED:</span> 
    {{ __('Thanks for signing up! Before establishing a secure link, could you verify your digital ID by clicking on the encryption link we just dispatched? If you didn\'t receive the transmission, we will gladly initiate another.') }}
</div>

@if (session('status') == 'verification-link-sent')
    <div class="mb-4 font-mono text-xs text-green-400 bg-green-500/10 p-3 border border-green-500/50 animate-pulse">
        <span class="font-bold">[SUCCESS]:</span> {{ __('A new verification link has been sent to the email address you provided during registration.') }}
    </div>
@endif

<div class="mt-8 flex flex-col space-y-4 sm:flex-row sm:items-center sm:justify-between sm:space-y-0">
    <form method="POST" action="{{ route('verification.send') }}" class="w-full sm:w-auto">
        @csrf

        <button type="submit" 
            class="w-full sm:w-auto px-6 py-3 bg-transparent border-2 border-cyan-500 text-cyan-400 font-mono font-bold uppercase tracking-wider 
                   hover:bg-cyan-500 hover:text-black hover:shadow-[0_0_20px_rgba(6,182,212,0.8)] 
                   active:scale-95 transition-all duration-300">
            {{ __('RESEND_TRANSMISSION') }}
        </button>
    </form>

    <form method="POST" action="{{ route('logout') }}" class="w-full sm:w-auto text-center">
        @csrf

        <button type="submit" 
            class="font-mono text-[10px] uppercase tracking-widest text-pink-500/70 hover:text-pink-400 underline underline-offset-4 decoration-pink-500/30 transition-colors">
            {{ __('//_ABORT_CONNECTION') }}
        </button>
    </form>
</div>
</x-guest-layout>
