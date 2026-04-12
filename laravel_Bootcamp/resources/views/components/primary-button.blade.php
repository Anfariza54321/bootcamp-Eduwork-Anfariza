<button {{ $attributes->merge([
    'type' => 'submit', 
    'class' => 'inline-flex items-center px-6 py-2 
                bg-cyan-600 border-2 border-cyan-400 
                font-mono font-bold text-xs text-white uppercase tracking-[0.3em] 
                hover:bg-cyan-500 hover:shadow-[0_0_25px_rgba(6,182,212,0.8)] 
                hover:scale-105 active:scale-95 
                focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:ring-offset-2 
                dark:focus:ring-offset-gray-900 transition-all duration-200 
                relative overflow-hidden group shadow-[0_0_10px_rgba(6,182,212,0.3)]'
]) }}>
    <div class="absolute inset-0 w-full h-full bg-gradient-to-r from-transparent via-white/20 to-transparent -translate-x-full group-hover:animate-[shimmer_1.5s_infinite]"></div>
    
    <span class="mr-2 opacity-70 group-hover:animate-pulse">_</span>
    
    {{ $slot }}
</button>

<style>
    @keyframes shimmer {
        100% { transform: translateX(100%); }
    }
</style>