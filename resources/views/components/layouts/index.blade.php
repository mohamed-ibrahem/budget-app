@props([
    'locale' => app()->getLocale(),
    'title' => null,
])
<!doctype html>
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
    <section class="container mt-2 pb-5">
        <header>
            <x-typography.large>مصروف البيت</x-typography.large>
            <x-layouts.slogan />
        </header>
    </section>

    <main>
        {{ $slot }}
    </main>
    @livewireScripts
</body>
</html>
