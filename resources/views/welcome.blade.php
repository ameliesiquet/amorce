<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-zinc-900 text-white h-screen flex items-center justify-center">

@if (Auth::check())
    <script>
        window.location.href = "{{ route('dashboard') }}";
    </script>
@else
    <div class="flex flex-col gap-4 bg-zinc-900 text-white p-8 rounded-lg border border-amber-200 shadow-lg w-full max-w-sm text-center self-center">
        <h1 class="text-xl font-semibold mb-4">Bienvenue!</h1>
        <p>Veuillez vous connecter pour accéder à votre tableau de bord.</p>

        <a href="{{ route('login') }}" class="w-full py-2 px-4 bg-amber-200 text-zinc-900 rounded-md hover:bg-amber-300 focus:outline-none focus:ring-2 focus:ring-amber-200">
            Se connecter
        </a>

        <p class="mt-4">Pas encore de compte ? <a href="{{ route('register') }}" class="text-white underline hover:text-amber-200">Inscrivez-vous</a></p>
    </div>

@endif

</body>
</html>
