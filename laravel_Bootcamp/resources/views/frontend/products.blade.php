<x-layout>
    <x-slot:title>Products</x-slot:title>
    @include('partials.navbar')
    <section class="bg-gray-50 py-8 antialiased dark:bg-gray-900 md:py-12">

        @include('components.products-list')

    </section>
    @include('partials.footer')
</x-layout>
