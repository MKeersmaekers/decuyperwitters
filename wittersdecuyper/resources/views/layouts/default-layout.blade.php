<!doctype html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ $description ?? 'De Cuyper Witters uit Heist-op-den-Berg,de speciaalzaak voor dier en tuin. Alle soorten dierenvoeding en alle benodigdheden voor het onderhoud van uw tuin' }}">
    <title>De Cuyper Witters</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/icons/favicon.ico') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="font-sans antialiased">
    <div class="flex flex-col min-h-screen text-gray-800 bg-gray-100">
        <header class="shadow bg-white/70 sticky inset-0 backdrop-blur-sm z-10">
            {{-- Navigation  --}}
            <x-layout.nav />
        </header>
        <main>
            {{-- Main content --}}
            {{ $slot }}
        </main>
        <x-layout.footer />
    </div>
    @stack('script')
    @livewireScripts
</body>

</html>