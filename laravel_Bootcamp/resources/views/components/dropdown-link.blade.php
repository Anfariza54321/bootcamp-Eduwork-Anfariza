<a {{ $attributes->merge([
    'class' => 'block w-full px-4 py-2 text-start text-xs font-mono uppercase tracking-widest 
                text-cyan-400/80 dark:text-cyan-400/80 
                hover:bg-cyan-500/10 hover:text-cyan-300 
                hover:border-l-4 hover:border-cyan-500
                focus:outline-none focus:bg-cyan-500/20 focus:text-cyan-200 
                transition-all duration-200 ease-in-out'
]) }}>
    <span class="opacity-50 group-hover:opacity-100 mr-1">>></span>
    {{ $slot }}
</a>