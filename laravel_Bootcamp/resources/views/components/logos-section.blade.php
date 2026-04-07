<style>
    @keyframes marquee {
        0% {
            transform: translateX(0);
        }

        100% {
            transform: translateX(-50%);
        }
    }

    .animate-marquee {
        display: flex;
        width: max-content;
        animation: marquee 25s linear infinite;
    }

    .animate-marquee:hover {
        animation-play-state: paused;
    }
</style>

<div
    class="py-12 mt-20 mb-10 bg-white dark:bg-[#0a0a20] transition-colors duration-500 overflow-hidden border-t border-slate-100 dark:border-white/5">

    <div class="text-center pt-10 mb-8">
        <h2 class="text-slate-400 dark:text-cyan-400/60 font-medium tracking-[0.3em] uppercase text-xs">Official
            Partners
        </h2>
    </div>

    <div class="h-px w-full bg-linear-to-r from-transparent via-gray-700 dark:via-white/10 to-transparent"></div>


    <div class="py-16 relative flex items-center">
        <div
            class="absolute inset-0 z-10 pointer-events-none 
                    bg-linear-to-r from-white via-transparent to-white 
                    dark:from-[#0a0a20] dark:via-transparent dark:to-[#0a0a20]">
            <div class="animate-marquee flex items-center gap-20">
                @php
                    $logos = [
                        ['nike-logo.webp', 'Nike'],
                        ['adidas-logo.webp', 'Adidas'],
                        ['puma-logo.webp', 'Puma'],
                        ['aerostreet-logo.webp', 'Aerostreet'],
                        ['nb-logo.webp', 'New Balance'],
                        ['converse-logo.webp', 'Converse'],
                        ['reebok-logo.webp', 'Reebok'],
                    ];
                @endphp

                @foreach (array_merge($logos, $logos) as $logo)
                    <img src="{{ asset('images/' . $logo[0]) }}"
                        class="h-10 w-auto grayscale opacity-60 
                            dark:invert dark:opacity-40 
                            hover:grayscale-0 hover:opacity-100 
                            dark:hover:opacity-100 transition-all duration-300"
                        alt="{{ $logo[1] }}">
                @endforeach>
                <img src="{{ asset('images/nike-logo.webp') }}"
                    class="h-12 w-auto grayscale opacity-60 dark:invert dark:brightness-200 dark:opacity-80 transition-all"
                    alt="Nike">
                <img src="{{ asset('images/adidas-logo.webp') }}"
                    class="h-12 w-auto grayscale opacity-60 dark:invert dark:brightness-200 dark:opacity-80 transition-all"
                    alt="Adidas">
                <img src="{{ asset('images/puma-logo.webp') }}"
                    class="h-12 w-auto grayscale opacity-60 dark:invert dark:brightness-200 dark:opacity-80 transition-all"
                    alt="Puma">
                <img src="{{ asset('images/aerostreet-logo.webp') }}"
                    class="h-12 w-auto grayscale opacity-60 dark:invert dark:brightness-200 dark:opacity-80 transition-all"
                    alt="Aerostreet">
                <img src="{{ asset('images/nb-logo.webp') }}"
                    class="h-12 w-auto grayscale opacity-60 dark:invert dark:brightness-200 dark:opacity-80 transition-all"
                    alt="New Balance">
                <img src="{{ asset('images/converse-logo.webp') }}"
                    class="h-12 w-auto grayscale opacity-60 dark:invert dark:brightness-200 dark:opacity-80 transition-all"
                    alt="Converse">
                <img src="{{ asset('images/reebok-logo.webp') }}"
                    class="h-12 w-auto grayscale opacity-60 dark:invert dark:brightness-200 dark:opacity-80 transition-all"
                    alt="Reebok">

                <img src="{{ asset('images/nike-logo.webp') }}"
                    class="h-12 w-auto grayscale opacity-60 dark:invert dark:brightness-200 dark:opacity-80 transition-all"
                    alt="Nike">
                <img src="{{ asset('images/adidas-logo.webp') }}"
                    class="h-12 w-auto grayscale opacity-60 dark:invert dark:brightness-200 dark:opacity-80 transition-all"
                    alt="Adidas">
                <img src="{{ asset('images/puma-logo.webp') }}"
                    class="h-12 w-auto grayscale opacity-60 dark:invert dark:brightness-200 dark:opacity-80 transition-all"
                    alt="Puma">
                <img src="{{ asset('images/aerostreet-logo.webp') }}"
                    class="h-12 w-auto grayscale opacity-60 dark:invert dark:brightness-200 dark:opacity-80 transition-all"
                    alt="Aerostreet">
                <img src="{{ asset('images/nb-logo.webp') }}"
                    class="h-12 w-auto grayscale opacity-60 dark:invert dark:brightness-200 dark:opacity-80 transition-all"
                    alt="New Balance">
                <img src="{{ asset('images/converse-logo.webp') }}"
                    class="h-12 w-auto grayscale opacity-60 dark:invert dark:brightness-200 dark:opacity-80 transition-all"
                    alt="Converse">
                <img src="{{ asset('images/reebok-logo.webp') }}"
                    class="h-12 w-auto grayscale opacity-60 dark:invert dark:brightness-200 dark:opacity-80 transition-all"
                    alt="Reebok">
            </div>
        </div>
        <div class="h-px w-full bg-linear-to-r from-transparent via-gray-700 dark:via-white/10  to-transparent"></div>
    </div>


</div>
