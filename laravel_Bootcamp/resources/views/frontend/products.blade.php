<x-layout>
    <x-slot:title>Products</x-slot:title>

    <div class="fixed inset-0 z-[-1] bg-slate-50 dark:bg-black transition-colors duration-500">
        <div class="absolute inset-0 opacity-[0.15] dark:opacity-10" 
             style="background-image: radial-gradient(#64748b 0.8px, transparent 0.8px); background-size: 30px 30px;">
        </div>
        <div class="absolute inset-0 bg-gradient-to-tr from-blue-50/50 via-transparent to-purple-50/50 dark:hidden"></div>
    </div>

    @include('partials.navbar')

    <section class="bg-transparent py-8 antialiased dark:bg-transparent md:py-12">
        
        @include('components.products-list')
        
    </section>

    @include('partials.footer')
</x-layout>