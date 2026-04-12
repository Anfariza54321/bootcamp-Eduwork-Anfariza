<section class="relative bg-white lg:grid lg:h-screen lg:place-content-center dark:bg-black overflow-hidden transition-colors duration-300">
    <div class="absolute top-0 left-0 w-full h-full pointer-events-none opacity-20 dark:opacity-40">
        <div class="absolute top-[-10%] left-[-10%] w-[40%] h-[40%] bg-purple-600 rounded-full blur-[120px]"></div>
        <div class="absolute bottom-[-10%] right-[-10%] w-[40%] h-[40%] bg-cyan-500 rounded-full blur-[120px]"></div>
    </div>

    <div class="relative mx-auto w-screen max-w-7xl px-4 py-16 sm:px-6 sm:py-24 md:grid md:grid-cols-2 md:items-center md:gap-8 lg:px-8 lg:py-32">
        <div class="max-w-prose text-left z-10">
            <div class="flex items-center gap-2 mb-4">
                <span class="h-[1px] w-8 bg-purple-500"></span>
                <span class="text-[10px] font-mono font-black tracking-[0.3em] text-purple-600 dark:text-purple-400 uppercase">
                    System_Ready // v2.0.26
                </span>
            </div>

            <h1 class="text-4xl md:text-7xl font-black tracking-tighter text-gray-900 dark:text-white uppercase italic leading-none">
                Elevate Your <br>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-purple-600 to-cyan-500 drop-shadow-[0_0_15px_rgba(6,182,212,0.5)]">
                    Style Every Step
                </span>
            </h1>

            <p class="mt-6 text-sm md:text-base font-medium text-gray-700 dark:text-gray-400 border-l-2 border-cyan-500 pl-4 max-w-md tracking-tight leading-relaxed uppercase">
                Bukan sekadar alas kaki, tapi pernyataan jati diri. Koleksi eksklusif untuk kamu yang berani tampil beda. 
                <span class="text-purple-600 dark:text-purple-400 font-bold uppercase text-[10px] block mt-2 font-mono">[ SET_YOUR_IDENTITY_NOW ]</span>
            </p>

            <div class="mt-8 flex flex-wrap gap-4 sm:mt-10">
                <a class="relative group inline-block px-8 py-4 font-black text-xs uppercase tracking-widest text-white transition-all overflow-hidden"
                    href="{{ route('products.index') }}">
                    <div class="absolute inset-0 bg-gradient-to-r from-purple-600 to-cyan-500 transition-all group-hover:scale-105"></div>
                    <div class="absolute inset-0 bg-black opacity-0 group-hover:opacity-10"></div>
                    <span class="relative z-10">Get_Started_Now</span>
                </a>

            </div>
        </div>

        <div class="relative mt-12 md:mt-0 group">
            <div class="absolute inset-0 bg-gradient-to-tr from-purple-600/30 to-cyan-500/30 rounded-full blur-[60px] opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
            
            <img src="{{ asset('images/logo_sepatu_home.webp') }}" 
                class="relative mx-auto w-full max-w-lg h-auto object-contain drop-shadow-[0_0_30px_rgba(168,85,247,0.4)] animate-pulse-slow"
                alt="Neon shoes">
            
            <div class="absolute top-0 right-0 font-mono text-[8px] text-purple-500/50 hidden md:block uppercase tracking-tighter">
                Model: 0x-ANF_SS <br>
                Class: LEGENDARY_GEAR
            </div>
        </div>
    </div>
</section>

<style>
    @keyframes pulse-slow {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-15px); }
    }
    .animate-pulse-slow {
        animation: pulse-slow 6s ease-in-out infinite;
    }
</style>