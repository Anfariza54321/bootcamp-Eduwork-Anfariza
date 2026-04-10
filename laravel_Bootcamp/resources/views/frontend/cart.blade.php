<x-layout>
    <x-slot:title>Cart</x-slot:title>
        @include('partials.navbar') 
    <section class=" bg-white dark:bg-black py-8 antialiased md:py-12">
@include("components.cart-section")
    </section>
</x-layout>