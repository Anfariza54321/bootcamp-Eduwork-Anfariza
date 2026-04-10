<style>
    @keyframes marquee {
        0% { transform: translateX(0); }
        100% { transform: translateX(-50%); }
    }

    .animate-marquee {
        display: flex;
        width: max-content;
        animation: marquee 30s linear infinite;
    }

    .animate-marquee:hover {
        animation-play-state: paused;
    }

    /* Efek Glitch Tipis pada Hover */
    .cyber-logo:hover {
        filter: drop-shadow(0 0 8px rgba(6, 182, 212, 0.8)) drop-shadow(0 0 2px rgba(168, 85, 247, 1));
        transform: scale(1.1) skewX(-5deg);
    }
</style>

<div class="py-12 bg-white dark:bg-black transition-colors duration-500 overflow-hidden border-t border-b border-gray-100 dark:border-cyan-500/20 relative">
    
    <div class="absolute top-0 left-0 w-full h-full opacity-5 pointer-events-none dark:block hidden" 
         style="background-image: radial-gradient(#06b6d4 0.5px, transparent 0.5px); background-size: 10px 10px;"></div>

    <div class="text-center mb-8 relative z-10">
        <h2 class="text-gray-400 dark:text-purple-500 font-black tracking-[0.5em] uppercase text-[10px] italic">
            // TERMINAL_PARTNERS_LIST
        </h2>
    </div>

    <div class="h-[1px] w-full bg-gradient-to-r from-transparent via-gray-300 dark:via-cyan-500/50 to-transparent"></div>

    <div class="py-12 relative flex items-center overflow-hidden">
        <div class="absolute inset-y-0 left-0 w-32 bg-gradient-to-r from-white dark:from-black to-transparent z-20 pointer-events-none"></div>
        <div class="absolute inset-y-0 right-0 w-32 bg-gradient-to-l from-white dark:from-black to-transparent z-20 pointer-events-none"></div>

        <div class="animate-marquee flex items-center gap-24 px-4">
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
                // Menggabungkan array 3 kali agar durasi animasi pas dan tidak terputus
                $displayLogos = array_merge($logos, $logos, $logos);
            @endphp

            @foreach ($displayLogos as $logo)
                <div class="flex flex-col items-center group">
                    <img src="{{ asset('images/' . $logo[0]) }}"
                        class="cyber-logo h-8 md:h-10 w-auto grayscale opacity-40 
                            dark:invert dark:opacity-30 
                            hover:grayscale-0 hover:opacity-100 
                            dark:hover:opacity-100 transition-all duration-300"
                        alt="{{ $logo[1] }}">
                    
                    <span class="text-[8px] font-mono text-cyan-500 opacity-0 group-hover:opacity-100 transition-opacity mt-2 tracking-tighter">
                        ID_{{ strtoupper(str_replace(' ', '_', $logo[1])) }}
                    </span>
                </div>
            @endforeach
        </div>
    </div>

    <div class="h-[1px] w-full bg-gradient-to-r from-transparent via-gray-300 dark:via-purple-500/50 to-transparent"></div>

    <div class="absolute bottom-2 right-4 hidden md:block">
        <p class="text-[8px] font-mono text-gray-400 dark:text-cyan-500/30 uppercase">Secure_Connection: Established</p>
    </div>
</div>
