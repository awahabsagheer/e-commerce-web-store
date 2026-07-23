<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'TechStore') }}</title>

        <!-- Google Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@400;500;600;700&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-[#e0f2fe] text-slate-800 min-h-screen relative overflow-x-hidden selection:bg-[#a6f2d2] selection:text-slate-900">
        
        <!-- Background Gradient Mesh for Glassmorphism Effect -->
        <div class="fixed top-[-10%] left-[-10%] w-[700px] h-[700px] rounded-full bg-gradient-to-br from-[#009ACD] via-[#38bdf8] to-[#a6f2d2] opacity-40 blur-[120px] pointer-events-none -z-10"></div>
        <div class="fixed bottom-[-10%] right-[-10%] w-[750px] h-[750px] rounded-full bg-gradient-to-tr from-[#a6f2d2] via-[#009ACD] to-[#38bdf8] opacity-35 blur-[140px] pointer-events-none -z-10"></div>
        <div class="fixed top-[40%] right-[20%] w-[450px] h-[450px] rounded-full bg-[#059669]/20 blur-[130px] pointer-events-none -z-10"></div>

        <div class="min-h-screen flex flex-col">
            @include('layouts.navigation')

            <!-- Header Slot -->
            @if (isset($header))
                <div class="border-b border-white/50 bg-white/20 backdrop-blur-md py-3.5 shadow-sm">
                    <div class="max-w-7xl mx-auto px-6 font-mono text-xs tracking-widest text-[#047857] uppercase flex items-center gap-2 font-bold">
                        <span class="w-2 h-2 rounded-full bg-[#059669] animate-pulse"></span>
                        {{ $header }}
                    </div>
                </div>
            @endif

            <!-- Main Page Content -->
            <main class="flex-1 max-w-7xl w-full mx-auto px-6 py-8">
                {{ $slot ?? '' }}
                @yield('content')
            </main>
        </div>
    </body>
</html>