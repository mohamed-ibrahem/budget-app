@props([
    'locale' => app()->getLocale(),
    'title' => null,
])<!doctype html>
<html dir="{{ $locale === 'ar' ? 'rtl' : 'ltr' }}" lang="{{ str_replace('_', '-', $locale) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ implode(' - ', array_filter([
        'مصروفنا',
        $title,
    ])) }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700;800;900&display=swap" rel="stylesheet">
    @livewireStyles
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <header class="fixed top-0 inset-x-0 z-50">
        <section class="container pt-12 pb-16 -mb-3 bg-gradient-to-bl from-indigo-300 to-indigo-800 text-white rounded-b-2xl">
            <x-typography.large>مصروف البيت</x-typography.large>
            <x-layouts.slogan />
        </section>
    </header>

    <main class="mt-40">
        <div class="relative">
            {{ $slot }}
        </div>
    </main>
    @livewireScripts
</body>
</html>
