<button {{ $attributes->merge([
    'type' => 'submit', 
    'class' => 'inline-flex items-center px-6 py-2 
                bg-transparent border-2 border-red-500 
                font-mono font-bold text-xs text-red-500 uppercase tracking-[0.2em] 
                hover:bg-red-500 hover:text-black hover:shadow-[0_0_20px_rgba(239,68,68,0.8)] 
                active:scale-95 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 
                focus:ring-offset-gray-900 transition-all duration-300 
                relative overflow-hidden group'
]) }}>
    <span class="absolute top-0 left-0 w-1 h-1 border-t border-l border-white opacity-0 group-hover:opacity-100"></span>
    <span class="absolute bottom-0 right-0 w-1 h-1 border-b border-r border-white opacity-0 group-hover:opacity-100"></span>

    {{ $slot }}
</button>
