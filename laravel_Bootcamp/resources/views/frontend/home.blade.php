<x-layout>
        <x-slot:title>Home</x-slot:title>
        @include('partials.navbar')
        @include('components.home-page')
        @include('components.features-section')
        @include('components.logos-section')
        @include('partials.footer')
</x-layout>