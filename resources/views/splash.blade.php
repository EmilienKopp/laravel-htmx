<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <script src="https://cdn.tailwindcss.com"></script>

        <!-- Scripts -->
        <script src="https://unpkg.com/htmx.org@1.9.3" defer></script>
    </head>
    <body class="antialiased">

        <div class="overflow-auto sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
            
            <div id="main" hx-get="/api/demo" hw-target="closest div" hx-swap="outerHTML" hx-trigger="load delay:0.3s">
                {{-- Loader --}}
                <div id="loader" class="bg-transparent">
                    <img src="{{ asset('grid.svg')}}" alt="loading animation"/>
                </div>
            </div>

        </div>
    </body>
</html>
