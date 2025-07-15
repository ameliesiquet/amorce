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
<body class="bg-zinc-900 text-white h-screen flex flex-col gap-20">

@if (Auth::check())
    <script>
        window.location.href = "{{ route('dashboard') }}";
    </script>
@else
    <div class="hidden align-end lg:w-full lg:bg-amber-200 lg:pt-10 lg:pb-6 lg:flex lg:justify-center">
        <img src="{{ asset('img/logo.png') }}" alt="Logo" class="h-auto max-w-full">
    </div>

    <div
        class="flex flex-col gap-6 bg-zinc-900 text-white p-8 rounded-lg border border-amber-200 shadow-lg w-full max-w-sm text-center self-center lg:mt-20">
        <h1 class="text-xl font-semibold">Bienvenue!</h1>
        <div class="flex flex-col gap-4">
            <p>Veuillez vous connecter pour accéder à votre tableau de bord.</p>

            <a href="{{ route('login') }}"
               class="w-full py-2 px-4 bg-amber-200 text-zinc-900 rounded-md hover:bg-amber-300 focus:outline-none focus:ring-2 focus:ring-amber-200">
                Se connecter
            </a>
        </div>
        <a href="{{ route('password.request') }}"
           class="text-xs text-white hover:text-amber-200 underline ">
            {{ __('Forgot your password?') }}
        </a>
    </div>

@endif

</body>
</html>
