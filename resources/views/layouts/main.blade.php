<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Amorce</title>
</head>
<body class="grid grid-cols-[1fr_4fr] bg-gray-200 h-screen">
<main class="overflow-y-auto" x-data="{openMod:false, openAlert:false}" @openedmodal.window="openMod=true" @closedmodal.window="openMod=false" @openalert.window="openAlert = true; setTimeout(() => openAlert = false, 3000)">
        {{ $slot }}
</main>
</body>
</html>
