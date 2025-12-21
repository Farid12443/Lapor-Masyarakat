<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>

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

<body class="bg-[#FFFFFF] grid grid-cols-7">
    <x-sidebar />

    <main id="main" class="col-span-6 h-screen overflow-y-auto">
        <header class="flex flex-col sticky top-0 py-6 px-8 bg-[#FFFFFF]">
            <h1 class="text-[30px] font-[600] text-gray-800">{{ $judul }}</h1>
            <span>{{ $subjudul }}</span>
        </header>

        <section class="p-8">
            {{ $slot }}
        </section>
    </main>

    {{-- modal logout --}}
    <div id="Logout" class="fixed inset-0 bg-black/50 items-center justify-center hidden z-50">
        <div class="bg-white rounded-lg shadow-lg p-6 w-11/12 max-w-md">

            <h2 class="text-xl font-semibold mb-4 text-gray-800">Konfirmasi Logout</h2>

            <p class="text-gray-600 mb-4">
                Apakah kamu yakin ingin logout?
            </p>

            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf

                <div class="flex justify-end gap-3 mt-4">
                    <button type="button" onclick="ModalLogoutClose()"
                        class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300">
                        Batal
                    </button>

                    <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700">
                        Logout
                    </button>
                </div>  
            </form>
        </div>
    </div>

    <script>
        function LogoutModal() {
            const modal = document.getElementById('Logout');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function ModalLogoutClose() {
            const modal = document.getElementById('Logout');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }
    </script>
</body>

</html>