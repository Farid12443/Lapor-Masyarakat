<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>

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
    {{-- header profile --}}
    <div class="bg-linear-to-b from-blue-400 to-blue-600 p-6 fixed w-full z-100 text-white rounded-b-3xl shadow-lg">
        <div class="flex items-center justify-between pt-1.5">
            <div class="flex flex-row items-center gap-4">
                <button onclick="history.back()">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                    </svg>
                </button>

                <span class="text-xl font-semibold">{{ $judul }}</span>
            </div>
        </div>
    </div>

      {{ $slot }}
   
</body>

</html>