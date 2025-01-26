<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Welcome</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>
<body class=" antialiased dark:bg-black dark:text-white/50">
<div class="leading-[45px] flex items-center justify-center min-h-screen flex-col">
    <div class="flex flex-col items-start justify-center">
        <div class="text-[42px]">Welcome to</div>
        <div class="text-[68px]">our <span class="font-bold">API</span></div>
    </div>
</div>
</body>
</html>
