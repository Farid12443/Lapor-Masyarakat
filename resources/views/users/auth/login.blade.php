<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>

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

<body class="bg-[#F3F3F3]">

    <section class="flex items-center justify-center min-h-screen px-6 py-12">
        <div class="w-full flex flex-col max-w-md bg-white shadow-lg rounded-2xl p-8">

            <h1 class="text-3xl font-semibold text-center text-[#6477DB]">
                Login Akun
            </h1>
            <p class="text-center text-gray-500 mt-2">Masukkan email dan password Anda</p>
            <div class="mx-auto pt-4">
                @if ($errors->has('login'))
                    <div class="text-red-500 text-sm">
                        {{ $errors->first('login') }}
                    </div>
                @endif
                @if (session('success'))
                    <div class="text-green-500 text-sm">
                        {{ session('success') }}
                    </div>
                @endif
            </div>

            <form class="mt-8 space-y-4" action="/login" method="POST">
                @csrf

                <div>
                    <label class="block mb-1 text-sm font-semibold text-gray-700">Email</label>
                    <input type="email" name="email"
                        class="w-full p-3 border rounded-xl text-sm focus:border-[#6477DB] focus:ring-[#6477DB]"
                        placeholder="email@domain.com" required value="{{ old('email') }}" />
                </div>

                <div>
                    <label class="block mb-1 text-sm font-semibold text-gray-700">Password</label>
                    <input type="password" name="password"
                        class="w-full p-3 border rounded-xl text-sm focus:border-[#6477DB] focus:ring-[#6477DB]"
                        placeholder="••••••••" required />
                </div>

                <button type="submit"
                    class="w-full py-3 mt-2 text-white bg-[#6477DB] font-medium rounded-xl hover:bg-[#5062bb] transition">
                    Login
                </button>

                <p class="text-sm text-center text-gray-600 mt-4">
                    Belum punya akun?
                    <a href="/register" class="text-[#6477DB] font-semibold hover:underline">Daftar</a>
                </p>
            </form>

        </div>
    </section>

</body>

</html>