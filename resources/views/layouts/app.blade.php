<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'My App' }}</title>

    {{-- tailwind css --}}
    @vite('resources/css/app.css')
     {{-- @php
        $isProd = app()->environment('production');
        $manifest = public_path('build/manifest.json');
    @endphp

    @if ($isProd && file_exists($manifest))
        @php 
            $m = json_decode(file_get_contents($manifest), true);
        @endphp
         <link rel="stylesheet" href="/build/{{ $m['resources/css/app.css']['file'] }}">
                <script type="module" src="/build/{{ $m['resources/js/app.js']['file'] }}"></script>
       @else
        @viteReactRefresh
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif --}}
</head>

<body>
    <x-navbar />
    <main class="mt-18 p-6 md:hidden">
        {{ $slot }}
    </main>

    <span class="hidden md:block mt-18 p-6">tampilan hanya mobile</span>
</body>

</html>