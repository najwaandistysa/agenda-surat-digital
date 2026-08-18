<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="icon" type="image/x-icon" href="/favicon.ico">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
        <link rel="apple-touch-icon" href="/apple-touch-icon.png">

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0"
             style="background: radial-gradient(circle at top, #2a1245 0%, #0d0517 70%);">

            <div class="mb-6 text-center">
                <a href="/" class="inline-flex items-center gap-2">
                    <span class="text-3xl">📁</span>
                    <span class="text-2xl font-bold">
                        <span class="text-white">AgendaSurat</span><span class="text-purple-400">.Digital</span>
                    </span>
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-2 px-6 py-6 shadow-lg overflow-hidden sm:rounded-2xl"
                 style="background: #1a0f2e; border: 1px solid rgba(168,85,247,0.25);">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
