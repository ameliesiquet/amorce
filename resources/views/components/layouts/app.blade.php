<!doctype html>
<html lang="fr" class="h-full bg-gray-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Amorce</title>

    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="font-sans antialiased flex h-screen">

<x-full-header />

<main class="flex flex-col mt-8 sm:mt-6 gap-6  sm:gap-8 md:gap-10 py-16 px-8 sm:px-14 md:px-20 lg:px-24 lg:ml-64 ">
    {{ $slot }}
</main>

@livewire('modals.container')
@livewireScripts

<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js" defer></script>
</body>
</html>
