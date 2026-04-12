@props(['align' => 'right', 'width' => '48', 'contentClasses' => 'py-1 bg-gray-900/90 backdrop-blur-xl'])

@php
$alignmentClasses = match ($align) {
    'left' => 'ltr:origin-top-left rtl:origin-top-right start-0',
    'top' => 'origin-top',
    default => 'ltr:origin-top-right rtl:origin-top-left end-0',
};

$width = match ($width) {
    '48' => 'w-48',
    default => $width,
};
@endphp

<div class="relative" x-data="{ open: false }" @click.outside="open = false" @close.stop="open = false">
    <div @click="open = ! open" class="cursor-pointer">
        {{ $trigger }}
    </div>

    <div x-show="open"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 scale-95 -translate-y-2"
            x-transition:enter-end="opacity-100 scale-100 translate-y-0"
            x-transition:leave="transition ease-in duration-75"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-95"
            class="absolute z-50 mt-2 {{ $width }} {{ $alignmentClasses }}"
            style="display: none;"
            @click="open = false">
        
        <div class="rounded-none border-t-2 border-l-2 border-cyan-500/50 border-b-2 border-r-2 border-purple-600/50 
                    shadow-[0_0_20px_rgba(6,182,212,0.2)] overflow-hidden">
            
            <div class="ring-1 ring-cyan-400/30 {{ $contentClasses }} relative">
                <div class="absolute inset-0 pointer-events-none bg-[linear-gradient(rgba(18,16,16,0)_50%,rgba(0,0,0,0.1)_50%),linear-gradient(90deg,rgba(255,0,0,0.03),rgba(0,255,0,0.01),rgba(0,0,255,0.03))] bg-[length:100%_2px,3px_100%]"></div>
                
                <div class="relative z-10">
                    {{ $content }}
                </div>
            </div>
        </div>
    </div>
</div>