@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge([
    'class' => 'bg-black/40 border-2 border-cyan-500/50 
                font-mono text-cyan-100 placeholder-cyan-900
                focus:border-cyan-400 focus:ring focus:ring-cyan-400/30 
                focus:shadow-[0_0_15px_rgba(6,182,212,0.4)]
                rounded-none border-l-4
                transition-all duration-300
                disabled:opacity-30 disabled:cursor-not-allowed disabled:bg-gray-800'
]) }}>
