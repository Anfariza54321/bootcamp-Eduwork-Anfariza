<button {{ $attributes->merge([
    'type' => 'button', 
    'class' => 'inline-flex items-center px-6 py-2 
                bg-gray-900/50 border-2 border-purple-500/50 
                font-mono font-bold text-xs text-purple-400 uppercase tracking-[0.2em] 
                hover:border-purple-400 hover:text-purple-300 hover:bg-purple-500/10 
                hover:shadow-[0_0_15px_rgba(168,85,247,0.4)] 
                focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 
                dark:focus:ring-offset-gray-900 disabled:opacity-25 
                transition-all duration-300 relative overflow-hidden group'
]) }}>
    <span class="absolute left-0 top-0 h-full w-1 bg-purple-600 opacity-50 group-hover:opacity-100 transition-opacity"></span>
    
    <span class="relative z-10 flex items-center">
        <span class="mr-2 text-[10px] opacity-50 group-hover:translate-x-1 transition-transform">>></span>
        {{ $slot }}
    </span>

    <div class="absolute inset-0 bg-purple-500/5 opacity-0 group-hover:opacity-100 pointer-events-none"></div>
</button>
