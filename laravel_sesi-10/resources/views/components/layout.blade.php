<!DOCTYPE html>
<html lang="en">
<head class="h-full bg-gray-900">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
        @vite('resources/css/app.css')
    <title>Productt</title>
</head>
<body class="h-full">
    <!-- Include this script tag or install `@tailwindplus/elements` via npm: -->

<div class="min-h-full">
  <x-nav-bar></x-nav-bar>

  <x-header>{{ $title }}</x-header>
  <main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
      {{ $slot }}
    </div>
  </main>
</div>

<script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module"></script>
</body>
</html>